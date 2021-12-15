@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
كل الوحدات
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
                <h5 class="card-header">
                    كل الوحدات
                </h5>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($apartments as $i => $apartment)
                                <tr>
                                    <td>{{$i+ 1}}</td>
                                    <td>{{$apartment->userId->name}}</td>
                                    <td>{{$apartment->cityId->city}}</td>
                                    <td>{{$apartment->stepId->name}}</td>
                                    <td>{{$apartment->groupId->name}}</td>
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
                                            {{$apartment->floor}}
                                        @else
                                            <del class="text-danger"> غير متوفر</del>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="badge  badge-{{$apartment->available == 1 ? 'success' : 'danger'}}" title="{{$apartment->available == 1 ? 'متوفرة فى الحال' : 'غير متوفرة'}}"> </div>
                                    </td>
                                    <td>
                                        <div class="text-{{$apartment->images_count !== 0 ? 'success' : 'danger'}}" title="{{$apartment->images_count}} صور">   {{$apartment->images_count > 0 ? 'نعم' : 'لا'}}</div>
                                    </td>
                                    <td title="{{$apartment->created_at->diffForHumans()}}">{{$apartment->created_at}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route("dashboard.apartment.edit", $apartment->id)}}">تعديل بيانات الوحدة</a>
                                                @if($apartment->owner_count == 1)
                                                    <a class="dropdown-item" href="{{route("dashboard.apartment.owner.edit", $apartment->id)}}"> تعديل بيانات المالك</a>
                                                @endif
                                                @if($apartment->mediator_count == 1)
                                                    <a class="dropdown-item" href="#">تعديل بيانات الوسيط </a>
                                                @endif
                                                @if($apartment->sell_count == 1)
                                                    <a class="dropdown-item" href="{{route("dashboard.apartment.sell.edit", $apartment->id)}}">تعديل بيانات البيع </a>

                                                @endif
                                                @if($apartment->rent_count == 1)
                                                    <a class="dropdown-item" href="{{route("dashboard.apartment.rent.edit",$apartment->id)}}">تعديل بيانات الايجار </a>
                                                @endif

                                            </div>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
