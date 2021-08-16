
@extends('front.layout.master')

@section('title', 'Result')

@section('body')
    <!-- -->
    <!-- Breadcrumb Section Begin-->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index"><i class="fa fa-home"></i>Home</a>
                        <a href="./checkout">Check Out</a>
                        <span>Result</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End-->

    <!-- Section beign -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="col-lg-12">
                <h4>
                    {{ $notification }}
                </h4>

                <a href="./" class="primary-btn mt-5">Continue shopping</a>
            </div>
        </div>
    </section>

    <!-- Section End -->

@endsection
