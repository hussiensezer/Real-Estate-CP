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
                            <form action="{{route("dashboard.apartment.owner.update" , $owner->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="row my-3">
                                    <div class="col-md-12"> <h6 style="font-family: 'Cairo', sans-serif;color: blue">معلومات المالك</h6><br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> الاسم : <span class="text-danger">*</span></label>
                                            <input  type="text" name="owner_name"  class="form-control" value="{{$owner->name}}">
                                        </div>
                                        <div class="alert alert-danger owner_name d-none"></div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الهاتف : <span class="text-danger">*</span></label>
                                            <input  class="form-control" name="owner_phone" type="text" value="{{$owner->phone}}">
                                        </div>
                                        <div class="alert alert-danger owner_phone d-none"></div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>هاتف بديل : </label>
                                            <input  class="form-control" name="owner_other_phone" type="text" value="{{$owner->other_phone}}">
                                        </div>
                                        <div class="alert alert-danger owner_other_phone d-none"></div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> ملاحظات : </label>
                                            <p></p>
                                            <textarea name="owner_comment" id="" cols="30" rows="1" class="form-control">{{$owner->comment}}</textarea>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger owner_comment d-none"></div>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تعديل </button>
                                </div>
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
        //Start Change Garden
        $(document).on('click','.noGarden',function () {
            $("#yesGarden").replaceWith(`
              <select class="custom-select mr-sm-2" name="garden" id="garden">
                    <option selected disabled> هل يوجد حديقة ...</option>
                    <option value="1"> نعم</option>
                    <option value="0"> لا</option>
              </select>
            `);
            $(this).addClass("d-none");
        });
        $(document).on('change',"select#garden",function () {
            if($(this).val() == 1){
                $(this).replaceWith('<input type="number" name="garden" id="yesGarden"class="form-control" placeholder="اكتب مساحة الحديقة بلمتر"> ');
                $(".noGarden").removeClass("d-none")
            }
        });
        //End Change Garden
        // Start Get Step Of City
        $(document).on("change",".cityId" ,function(){
            let cityId = $(this).val();
            // If Condition To Check Empty Or Not
            if(cityId) {
                $("#pre-loader").fadeIn(1000,function(){
                    $(this).fadeOut(1000);
                    // Ajax
                    $.ajax({
                        url: "{{URL::to("dashboard/city/steps")}}/" + cityId,
                        type: 'GET',
                        dataType: "json",
                        success: function (data) {
                            $(".stepId").empty();
                            $('.stepId').append("<option selected disabled> اختار المرحلة</option>");
                            $.each(data,function (id,step) {
                                $(".stepId").append('<option value="'+
                                    step.id + '">' + step.name + "</option>"
                                );
                            });
                        },
                        error:function (jqXHR,textStatus,errorThrown) {
                            alert("Step error to found data Error "  + jqXHR + ' ' + textStatus + ' ' + errorThrown );
                        }
                    });
                });
            }
        });
        // End Get Step Of City

        // Start Get Step Of City
        $(document).on('change',".stepId",function(){
            let stepId = $(this).val();
            console.log(stepId)
            // If Condition To Check Empty Or Not
            if(stepId) {
                $("#pre-loader").fadeIn(1000,function(){
                    $(this).fadeOut(1000);
                    // Ajax
                    $.ajax({
                        url: "{{URL::to("dashboard/step/group")}}/" + stepId,
                        type: 'GET',
                        dataType: "json",
                        success: function (data) {
                            $(".groupId").empty();
                            $('.groupId').append("<option selected disabled> اختار المجموعة</option>");
                            $.each(data,function (id,step) {
                                $(".groupId").append('<option value="'+
                                    step.id + '">' + step.name + "</option>"
                                );
                            });
                        },
                        error:function (jqXHR,textStatus,errorThrown) {
                            alert("Group error to found data Error "  + jqXHR + ' ' + textStatus + ' ' + errorThrown );
                        }
                    });
                });
            }
        });
        // End Get Step Of City
    </script>
@endsection
