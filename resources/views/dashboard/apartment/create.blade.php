@extends('layouts.master')
@section('css')


@section('title')
    اضافة وحدة جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  اضافة وحدة جديد</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">اضافة وحدة جديد</li>
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
                        <form method="post"  action="{{route("dashboard.apartment.store")}}" autocomplete="off" enctype="multipart/form-data" id="apartmentFrom">
                            @csrf
                            {{method_field('post')}}

                            <div class="row">
                                <!-- Start Col-->
                                <div class="col-md-12">
                                    <h6 style="font-family: 'Cairo', sans-serif;color: red"> حدد  نوع الوحدة السكانية  </h6><br>
                                </div>
                                <!-- End Col-->

                                <!-- Start Col-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sell">  تمليك : <span class="text-danger">*</span></label>
                                        <input value="sell" type="radio"  id="sell" name="apartment_type">
                                    </div>
                                    <div class="alert alert-danger apartment_type d-none"></div>
                                </div>
                                <!-- End Col-->

                                <!-- Start Col-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rent">  ايجار : <span class="text-danger">*</span></label>
                                        <input value="rent" type="radio"  id="rent" name="apartment_type">
                                    </div>
                                    <div class="alert alert-danger apartment_type d-none"></div>
                                </div>
                                <!-- End Col-->

                                <!-- Start Col-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rent_w_furniture">  ايجار مفروش : <span class="text-danger">*</span></label>
                                        <input value="rent_w_furniture" type="radio"  id="rent_w_furniture" name="apartment_type">
                                    </div>
                                    <div class="alert alert-danger apartment_type d-none"></div>
                                </div>
                                <!-- End Col-->
                                <div class="col-md-12 apartment-type">

                                </div>

                            </div>
                            <hr class="my-5">

                            <div class="row">
                                <div class="col-md-12">
                                    <h6 style="font-family: 'Cairo', sans-serif;color: red"> حدد  نوع المعاملة  </h6><br>
                                </div>
                                <!-- Start Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="owners">  مالك : <span class="text-danger">*</span></label>
                                        <input value="owners" type="radio"  id="owners" name="personal_type">
                                    </div>
                                    <div class="alert alert-danger personal_type d-none"></div>
                                </div>
                                <!-- End Col -->

                                <!-- Start Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mediators">  وسيط : <span class="text-danger">*</span></label>
                                        <input value="mediators" type="radio"  id="mediators" name="personal_type">
                                    </div>
                                    <div class="alert alert-danger personal_type d-none"></div>
                                </div>
                                <!-- End Col -->

                                <div class="p-type col-md-12"></div>
                            </div>

                             <hr class="my-5">





                            <h6 style="font-family: 'Cairo', sans-serif;color: red">معلومات الوحدة</h6><br>
                            <div class="row">
                                <!-- Start Col-->
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="city">مدينة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2 cityId" name="city" id="city">
                                                <option selected disabled>اختار المدينة...</option>
                                                @foreach($cities  as $city)
                                                    <option value="{{$city->id}}">{{$city->city}}</option>
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
                                                <option value="{{$i}}">{{$i}}</option>
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
                                        @for($i = 0 ; $i <= 6 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor

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
                                                <option value="{{$i}}">{{$i}}</option>
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
                                            <option selected disabled value="NULL">اختار الاطلالة...</option>
                                            <option value="street">شارع</option>
                                            <option value="big_garden">حديقة كبيرة</option>
                                            <option value="small_garden">حديقة صغيرة</option>
                                            <option value="parking">باركينج</option>
                                            <option value="opening">مفتوح</option>
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
                                            <option selected disabled value="NULL">اختار الاتجاه...</option>
                                            <option value="north">شمال</option>
                                            <option value="east"> شرق</option>
                                            <option value="west"> غرب</option>
                                            <option value="south">جنواب</option>
                                        </select>
                                    </div>
                                    <div class="alert alert-danger directions d-none"></div>
                                </div>
                                <!-- End Col-->

                                <!-- Start Col-->
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                            <label for="decoration">التشطيب  : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="decoration" id="decoration">
                                            <option selected disabled value="NULL">اختار الاتجاه...</option>
                                            <option value="company">شركة</option>
                                            <option value="private"> خاص</option>
                                            <option value="company_change"> تعديل خاص</option>

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
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="alert alert-danger total_rooms d-none"></div>
                                </div>
                                <!-- End Col-->

                                <!-- Start Col-->
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label for="total_bathroom"> عدد الحمامات : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="total_bathroom" id="total_bathroom">
                                            <option selected disabled value="NULL">اختار  عدد الحمامات...</option>
                                            @for($i = 1 ; $i <= $numbers ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="alert alert-danger total_bathroom d-none"></div>
                                </div>
                                <!-- End Col-->
                                <!-- Start Col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>مساحة الوحدة بلمتر : <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="apartment_space">

                                    </div>
                                    <div class="alert alert-danger apartment_space d-none"></div>
                                </div>
                                <!-- End Col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="garden"> مساحة الحديقة <span class="noGarden text-danger d-none" style="cursor: pointer;"> عودة</span> </label>
                                        <select class="custom-select mr-sm-2" name="garden" id="garden">
                                            <option selected disabled value="NULL"> هل يوجد حديقة ...</option>
                                            <option value="1"> نعم</option>
                                            <option value="0"> لا</option>
                                        </select>
                                    </div>
                                    <div class="alert alert-danger garden d-none"></div>
                                </div>
                                <!-- Start Col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="electric">  الكهرباء : <span class="text-danger">*</span></label>
                                        <input type="hidden" name="electric" value="0">
                                        <input name="electric" type="checkbox" id="electric" value="1">
                                    </div>
                                    <div class="alert alert-danger electric d-none"></div>
                                </div>
                                <!-- End Col -->

                                <!-- Start Col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gas">  الغاز : <span class="text-danger">*</span></label>
                                        <input type="hidden" name="gas" value="0">
                                        <input name="gas" type="checkbox"  id="gas" value="1">
                                    </div>
                                    <div class="alert alert-danger gas d-none"></div>
                                </div>
                                <!-- End Col -->

                                <!-- Start Col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="water">  مياة : <span class="text-danger">*</span></label>
                                        <input type="hidden" name="water" value="0">
                                        <input name="water" type="checkbox"  id="water" value="1">
                                    </div>
                                    <div class="alert alert-danger water d-none"></div>
                                </div>
                                <!-- End Col -->


                                <!-- Start Col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telephone">  خط ارضى : <span class="text-danger">*</span></label>
                                        <input type="hidden" name="telephone" value="0">
                                        <input name="telephone" type="checkbox"  id="telephone" value="1">
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
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right d-block" type="submit">اضافة وحدة</button>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="form-group">
                                        <div class="progress d-none">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                            <div class="status">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
$(document).ready(function() {



    //Start Store Apartment
        $("form#apartmentFrom").on("submit",function (e) {
            e.preventDefault();

            $(".alert-ajax ul").empty();
            let inputData= [
                '.apartment_type','.personal_type',
                '.owner_name', '.owner_phone',
                '.mediators_name','.mediators_phone',
                '.city','.step','.group','.apartment_price',
                '.total_installments','.rent_insurance','.rent_value',
                '.duration_contract','.annual_expenses','.mediators_other_phone',
                '.mediators_title', '.mediators_comment','.owner_other_phone',
                '.owner_comment', '.city','.step','.group','.building',
                '.floor','.apartment_no','.view','.directions','.total_rooms',
                '.total_bathroom','.apartment_space','.garden','.electric','.gas',
                '.telephone','.water','.images','.videos'
            ],
                fromData = new FormData(this);


            $.ajax({


                xhr: function() {
                    let xhr = new window.XMLHttpRequest();
                        // if($("input[type='file']").get(0).files.length !== 0) {
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    let percentComplete = Math.ceil(evt.loaded / evt.total  * 100);
                                    console.log(percentComplete);
                                    $(".progress").removeClass("d-none");
                                    $(".progress-bar").css("width", percentComplete+'%', function() {
                                        return $(this).attr("aria-valuenow", percentComplete) + "%";
                                    })
                                    $(".status").html(percentComplete + "%")
                                }
                            }, false);
                        // }
                    return xhr;
                },
                url: "{{URL::to("dashboard/apartment/store")}}",
                data: fromData,
                async: true,
                timeout: 60000,
                cache:false,
                contentType: false,
                processData: false,
                type: "post",
                dataType:"json",
                success:function (data) {
                  if(data.status == true){
                      alert("تم ادخال الوحدة بنجاح");
                      location.reload();
                  }
                  console.log(data);
                },
                error:function (jqXHR,textStatus,errorThrown) {
                    $.each(inputData,function (id,data) {
                        $(data).addClass("d-none");
                    });
                    $(".progress-bar").removeClass("bg-success").addClass("bg-danger");
                if(jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;
                    $.each(errors,function (id,data) {

                        $("." + id).removeClass("d-none").html(data);
                    })
                }else{
                    alert( "Store Apartment SomeThing Error " +  errorThrown )
                }
                },
            });

        });
    //End Store Apartment

// Start Apartment Type ['Sell' Or 'rent' Or 'Rent_w_Furniture']
    $('input[name="apartment_type"]').on("change",function () {
        let type=  $(this).val();
        $("#pre-loader").fadeIn(1000,function(){
            $.ajax({
                url: "{{URL::to("dashboard/apartment")}}/" + type,
                type: 'GET',
                dataType: "html",
                success:function (data) {
                    $(".apartment-type").html(data);
                },
                error:function (one,two,three) {
                    alert("Apartment_Type error to found data Error " + one + ' ' + two + ' ' + ' ' + three );
                }
            });
            $(this).fadeOut(2000);
        });
    });
// End Personal Type


//Start Change total_installments
    $(document).on('change',"select#total_installments",function () {
            let totalAksat = "عدد الاقساط :-",
                valueElkast = " قيمة كل قسط :- ",
                agmaleAlaksat = " الجمالى مجموع الاقساط :-",
                algha = "الجهة التابعة للاقساط :-",
                    lastWord = totalAksat + "&#10; &#10;" + valueElkast + "&#10; &#10;" + agmaleAlaksat + "&#10; &#10;" + algha;
        if($(this).val() == 1){
            $(this).replaceWith("<textarea class='form-control' rows='7' name='total_installments' id='total_installments'>"+ lastWord +"</textarea>");
            $(".noInstallments").removeClass("d-none")
        }
    });

    $(document).on('click','.noInstallments',function () {
        $("#total_installments").replaceWith(`
              <select class="custom-select mr-sm-2" name="total_installments" id="total_installments">
                    <option selected disabled value="NULL"> هل يوجد اقساط ...</option>
                    <option value="1"> نعم</option>
                    <option value="0"> لا</option>
                </select>
            `);
        $(this).addClass("d-none");
    });
//End Change total_installments

// Start Personal Type ['owner' Or 'Mediators']
$('input[name="personal_type"]').on("change",function () {
   let type=  $(this).val();
    $("#pre-loader").fadeIn(1000,function(){
        $.ajax({
            url: "{{URL::to("dashboard/apartment")}}/" + type,
            type: 'GET',
            dataType: "html",
            success:function (data) {
                $(".p-type").html(data);
            },
            error:function (jqXHR,textStatus,errorThrown) {
                alert("Personal_Type error to found data Error "  + jqXHR + ' ' + textStatus + ' ' + errorThrown );
            }
        });
        $(this).fadeOut(2000);
    });
});
// End Personal Type

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
});// End Jquery

</script>
@endsection
