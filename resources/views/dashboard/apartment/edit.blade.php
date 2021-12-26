@extends('layouts.master')
@section('css')


@section('title')
    تعديل بيانات الوحدة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  تعديل بيانات الوحدة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">تعديل بيانات الوحدة</li>
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
                            <form action="{{route("dashboard.apartment.update" , $apartment->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                    <div class="row">
                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="city">مدينة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2 cityId" name="city" id="city">
                                                <option selected disabled>اختار المدينة...</option>
                                                @foreach($cities  as $city)
                                                    <option value="{{$city->id}}" {{$city->id == $apartment->city_id ? 'selected' : ''}}>{{$city->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="alert alert-danger city d-none"></div>
                                    </div>
                                    <!-- End Col-->

                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="step">المرحلة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2 stepId" name="step" id="step">
                                                <option selected disabled>اختار المرحلة...</option>
                                                @foreach($steps  as $step)
                                                    <option value="{{$step->id}}" {{$step->id == $apartment->step_id ? 'selected' : ''}}>{{$step->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="alert alert-danger step d-none"></div>
                                    </div>
                                    <!-- End Col-->
                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="group">مجموعة : <span class="text-danger">*</span></label>

                                            <select class="custom-select mr-sm-2 groupId" name="group" id="group">
                                                <option selected disabled>اختار المجموعة...</option>
                                                @foreach($groups  as $group)
                                                    <option value="{{$group->id}}" {{$group->id == $apartment->group_id ? 'selected' : ''}}>{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="alert alert-danger group d-none"></div>
                                    </div>
                                    <!-- End Col-->


                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="building">رقم العمارة : <span class="text-danger">*</span></label>

                                            <select class="custom-select mr-sm-2" name="building" id="building">
                                                <option selected disabled value="NULL">اختار العمارة...</option>
                                                @for($i = 1 ; $i <= $numbers ; $i++)
                                                    <option value="{{$i}}" {{$i == $apartment->no_building ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="alert alert-danger building d-none"></div>
                                    </div>
                                    <!-- End Col-->

                                        <!-- Start Col-->
                                        <div class="col-md-4 my-2">
                                            <div class="form-group">
                                                <label for="floor">رقم الدور : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="floor" id="floor">
                                                    <option selected disabled value="NULL">اختار الدور...</option>
                                                    <option value="0" {{$apartment->floor == 0 ? 'selected' :''}}>@lang("global.floor_0")</option>
                                                    <option value="1" {{$apartment->floor == 1 ? 'selected' :''}}> @lang("global.floor_1")</option>
                                                    <option value="2" {{$apartment->floor == 2 ? 'selected' :''}}> @lang("global.floor_2")</option>
                                                    <option value="3" {{$apartment->floor == 3 ? 'selected' :''}}> @lang("global.floor_3")</option>
                                                    <option value="4" {{$apartment->floor == 4 ? 'selected' :''}}> @lang("global.floor_4")</option>
                                                    <option value="5" {{$apartment->floor == 5 ? 'selected' :''}}>@lang("global.floor_5") </option>
                                                    <option value="6" {{$apartment->floor == 6 ? 'selected' :''}}> @lang("global.floor_6")</option>
                                                </select>
                                            </div>
                                            <div class="alert alert-danger floor d-none"></div>
                                        </div>
                                        <!-- End Col-->



                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="apartment_no">رقم الشقة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="apartment_no" id="apartment_no">
                                                <option selected disabled value="NULL">اختار الشقة...</option>
                                                @for($i = 1 ; $i <= $numbers ; $i++)
                                                    <option value="{{$i}}" {{$i == $apartment->no_apartment ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="alert alert-danger apartment_no d-none"></div>
                                    </div>
                                    <!-- End Col-->
                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="view" >الاطلالة  : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="view" id="view">
                                                <option selected disabled value="NULL" {{"NULL" == $apartment->view ? 'selected' : ''}}>اختار الاطلالة...</option>
                                                <option value="street" {{"street" == $apartment->view ? 'selected' : ''}}>شارع</option>
                                                <option value="big_garden" {{"big_garden" == $apartment->view ? 'selected' : ''}}>حديقة كبيرة</option>
                                                <option value="small_garden" {{"small_garden" == $apartment->view ? 'selected' : ''}}>حديقة صغيرة</option>
                                                <option value="parking" {{"parking" == $apartment->view ? 'selected' : ''}}>باركينج</option>
                                                <option value="opening" {{"opening" == $apartment->view ? 'selected' : ''}}>مفتوح</option>
                                            </select>
                                        </div>
                                        <div class="alert alert-danger view d-none"></div>
                                    </div>
                                    <!-- End Col-->

                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="directions">الاتجاهات  : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="directions" id="directions">
                                                <option selected disabled value="NULL" {{"NULL" == $apartment->directions ? 'selected' : ''}}>اختار الاتجاه...</option>
                                                <option value="north" {{"north" == $apartment->directions ? 'selected' : ''}}>شمال</option>
                                                <option value="east" {{"east" == $apartment->directions ? 'selected' : ''}}> شرق</option>
                                                <option value="west" {{"west" == $apartment->directions ? 'selected' : ''}}> غرب</option>
                                                <option value="south" {{"south" == $apartment->directions ? 'selected' : ''}}>جنواب</option>
                                            </select>
                                        </div>
                                        <div class="alert alert-danger directions d-none"></div>
                                    </div>
                                    <!-- End Col-->
                                    <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="total_rooms"> عدد الغرف : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="total_rooms" id="total_rooms">
                                                <option selected disabled value="NULL">اختار  عدد الغرف...</option>
                                                @for($i = 1 ; $i <= $numbers ; $i++)
                                                    <option value="{{$i}}" {{$i == $apartment->total_rooms ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="alert alert-danger total_rooms d-none"></div>
                                    </div>
                                    <!-- End Col-->

                                    <!-- Start Col-->
                                    <div class="col-md-3 my-2">
                                        <div class="form-group">
                                            <label for="total_bathroom"> عدد الحمامات : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="total_bathroom" id="total_bathroom">
                                                <option selected disabled value="NULL">اختار  عدد الحمامات...</option>
                                                @for($i = 1 ; $i <= $numbers ; $i++)
                                                    <option value="{{$i}}" {{$i == $apartment->total_bathroom ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="alert alert-danger total_bathroom d-none"></div>
                                    </div>
                                    <!-- End Col-->
                                    <!-- Start Col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>مساحة الوحدة بلمتر : <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="apartment_space" value="{{$apartment->apartment_space}}">

                                        </div>
                                        <div class="alert alert-danger apartment_space d-none"></div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col-md-3">
                                        <div class="form-group">

                                        @if($apartment->garden_space == NULL || $apartment->garden_space == 0)
                                                <label for="garden"> مساحة الحديقة <span class="noGarden text-danger d-none" style="cursor: pointer;"> عودة</span> </label>
                                                <select class="custom-select mr-sm-2" name="garden" id="garden">
                                                    <option  disabled value="NULL" {{$apartment->garden_space == NULL ? "selected" : ''}}> هل يوجد حديقة ...</option>
                                                    <option value="1"> نعم</option>
                                                    <option value="0" {{$apartment->garden_space == 0 ? "selected" : ''}}> لا</option>
                                                </select>
                                               @else
                                                <label for="garden"> مساحة الحديقة <span class="noGarden text-danger" style="cursor: pointer;"> عودة</span> </label>
                                                <input type="number" class="form-control" value="{{$apartment->garden_space}}" id="yesGarden">
                                                @endif

                                        </div>
                                        <div class="alert alert-danger garden d-none"></div>
                                    </div>
                                        <!-- Start Col-->
                                        <div class="col-md-3 my-2">
                                            <div class="form-group">
                                                <label for="decoration">التشطيب  : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="decoration" id="decoration">
                                                    <option selected disabled value="NULL">اختار الاتجاه...</option>
                                                    <option value="company" {{$apartment->decoration == "company" ? 'selected'  :'' }}>شركة</option>
                                                    <option value="private" {{$apartment->decoration == 'private' ? 'selected'  :'' }}> خاص</option>
                                                    <option value="company_change" {{$apartment->decoration == "company_change" ? 'selected'  :'' }}> تعديل خاص</option>

                                                </select>
                                            </div>
                                            <div class="alert alert-danger directions d-none"></div>
                                        </div>
                                        <!-- End Col-->
                                    <!-- Start Col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="electric">  الكهرباء : <span class="text-danger">*</span></label>
                                            <input type="hidden" name="electric" value="0">
                                            <input name="electric" type="checkbox" id="electric" value="1" {{$apartment->Electric == 1 ? 'checked'  :'' }}>
                                        </div>
                                        <div class="alert alert-danger electric d-none"></div>
                                    </div>
                                    <!-- End Col -->

                                    <!-- Start Col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gas">  الغاز : <span class="text-danger">*</span></label>
                                            <input type="hidden" name="gas" value="0">
                                            <input name="gas" type="checkbox"  id="gas" value="1"  {{$apartment->gas == 1 ? 'checked'  :'' }}>
                                        </div>
                                        <div class="alert alert-danger gas d-none"></div>
                                    </div>
                                    <!-- End Col -->

                                    <!-- Start Col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="water">  مياة : <span class="text-danger">*</span></label>
                                            <input type="hidden" name="water" value="0">
                                            <input name="water" type="checkbox"  id="water" value="1"  {{$apartment->water == 1 ? 'checked'  :'' }}>
                                        </div>
                                        <div class="alert alert-danger water d-none"></div>
                                    </div>
                                    <!-- End Col -->


                                    <!-- Start Col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telephone">  خط ارضى : <span class="text-danger">*</span></label>
                                            <input type="hidden" name="telephone" value="0">
                                            <input name="telephone" type="checkbox"  id="telephone" value="1"  {{$apartment->telephone == 1 ? 'checked'  :'' }}>
                                        </div>
                                        <div class="alert alert-danger telephone d-none"></div>
                                    </div>
                                    <!-- End Col -->

                                    <!-- Start Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="images">الصور : </label>
                                            <input name="images[]" type="file"  id="images" class="form-control" multiple accept="image/png, image/gif, image/jpeg ,image/jpg">
                                        </div>
                                        <div class="alert alert-danger images d-none"></div>
                                    </div>
                                    <!-- End Col -->
                                    <!-- Start Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="videos">الفيديوهات : </label>
                                            <input name="videos[]" type="file"  id="videos" class="form-control" multiple accept="video/mp4,video/x-m4v,video/*">
                                        </div>
                                        <div class="alert alert-danger videos  d-none"></div>

                                    </div>
                                    <!-- End Col -->

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="apartment_comment">ملاحظات الوحدة</label>
                                            <textarea  id="" name="comments" cols="30" rows="5" class="form-control">{{$apartment->comments}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status"> الحالة</label>
                                            <select class="custom-select mr-sm-2" name="status" id="status">
                                                <option selected disabled >اختار الحالة...</option>
                                                <option value="1" {{"1" == $apartment->available ? 'selected' : ''}}>متاحة</option>
                                                <option value="0" {{"0" == $apartment->available ? 'selected' : ''}}>غير متاحة</option>
                                            </select>
                                        </div>
                                    </div>
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
