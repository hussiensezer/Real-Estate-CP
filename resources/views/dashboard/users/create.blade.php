@extends('layouts.master')
@section('css')


@section('title')
    اضافة مستخدم جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  اضافة مستخدم جديد</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">اضافة مستخدم جديد</li>
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
                            <form action="{{route("dashboard.user.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                  <div class="col-md-6">

                                        <label>اسم المستخدم <span class="tx-danger">*</span></label>
                                      <input type="text" name="name" required="" class="form-control" value="{{old('name')}}">
                                      @error('name')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                    <div class="col-md-6">
                                              <label>البريد الالكترونى <span class="tx-danger">*</span></label>
                                        <input type="email" name="email" required="" class="form-control" value="{{old('email')}}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                      </div>
                                      <br>
                              <div class="form-row">
                                    <div class="col">
                                          <label>الباسورد <span class="tx-danger">*</span></label>
                                        <input type="password" name="password" required="" class="form-control" >
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                          <label>تاكيد الباسورد<span class="tx-danger">*</span></label>
                                        <input type="password" name="password_confirmation" required="" class="form-control" >
                                        @error('confirm-password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>الصلاحيات</label>
                                        <select name="role" class="form-control js-example-basic-single p-0">
                                            <option disabled selected>اختار الصلاحية</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{old("role") ==  $role->id ? 'selected' : ''}}> {{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                      <label>الحالة</label>
                                  <select name="status" class="form-control js-example-basic-single p-0">
                                          <option value="1">مفعل</option>
                                          <option value="0">غير مفعل</option>
                                      </select>
                                    </div>
                                  </div>



                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Token <span class="tx-danger"></span></label>
                                        <input type="text" name="token"  class="form-control" >
                                        @error('token')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label>Instance<span class="tx-danger"></span></label>
                                        <input type="text" name="instance_id" required="" class="form-control" >
                                        @error('instance_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>


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
