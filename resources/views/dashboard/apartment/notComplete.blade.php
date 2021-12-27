@extends('layouts.master')
@section('css')

    @toastr_css
    <style>
    td{
        cursor: help;
    }
    </style>
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
                            <thead class="table-header">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">  تم الاضافة بوسطة</th>
                                <th scope="col">  المدينة</th>
                                <th scope="col">  المرحلة</th>
                                <th scope="col">  المجموعة</th>
                                <th scope="col">  نوع الوحدة</th>
                                <th scope="col">   المساحة</th>
                                <th scope="col">   عدد الغرف</th>
                                <th scope="col">   عدد الحمامات</th>
                                <th scope="col">  الدور</th>
                                <th scope="col"> الحالة</th>
                                <th scope="col"> صور </th>

                                <th>تاريخ الانشاء</th>

                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($apartments as $i => $apartment)

                                <tr class="">
                                    <td class="{{$apartment->complete == 0 ? 'bg-danger text-white' : ''}}">{{$i+ 1}}</td>
                                    <td title="تم الاضافة  بواسطة">{{$apartment->userId->name}}</td>
                                    <td title="المدينة">{{$apartment->cityId->city}}</td>
                                    <td title="المرحلة">{{$apartment->stepId->name}}</td>
                                    <td title="المجموعة">{{$apartment->groupId->name}}</td>
                                    <td title="نوع الوحدة" >@lang("global." .$apartment->apartment_type ) </td>
                                    <td title="المساحة">
                                        @if($apartment->apartment_space !== NULL)
                                            {{$apartment->apartment_space}}
                                        @else
                                            <del class="text-danger"> غير متوفر</del>
                                        @endif
                                    </td>
                                    <td title="عدد الغرف">
                                        @if($apartment->total_rooms !== NULL)
                                            {{$apartment->total_rooms}}
                                        @else
                                            <del class="text-danger"> غير متوفر</del>
                                        @endif
                                    </td>
                                    <td title="عدد الحمامات">
                                        @if($apartment->total_bathroom !== NULL)
                                            {{$apartment->total_bathroom}}
                                        @else
                                            <del class="text-danger"> غير متوفر</del>
                                        @endif
                                    </td>
                                    <td title="الدور ">
                                        @if($apartment->floor !== NULL)
                                            @lang("global.floor_".$apartment->floor)
                                        @else
                                            <del class="text-danger"> غير متوفر</del>
                                        @endif
                                    </td>
                                    <td title="الحالة ">
                                        <div class="badge  badge-{{$apartment->available == 1 ? 'success' : 'danger'}}" title="{{$apartment->available == 1 ? 'متوفرة فى الحال' : 'غير متوفرة'}}"> </div>
                                    </td>
                                    <td>
                                        <div class="text-{{$apartment->images_count !== 0 ? 'success' : 'danger'}}" title="{{$apartment->images_count}} صور">   {{$apartment->images_count > 0 ? 'نعم' : 'لا'}}</div>
                                    </td>
                                    <td title="{{$apartment->created_at->diffForHumans()}}">{{$apartment->created_at}}</td>
                                    @if($apartment->user_id == auth()->user()->id || auth()->user()->can('info_access'))
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
                                                    <a class="dropdown-item" href="{{route("dashboard.apartment.mediator.edit", $apartment->id)}}">تعديل بيانات الوسيط </a>
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
                                    @endif
                                    <td title="اظهار  بيانات الوحدة">
                                        <a href="{{route("dashboard.apartment.show", $apartment->id)}}" class="btn btn-outline-warning ">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td title="ارسال واتساب">
                                        <a href="{{route("dashboard.apartment.whatsApp", $apartment->id)}}" class="btn btn-outline-success ">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                    </td>
                                    @can('apartment_destroy')
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
                                    @endcan
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{ $apartments->links() }}
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
    $(document).ready(function () {
        // $(document).scroll(function () {
        //     let y = $(this).scrollTop();
        //     if( y > 100) {
        //         $(".admin-header").removeClass("fixed-top");
        //         $(".table-header").css({
        //             'background-color' : 'black',
        //             'width' : '100% !important',
        //             'z-index' : '2147483647',
        //             'position' : 'fixed',
        //             'top' : '0',
        //         });
        //         $(".table-header th").css({
        //             'padding-right' :  '5px',
        //             'padding-left' :  '5px',
        //         })
        //     }else {
        //         $(".admin-header").addClass("fixed-top");
        //     }
        // })
    })
</script>

@endsection
