@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
كل الصلاحيات
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
                    كل الصلاحيات
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
                                <th> الاسم الصلاحية</th>
                                <th> الجرد</th>
                                <th></th>
{{--                                <th></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $i => $role)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->guard_name}}</td>
{{--                                    <td>--}}
{{--                                        <a href="{{route("dashboard.role.show" , $role->id)}}" class="text-warning mx-2"><i class="fa fa-eye" title="مشاهد الصلاحيات"></i></a>--}}
{{--                                    </td>--}}
                                    <td>
                                        <a href="{{route("dashboard.role.edit" , $role->id)}}" class="text-primary mx-2"><i class="fa fa-edit" title=" تعديل البيانات"></i></a>
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
