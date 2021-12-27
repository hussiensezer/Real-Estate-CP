@extends('layouts.master')
@section('css')


@section('title')
    تعديل مرحلة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  تعديل مرحلة </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">تعديل مرحلة </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route("dashboard.feedback.update", $feedback->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-row">
                                    <div class="col-md-6">

                                        <label>اسم العميل <span class="tx-danger">*</span></label>
                                        <input type="text" name="name"  class="form-control" value="{{$feedback->client_name}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label>هاتف العميل <span class="tx-danger">*</span></label>
                                        <input type="text" name="phone"  class="form-control" value="{{$feedback->client_number}}">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                </div>
                                <div class="form-row my-3">
                                    <div class="col-md-6">

                                        <label>كود الوحدة <span class="tx-danger">*</span></label>
                                        <input type="text" name="apartment_code" class="form-control" value="{{$feedback->apartment_code}}">
                                        @error('apartment_code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label>تفاصيل المعاينة<span class="tx-danger">*</span></label>
                                        <textarea name="description" id="" cols="30" rows="3" class="form-control">{{$feedback->description}}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">

                                        <label> تاريخ المعاينة<span class="tx-danger">*</span></label>
                                        <input type="datetime-local" name="time_feedback"  class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($feedback->time_feedback)) }}">
                                        @error('time_feedback')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label> ميعاد المعاينة القادمة<span class="tx-danger">*</span></label>
                                        <input type="datetime-local" name="other_feedback"  class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($feedback->other_feedback)) }}">
                                        @error('other_feedback')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>



                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">اضافة </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>
@endsection
