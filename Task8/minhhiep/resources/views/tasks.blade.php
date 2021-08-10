<?php
    ?>

{{-- thừa kế từ app.blade template --}}
@extends('layouts.app');

{{-- Nội dung trang con --}}
{{-- Dùng app.css --}}
@section('content');

    {{-- Định nghĩa phần nội dung trang task --}}
    <div class="panel-body">
        {{-- Hiển thị thông báo lỗi--}}
        @include('errors.503')

        {{--form nhập task mới --}}
        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            {{-- Tên Task--}}
            <div class="form-group">
                <label for="task" class="col-sm3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            {{--Nut Task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Task
                    </button>
                </div>
            </div>
        </form>
        {{-- Hiển thị Task hiện tại có trong database--}}

        @if(count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Task
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        {{-- Tạo tiêu đề các cột --}}
                        <thead>
                            <td>Task</td>
                            <td>&nbsp;</td>
                        </thead>
                        {{-- Tạo các dòng để hiển thị nội dung--}}
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    {{-- Hiển thị tên TASK --}}
                                    <td class="table-text">
                                        <div>{{$task->name}}</div>
                                    </td>

                                    {{-- thêm nút xóa TASK --}}
                                    <td>
                                        <form action="/task/{{$task->id}}" class="" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button>Delete Task</button>
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

@endsection
