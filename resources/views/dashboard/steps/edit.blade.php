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
                            <form action="{{route("dashboard.step.update", $step->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-row">
                                    <div class="col-md-6">

                                        <label>اسم المرحلة <span class="tx-danger">*</span></label>
                                        <input type="text" name="name" required="" class="form-control" value="{{$step->name}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>المدينة</label>
                                        <select name="city" class="form-control js-example-basic-single p-0">
                                            <option disabled selected> اختار المدينة  .......</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{$step->city_id == $city->id ? 'selected' : ''}}>{{$city->city}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-row my-3">
                                    <div class="col-md-6">
                                        <label>الحالة</label>
                                        <select name="status" class="form-control js-example-basic-single p-0">
                                            <option value="1" {{$step->status == 1 ? 'selected' : ''}}>مفعل</option>
                                            <option value="0" {{$step->status == 0 ? 'selected' : ''}}>غير مفعل</option>
                                        </select>
                                    </div>

                                </div>



                                <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" type="submit">تعديل </button>
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
