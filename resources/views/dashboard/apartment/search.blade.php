@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
بحث عن وحدة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')

@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
            <div class="col-md-12">
                <div class="card card-statistics h-100">
                    <h5 class="card-header">
                        بحث عن وحدة
                    </h5>
                    <div class="card-body">
                        <form method="get"  action="{{route("dashboard.apartment.search")}}" autocomplete="off"  id="apartmentFrom">
{{--                            @csrf--}}
{{--                            {{method_field('get')}}--}}

                            <div class="row">
                            <!-- Start Col-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="serial"> السريال </label>
                                        <input type="text" class="form-control" name="serial" value="{{request()->query("serial")}}">
                                    </div>
                                </div>

                                <!-- Start Col-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="apartment_type">نوع الوحدة</label>
                                        <select name="apartment_type" id="" class="custom-select mr-sm-2">
                                            <option  disabled selected>اختار نوع الوحدة...</option>
                                            <option value="sell" {{request()->query("apartment_type") == 'sell' ? 'selected' : ''}}>تمليك</option>
                                            <option value="rent" {{request()->query("apartment_type")  == 'rent' ? 'selected' : ''}}>ايجار</option>
                                            <option value="rent_w_furniture" {{request()->query("apartment_type") == 'rent_w_furniture' ? 'selected' : ''}}>ايجار مفروش</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label for="city">مدينة : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2 cityId" name="city" id="city">
                                        <option  disabled selected>اختار المدينة...</option>
                                        @foreach($cities  as $city)
                                                <option value="{{$city->id}}" {{request()->query("city") == $city->id ? 'selected' : ''}}>{{$city->city}}</option>
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
                                    <select class="custom-select mr-sm-2 stepId" name="step[]" id="step" >
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
                                            <option value="{{$i}}" {{request()->query("building") == $i ? 'selected' : ''}}>{{$i}}</option>
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
                                            <option value="0">@lang("global.floor_0")</option>
                                            <option value="1"> @lang("global.floor_1")</option>
                                            <option value="2"> @lang("global.floor_2")</option>
                                            <option value="3"> @lang("global.floor_3")</option>
                                            <option value="4"> @lang("global.floor_4")</option>
                                            <option value="5">@lang("global.floor_5") </option>
                                            <option value="6"> @lang("global.floor_6")</option>
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
                                            <option value="{{$i}}" {{request()->query("apartment_no") == $i ? 'selected' : ''}}>{{$i}}</option>
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
                                        <option value="street" {{request()->query("view") == "street" ? 'selected' : ''}}>شارع</option>
                                        <option value="big_garden" {{request()->query("view") == "big_garden" ? 'selected' : ''}}>حديقة كبيرة</option>
                                        <option value="small_garden" {{request()->query("view") == "small_garden" ? 'selected' : ''}}>حديقة صغيرة</option>
                                        <option value="parking" {{request()->query("view") == "parking" ? 'selected' : ''}}>باركينج</option>
                                        <option value="opening" {{request()->query("view") == "opening" ? 'selected' : ''}}>مفتوح</option>
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
                                        <option value="north" {{request()->query("directions") == "north" ? 'selected' : ''}}>شمال</option>
                                        <option value="east" {{request()->query("directions") == "east" ? 'selected' : ''}}> شرق</option>
                                        <option value="west" {{request()->query("directions") == "west" ? 'selected' : ''}}> غرب</option>
                                        <option value="south" {{request()->query("directions") == "south" ? 'selected' : ''}}>جنواب</option>
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
                                            <option value="{{$i}}" {{request()->query("total_rooms") == $i ? 'selected' : ''}}>{{$i}}</option>
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
                                            <option value="{{$i}}" {{request()->query("total_bathroom") == $i ? 'selected' : ''}}>{{$i}}</option>
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
                                    <input type="number" class="form-control my-2" name="apartment_space_from" value="{{request()->query("apartment_space_from")}}" placeholder="من">
                                    <input type="number" class="form-control" name="apartment_space_to" value="{{request()->query("apartment_space_to")}}" placeholder="الى">

                                </div>
                                <div class="alert alert-danger apartment_space d-none"></div>
                            </div>
                            <!-- End Col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="garden"> مساحة الحديقة <span class="noGarden text-danger d-none" style="cursor: pointer;"> عودة</span> </label>
                                    <select class="custom-select mr-sm-2" name="garden" id="garden">
                                        <option  disabled  selected> هل يوجد حديقة ...</option>
                                        <option value="1" {{request()->query("garden") != 0 ? 'selected' : ""}}> نعم</option>
                                        <option value="0" > لا</option>
                                    </select>
                                </div>
                                <div class="alert alert-danger garden d-none"></div>
                            </div>

                            <!-- Start Col-->
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label for="directions">الاتجاهات  : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="directions" id="directions">
                                        <option selected disabled value="NULL">اختار نوع ...</option>
                                        <option value="north" {{request()->query("directions") == "north" ? 'selected' : ''}}>شمال</option>
                                        <option value="east" {{request()->query("directions") == "east" ? 'selected' : ''}}> شرق</option>
                                        <option value="west" {{request()->query("directions") == "west" ? 'selected' : ''}}> غرب</option>
                                        <option value="south" {{request()->query("directions") == "south" ? 'selected' : ''}}>جنواب</option>
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
                                            <option value="company" {{request()->query("decoration") == "company" ? 'selected' : ''}}>@lang("global.company")</option>
                                            <option value="private"  {{request()->query("decoration") == "private" ? 'selected' : ''}}> @lang("global.private")</option>
                                            <option value="company_change"  {{request()->query("decoration") == "company_change" ? 'selected' : ''}}> @lang("global.company_change")</option>

                                        </select>
                                    </div>
                                    <div class="alert alert-danger directions d-none"></div>
                                </div>
                                <!-- End Col-->

                                <!-- Start Col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>  ابحث بالمبلغ لشراء وحدة سكنية : <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control my-2" name="moneyStart" value="{{request()->query("moneyStart")}}" placeholder="اقل سعر">
                                        <input type="number" class="form-control" name="moneyEnd" value="{{request()->query("moneyEnd")}}" placeholder="الحد الاقصى">

                                    </div>
                                    <div class="alert alert-danger apartment_space d-none"></div>
                                </div>
                                <!-- End Col -->

                        </div><br>
                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa fa-search"></i>
                                        بحث
                                    </button>

                                    <a href="{{route("dashboard.apartment.destroySessions")}}" class="btn btn-sm btn-primary mx-5" >
                                        <i class="fa fa-edit"></i>
                                        الرجوع للوضع الافتراضى
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
{{--        @if(count($apartments) > 0)--}}
        <div class="col-xl-12 mb-3">
            <div class="card card-statistics h-100">
{{--                <h5 class="card-header">--}}
{{--                    بحث عن وحدة--}}
{{--                </h5>--}}
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

                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0 text-center ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  تم الاضافة بوسطة</th>
                                        <th>  المدينة</th>
                                        <th>  المرحلة</th>
                                        <th>  المجموعة</th>
                                        <th>  نوع الوحدة</th>
                                        <th>   المساحة</th>
                                        <th>   عدد الغرف</th>
                                        <th>   عدد الحمامات</th>
                                        <th>  الدور</th>
                                        <th> الحالة</th>
                                        <th> صور </th>
                                        <th>تاريخ الانشاء</th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($apartments as $i => $apartment)

                                        <tr>
                                            <td>{{$i+ 1}}</td>
                                            <td>{{$apartment->userName}}</td>
                                            <td>{{$apartment->cityName}}</td>
                                            <td>{{$apartment->stepName}}</td>
                                            <td>{{$apartment->groupName}}</td>
{{--                                            <td>{{$apartment->cityId->city}}</td>--}}
{{--                                            <td>{{$apartment->stepId->name}}</td>--}}
{{--                                            <td>{{$apartment->groupId->name}}</td>--}}
                                            <td>@lang("global." .$apartment->apartment_type ) </td>
                                            <td>
                                                @if($apartment->apartment_space !== NULL)
                                                    {{$apartment->apartment_space}}
                                                @else
                                                    <del class="text-danger"> غير متوفر</del>
                                                @endif
                                            </td>
                                            <td>
                                                @if($apartment->total_rooms !== NULL)
                                                    {{$apartment->total_rooms}}
                                                @else
                                                    <del class="text-danger"> غير متوفر</del>
                                                @endif
                                            </td>
                                            <td>
                                                @if($apartment->total_bathroom !== NULL)
                                                    {{$apartment->total_bathroom}}
                                                @else
                                                    <del class="text-danger"> غير متوفر</del>
                                                @endif
                                            </td>
                                            <td>
                                                @if($apartment->floor !== NULL)
                                                    @lang("global.floor_".$apartment->floor)
                                                @else
                                                    <del class="text-danger"> غير متوفر</del>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge  badge-{{$apartment->available == 1 ? 'success' : 'danger'}}" title="{{$apartment->available == 1 ? 'متوفرة فى الحال' : 'غير متوفرة'}}"> </div>
                                            </td>
{{--                                            <td>--}}
{{--                                                <div class="text-{{$apartment->images_count !== 0 ? 'success' : 'danger'}}" title="{{$apartment->images_count}} صور">   {{$apartment->images_count > 0 ? 'نعم' : 'لا'}}</div>--}}
{{--                                            </td>--}}
                                            <td title="">{{$apartment->created_at}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
{{--                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                                        <a class="dropdown-item" href="{{route("dashboard.apartment.edit", $apartment->id)}}">تعديل بيانات الوحدة</a>--}}
{{--                                                        @if($apartment->owner_count == 1)--}}
{{--                                                            <a class="dropdown-item" href="{{route("dashboard.apartment.owner.edit", $apartment->id)}}"> تعديل بيانات المالك</a>--}}
{{--                                                        @endif--}}
{{--                                                        @if($apartment->mediator_count == 1)--}}
{{--                                                            <a class="dropdown-item" href="#">تعديل بيانات الوسيط </a>--}}
{{--                                                        @endif--}}
{{--                                                        @if($apartment->sell_count == 1)--}}
{{--                                                            <a class="dropdown-item" href="{{route("dashboard.apartment.sell.edit", $apartment->id)}}">تعديل بيانات البيع </a>--}}

{{--                                                        @endif--}}
{{--                                                        @if($apartment->rent_count == 1)--}}
{{--                                                            <a class="dropdown-item" href="{{route("dashboard.apartment.rent.edit",$apartment->id)}}">تعديل بيانات الايجار </a>--}}
{{--                                                        @endif--}}

{{--                                                    </div>--}}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route("dashboard.apartment.show", $apartment->id)}}" class="btn btn-outline-warning ">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route("dashboard.apartment.whatsApp", $apartment->id)}}" class="btn btn-outline-success ">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                            </td>
                                            <td title="حذف وحدة">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#apartment_{{$apartment->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="apartment_{{$apartment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">هل متاكد من حذف الوحدة</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for=""> كود الوحدة</label>
                                                                <input type="text" disabled value="{{$apartment->serial_no}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                                                                <form action="{{route("dashboard.apartment.destroy" , $apartment->id)}}" method="post">
                                                                    @csrf
                                                                    {{method_field('delete')}}
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fa fa-trash"></i>
                                                                        تاكيد عملية الحذف
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
            </div>

               <div class="col-md-12 text-center">
                   {{ $apartments->links() }}
               </div>

