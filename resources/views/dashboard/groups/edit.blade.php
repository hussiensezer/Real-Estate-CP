@extends('layouts.master')
@section('css')


@section('title')
    تعديل مجموعة جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  تعديل مجموعة جديد</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">تعديل مجموعة جديد</li>
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
                            <form action="{{route("dashboard.group.update" , $group->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-row">
                                    <div class="col-md-6">

                                        <label>اسم المجموعة <span class="tx-danger">*</span></label>
                                        <input type="text" name="name" required="" class="form-control" value="{{$group->name}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>المدينة</label>
                                        <select name="city" class="form-control js-example-basic-single p-0 cityId" required>
                                            <option disabled selected> اختار المدينة  .......</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{$group->city_id ==  $city->id ? 'selected' : ''}}>{{$city->city}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="form-row my-3">

                                    <div class="col-md-6">
                                        <label>المرحلة</label>
                                        <select name="step"  class="form-control js-example-basic-single p-0 steps" required>
                                            <option disabled selected> اختار المرحلة  .......</option>
                                            @foreach($steps as $step)
                                                <option value="{{$step->id}}" {{$group->step_id ==  $step->id ? 'selected' : ''}}>{{$step->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>الحالة</label>
                                        <select name="status" class="form-control js-example-basic-single p-0" required>
                                            <option value="1" {{$group->status == 1 ? 'selected' : ''}}>مفعل</option>
                                            <option value="0" {{$group->status == 0 ? 'selected' : ''}}>غير مفعل</option>
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

            $(".cityId").change(function(){
                let cityId = $(this).val();
                // If Condition To Check Empty Or Not
                if(cityId) {

                    $(".ajaxLoading").fadeIn(1000,function(){
                        $(this).fadeOut(1000);
                        // Ajax
                        $.ajax({
                            url: "{{URL::to("dashboard/city/steps")}}/" + cityId,
                            type: 'GET',
                            dataType: "json",
                            success: function (data) {
                                $(".steps").empty();
                                $.each(data,function (id,step) {
                                    $(".steps").append('<option value="'+
                                        step.id + '">' + step.name + "</option>"
                                    );
                                });
                            }
                        });
                    });

                }
            });
        });

    </script>
@endsection
