@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
كل المعاينات
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
                    كل المعاينات
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
                                <th> الاسم العميل</th>
                                <th> هاتف العميل  </th>
                                <th>  كود الوحدة  </th>
                                <th> تم المعاينة بواسطة</th>
                                <th>تفصيل المعاينة </th>
                                <th> ميعاد المتابعة القادمة </th>
                                <th> تاريخ الانشاء</th>
                                <th> تاريخ التعديل</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $i => $feed)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{$feed->client_name}}</td>
                                    <td>{{$feed->client_number}}</td>
                                    <td>{{$feed->apartment_code}}</td>
                                    <td>{{$feed->user->name}}</td>
                                    <td>{{$feed->description}}</td>
                                    <td>{{$feed->other_feedback}}</td>
                                    <td>{{$feed->created_at}}</td>
                                    <td>{{$feed->updated_at}}</td>
                                    <td>
                                        <a href="{{route("dashboard.feedback.edit", $feed->id)}}" class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route("dashboard.feedback.destroy", $feed->id)}}" method="post">
                                            @csrf
                                            {{method_field('delete')}}
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
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