{{--        @else--}}
{{--            <div class="col-md-12 my-5">--}}
{{--                <h2 class="text-danger text-center">لم يتم العثور على وحدة </h2>--}}
{{--            </div>--}}
{{--        @endif--}}
        </div>




    <!-- row closed -->
@endsection
@section('js')


    @toastr_js
    @toastr_render
    <script>

        $( document ).ready(function() {
            // get Any Parmeters From Url
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
                return false;
            };
            // End Functions

            if($(".cityId") != "") {
                let  cityId = $(".cityId").val();
                let stepId = getUrlParameter('step');
                $.ajax({
                    url: "{{URL::to("dashboard/city/steps")}}/" + cityId,
                    // type: 'GET',
                    dataType: "json",
                    success: function (data) {
                        $(".stepId").empty();
                        $(".stepId").prop("multiple", true);
                        $('.stepId').append("<option selected disabled> اختار المرحلة</option>");
                        $.each(data,function (id,step) {
                            $(".stepId").append(`<option value="${step.id}" ${step.id == stepId ? 'selected' : ''} >${step.name} </option>`);
                        });
                    },
                    error:function (jqXHR,textStatus,errorThrown) {
                        alert("Step error to found data Error "  + jqXHR + ' ' + textStatus + ' ' + errorThrown );
                    }
                });
            }else {console.log("Empty CityId");}
            // End If For CityId
            // Start If For Step
            let stepId = getUrlParameter('step');
            let groupId = getUrlParameter('group');
            if(stepId !== false) {
                $.ajax({
                    url: "{{URL::to("dashboard/step/group")}}/" + stepId,
                    type: 'GET',
                    dataType: "json",
                    success: function (data) {
                        $(".groupId").empty();
                        $('.groupId').append("<option selected disabled> اختار المجموعة</option>");
                        $.each(data,function (id,group) {
                            $(".groupId").append(`<option value="${group.id}" ${group.id == groupId ? 'selected' : ''} >${group.name} </option>`);
                        });
                    },
                    error:function (jqXHR,textStatus,errorThrown) {
                        alert("Group error to found data Error "  + jqXHR + ' ' + textStatus + ' ' + errorThrown );
                    }
                });
            }else {
                console.log("Empty StepId");
            }

        // // Start No Garden
        // $(document).on('click','.noGarden',function () {
        //     $("#yesGarden").replaceWith(`
        //       <select class="custom-select mr-sm-2" name="garden" id="garden">
        //             <option selected disabled> هل يوجد حديقة ...</option>
        //             <option value="1"> نعم</option>
        //             <option value="0"> لا</option>
        //         </select>
        //     `);
        //     $(this).addClass("d-none");
        // });
        // // End No Garden
        //
        //     if(getUrlParameter("garden") != 0) {
        //         $("#garden").replaceWith(`<input type="number" name="garden" id="yesGarden"class="form-control" placeholder="اكتب مساحة الحديقة بلمتر" value="${getUrlParameter("garden")}"> `);
        //         $(".noGarden").removeClass("d-none")
        //     }
        // // Start Select Garden
        // $(document).on('change',"select#garden",function () {
        //     if($(this).val() == 1){
        //         $(this).replaceWith('<input type="number" name="garden" id="yesGarden"class="form-control" placeholder="اكتب مساحة الحديقة بلمتر"> ');
        //         $(".noGarden").removeClass("d-none")
        //     }
        // });
        // // End Select Garden

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
                            $(".stepId").prop("multiple", true);
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
    });
    </script>

@endsection
