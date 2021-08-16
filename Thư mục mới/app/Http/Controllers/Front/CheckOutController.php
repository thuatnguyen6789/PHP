<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;


class CheckOutController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total','subtotal'));
    }

    public function addOrder(Request $request) {

        //1. Thêm đơn hàng
        $order = Order::create($request ->all());

        //2. Thêm chi tiết đơn hàng
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];

            OrderDetail::create($data);
        }

        if ( $request->payment_type == 'pay_later'){

            //3. Gủi email
            $total = Cart::total();
            $subtotal = Cart::subtotal();

            $this->sendEmail($order, $total, $subtotal);

            //4. Xóa giỏ hàng
            Cart::destroy();

            //5. Trả về kết quả
            return redirect('checkout/result')
                ->with('notification', 'Success! You will pay on delivery. Please check your email.');
        }

        if ( $request->payment_type == 'online_payment'){
            //1. Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
               'vnp_TxnRef' => $order->id, //ID cua don hang
                'vnp_OrderInfo' =>'mô tả đơn hàng ...',
                'vnp_Amount'=> Cart::total(0, '', '') * 23075, //Nhân với giá trị để chuyển sang tiền Việt
            ]);

            //2. Chuyển hướng tới URL lấy được
            return redirect()->to($data_url);

        }


    }

    public function vnPayCheck(Request $request)
    {
        //1. Lấy dât từ URL (do VNPay gửi về qua $vnp_Peturnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán. 00 = Thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //ticket_id
        $vnp_Amount = $request->get('vnp_Amount'); //Số tiền thanh toán.

        //2. Kiểm tra kết quả giao dịch trẻ về từ VNPay
        if ($vnp_ResponseCode != null){
            //Nếu thanh toán thành công:
            if ($vnp_ResponseCode == 0){
                //Gửi email
                $order = Order::find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);

                //Xóa giỏ hàng
                Cart::destroy($order);


                //Thông báo kết quả thành công.
                return redirect('checkout/result')
                    ->with('notification', 'Success! Has paid online. Please check your email');
            }
        }else { //Nếu không thành công
            //Xóa đơn hàng đã thêm vào Database
            Order::find($vnp_TxnRef)->delete();

            //trả về thông báo lỗi
            return redirect('checkout/result')
                ->with('notification', 'ERROR : Payment failed or canceled');

        }
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order','total','subtotal'), function ($message) use ($email_to){
            $message->from('codelean@gmailcom', 'CodeLean eCommerce');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
}


