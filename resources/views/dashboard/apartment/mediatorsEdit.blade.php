@extends('layouts.master')
@section('css')


@section('title')
    تعديل بيانات المالك
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  تعديل بيانات المالك</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">تعديل بيانات المالك</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="ajaxLoading">
        <img src={{URL::asset("assets/images/pre-loader/loader-01.svg")}}>
    </div>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route("dashboard.apartment.mediator.update" , $mediator->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"> معلومات الوسيط</h6><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> اسم الوسيط : <span class="text-danger">*</span></label>
                                            <input  type="text" name="mediators_name"  class="form-control" value="{{$mediator->name}}">
                                        </div>
                                        <div class="alert alert-danger mediators_name d-none"></div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>الهاتف : <span class="text-danger">*</span></label>
                                            <input  class="form-control" name="mediators_phone" type="text"  value="{{$mediator->phone}}" >
                                        </div>
                                        <div class="alert alert-danger mediators_phone d-none"></div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>هاتف بديل : </label>
                                            <input  class="form-control" name="mediators_other_phone" type="text" value="{{$mediator->other_phone}}">
                                        </div>
                                        <div class="alert alert-danger mediators_other_phone d-none"></div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> الصفة :<span class="text-danger">*</span> </label>
                                            <input  class="form-control" name="mediators_title" type="text"  value="{{$mediator->title}}">
                                        </div>
                                        <div class="alert alert-danger mediators_title d-none"></div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> ملاحظات  المعاينة: <span class="text-danger">*</span></label>
                                            <textarea name="mediators_comment" id="" cols="30" rows="1" class="form-control">{{$mediator->comment}}</textarea>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger owner_comment d-none"></div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تعديل </button>

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

@endsection
