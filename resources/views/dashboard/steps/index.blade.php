@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
كل المراحل
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
                    كل المراحل
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
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> الاسم المرحلة</th>
                                <th> الاسم  المدينة</th>
                                <th> الحالة</th>
                                <th>تاريخ الانشاء</th>
                                <th> تاريخ التعديل</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($steps as $i => $step)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{$step->name}}</td>
                                    <td>{{$step->cityId->city}}</td>

                                    <td>
                                      <div class="badge  badge-{{$step->status == 1 ? 'success' : 'danger'}}"> </div>
                                    </td>
                                    <td>{{$step->created_at}}</td>
                                    <td>{{$step->updated_at}}</td>
                                    <td>
{{--                                        <a href="{{route("dashboard.step.show" , $step->id)}}" class="text-warning mx-2"><i class="fa fa-eye" title="مشاهد البروفايل"></i></a>--}}
                                        <a href="{{route("dashboard.step.edit" , $step->id)}}" class="text-primary mx-2"><i class="fa fa-edit" title=" تعديل البيانات"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
