@extends('layouts.master')
@section('css')


@section('title')
    اضافة معانية جديدة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  اضافة معانية جديدة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">اضافة معانية جديدة</li>
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
                            <form action="{{route("dashboard.feedback.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                  <div class="col-md-6">

                                        <label>اسم العميل <span class="tx-danger">*</span></label>
                                      <input type="text" name="name"  class="form-control" value="{{old('name')}}">
                                      @error('name')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>

                                    <div class="col-md-6">

                                        <label>هاتف العميل <span class="tx-danger">*</span></label>
                                        <input type="text" name="phone"  class="form-control" value="{{old('phone')}}">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                </div>
                                <div class="form-row my-3">
                                    <div class="col-md-6">

                                        <label>كود الوحدة <span class="tx-danger">*</span></label>
                                        <input type="text" name="apartment_code" class="form-control" value="{{old('apartment_code')}}">
                                        @error('apartment_code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label>تفاصيل المعاينة<span class="tx-danger">*</span></label>
                                        <textarea name="description" id="" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label> تاريخ المعاينة<span class="tx-danger">*</span></label>
                                        <input type="datetime-local" name="time_feedback"  class="form-control" value="{{old('time_feedback')}}">
                                        @error('time_feedback')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label> ميعاد المعاينة القادمة<span class="tx-danger">*</span></label>
                                        <input type="datetime-local" name="other_feedback"  class="form-control" value="{{old('other_feedback')}}">
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
