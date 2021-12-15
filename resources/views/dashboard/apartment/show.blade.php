@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
بيانات الوحدات
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

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header ">
                    <div class="row">
                        <h5 class="col-md-3">  بيانات الوحدات</h5>
                        <div class="col-md-3">
                           @if($apartment->available == 1)
                               <div class="badge badge-success">متاحة</div>
                           @else
                                <div class="badge badge-danger">غير متاحة</div>
                           @endif
                        </div>

                        <div class="col-md-3">
                            @if($apartment->apartment_type == 'sell')
                                <div class="badge badge-success">بيع</div>
                            @elseif($apartment->apartment_type == 'rent')
                                <div class="badge badge-info"> ايجار</div>
                            @else
                                <div class="badge badge-warning"> ايجار مفروش</div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <div class="badge badge-dark">{{$apartment->userId->name}}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        <div class="acd-group">
                            <a href="#" class="acd-heading"> بيانات الشقة الاساسية</a>
                            <div class="acd-des" style="display: none;">
                                <!-- Start Row -->
                                <div class="row">
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">المدينة : - </b>
                                        @if($apartment->city_id !== NULL)
                                            <span>{{$apartment->cityId->city }}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">المرحلة : - </b>
                                        @if($apartment->step_id !== NULL)
                                            <span>{{$apartment->stepId->name }}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">المجموعة : - </b>
                                        @if($apartment->group_id !== NULL)
                                            <span>{{$apartment->groupId->name}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
{{--                                    <div class="col-md-4 my-3">--}}
{{--                                        <b class="text-primary text-bold">تم الاضافة بواسطة : - </b>--}}
{{--                                        <span>{{$apartment->user_id !== NULL ? $apartment->userId->name : 'لا توجد معلومات'}}</span>--}}
{{--                                    </div>--}}
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">رقم العمارة : - </b>
                                        @if($apartment->no_building !== NULL)
                                            <span>{{$apartment->no_building}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">رقم الدور : - </b>
                                        @if($apartment->floor !== NULL)
                                            <span>{{$apartment->floor}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">رقم الشقة : - </b>
                                        @if($apartment->no_apartment !== NULL)
                                            <span>{{$apartment->no_apartment}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">مساحة الشقة : - </b>
                                        @if($apartment->apartment_space !== NULL)
                                            <span>{{$apartment->apartment_space}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold"> عدد الغرف : - </b>
                                        @if($apartment->total_rooms !== NULL)
                                            <span>{{$apartment->total_rooms}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold"> عدد الحمامات : - </b>
                                        @if($apartment->total_bathroom !== NULL)
                                            <span>{{$apartment->total_bathroom}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الحديقة : - </b>
                                        @if($apartment->garden_space !== NULL)
                                            <span>{{$apartment->garden_space}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الغاز : - </b>
                                        @if($apartment->gas !== NULL)
                                            <span>{{$apartment->gas == 1 ? 'يوجد' : 'لا يوجد او غير معلوم'}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  المياة : - </b>
                                        @if($apartment->water !== NULL)
                                            <span>{{$apartment->water == 1 ? 'يوجد' : 'لا يوجد او غير معلوم'}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->


                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الكهرباء : - </b>
                                        @if($apartment->Electric !== NULL)
                                            <span>{{$apartment->Electric == 1 ? 'يوجد' : 'لا يوجد او غير معلوم'}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الهاتف الارضى : - </b>
                                        @if($apartment->telephone !== NULL)
                                            <span>{{$apartment->telephone == 1 ? 'يوجد' : 'لا يوجد او غير معلوم'}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold"> نوع الوحدة : - </b>
                                        @if($apartment->apartment_type !== NULL)
                                            <span>@lang("global." . $apartment->apartment_type)</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->



                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الاطلالة : - </b>
                                        @if($apartment->view !== NULL)
                                            <span>@lang("global." . $apartment->view)</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الاتجاة : - </b>
                                        @if($apartment->directions !== NULL)
                                            <span>@lang("global." . $apartment->directions)</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  التشطيب : - </b>
                                        @if($apartment->decoration !== NULL)
                                            <span>@lang("global." . $apartment->decoration)</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-12 my-3">
                                        <b class="text-primary text-bold">  التعليق : - </b>
                                        @if($apartment->comments !== NULL)
                                            <span>{{$apartment->comments}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                        </div>
                        @if($apartment->mediator_count !== 0)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">معلومات الوسيط.</a>
                            <div class="acd-des" style="display: none;">
                                <div class="row">
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <b class="text-primary text-bold">  الاسم : - </b>
                                    @if($apartment->mediator->name !== NULL)
                                        <span>{{$apartment->mediator->name}}</span>
                                    @else
                                        <del class="text-danger">لا توجد معلومات</del>
                                    @endif
                                </div>
                                <!--End Col -->
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold"> الصفة : - </b>
                                        @if($apartment->mediator->title !== NULL)
                                            <span>{{$apartment->mediator->title}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <b class="text-primary text-bold">  رقم الهاتف : - </b>
                                    @if($apartment->mediator->phone !== NULL)
                                        <span>{{$apartment->mediator->phone}}</span>
                                    @else
                                        <del class="text-danger">لا توجد معلومات</del>
                                    @endif
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <b class="text-primary text-bold"> رقم اخر : - </b>
                                    @if($apartment->mediator->other_phone !== NULL)
                                        <span>{{$apartment->mediator->other_phone}}</span>
                                    @else
                                        <del class="text-danger">لا توجد معلومات</del>
                                    @endif
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <b class="text-primary text-bold"> تفصيل المعاينة : - </b>
                                    @if($apartment->mediator->comment !== NULL)
                                        <span>{{$apartment->mediator->comment}}</span>
                                    @else
                                        <del class="text-danger">لا توجد معلومات</del>
                                    @endif
                                </div>
                                <!--End Col -->
                            </div>
                            </div>
                        </div>
                        @endif
                        @if($apartment->sell_count !== 0)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">معلومات البيع</a>
                            <div class="acd-des" style="display: none;">
                                <div class="row">
                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  سعر البيع : - </b>
                                        @if($apartment->sell->apartment_price !== NULL)
                                            <span>{{$apartment->sell->apartment_price}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->

                                    <!--Start Col -->
                                    <div class="col-md-4 my-3">
                                        <b class="text-primary text-bold">  الاقساط : - </b>
                                        @if($apartment->sell->total_installments !== NULL)
                                            <span>{{$apartment->sell->total_installments}}</span>
                                        @else
                                            <del class="text-danger">لا توجد معلومات</del>
                                        @endif
                                    </div>
                                    <!--End Col -->
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($apartment->rent_count !== 0)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">معلومات @lang("global." . $apartment->apartment_type)</a>
                                <div class="acd-des" style="display: none;">
                                    <div class="row">
                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold">  التامين : - </b>
                                            @if($apartment->rent->rent_insurance !== NULL)
                                                <span>{{$apartment->rent->rent_insurance}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->

                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold">  القيمة الايجارية : - </b>
                                            @if($apartment->rent->rent_value !== NULL)
                                                <span>{{$apartment->rent->rent_value}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->

                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold"> مدة العقد بالشهر: - </b>
                                            @if($apartment->rent->duration_contract !== NULL)
                                                <span>{{$apartment->rent->duration_contract}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->

                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold"> مصروفات الوحدة السنوية: - </b>
                                            @if($apartment->rent->annual_expenses !== NULL)
                                                <span>{{$apartment->rent->annual_expenses}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($apartment->owner_count !== 0)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">معلومات المالك</a>
                                <div class="acd-des" style="display: none;">
                                    <div class="row">
                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold">  الاسم : - </b>
                                            @if($apartment->owner->name !== NULL)
                                                <span>{{$apartment->owner->name}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->
                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold">  الهاتف : - </b>
                                            @if($apartment->owner->phone !== NULL)
                                                <span>{{$apartment->owner->phone}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->

                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold">  الهاتف بديل : - </b>
                                            @if($apartment->owner->other_phone !== NULL)
                                                <span>{{$apartment->owner->other_phone}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->

                                        <!--Start Col -->
                                        <div class="col-md-4 my-3">
                                            <b class="text-primary text-bold">  تفصيل المعاينة : - </b>
                                            @if($apartment->owner->comment !== NULL)
                                                <span>{{$apartment->owner->comment}}</span>
                                            @else
                                                <del class="text-danger">لا توجد معلومات</del>
                                            @endif
                                        </div>
                                        <!--End Col -->
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($apartment->images_count !== 0)
                            <div class="acd-group">
                                <a href="#" class="acd-heading"> الصور</a>
                                <div class="acd-des" style="display: none;">

                                    <div class="uk-child-width-1-6@m" uk-grid uk-lightbox="animation: fade">
                                        @foreach($apartment->images as $image)
                                            <div>
                                                <a class="uk-inline" href="{{ URL::to('public/media/images/'. $image->path)}}" data-caption="{{$image->type}}">
                                                    <img src="{{ URL::to('public/media/images/'. $image->path)}}" alt="" class="w-75">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endif
                        @if($apartment->media_count !== 0)
                            <div class="acd-group">
                                <a href="#" class="acd-heading"> الفيديوهات</a>
                                <div class="acd-des" style="display: none;">

                                    <div class="uk-child-width-1-2@m" uk-grid uk-lightbox="animation: fade">
                                        @foreach($apartment->media as $video)
                                            <div>
                                                <a class="uk-inline" href="{{ URL::to('public/media/videos/'. $video->path)}}" data-caption="{{$video->type}}">
                                                    <video src="{{ URL::to('public/media/videos/'. $video->path)}}" alt="" class="w-100"></video>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endif
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
