@extends('layouts.master')
@section('css')

    @toastr_css
@section('title')
ارسال بيانات وحدة واتساب
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
                        <h5 class="col-md-3">  ارسال بيانات وحدة واتساب</h5>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route("dashboard.apartment.sendWhatsApp", $apartment->id)}}" method="post">
                        @csrf
                        {{method_field('post')}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number">رقم العميل</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="directions"> ارسال الاتجاهات للعميل</label>
                                <input type="hidden" value="0" name="directions">
                                <input type="checkbox" value="1" id="directions"name="directions" class="form-check">
                            </div>
                            <div class="col-md-6 form-group py-4">
                                <button class="btn btn-outline-success btn-sm mt-3">
                                    <i class="fa fa-whatsapp"></i>
                                    ارسال البيانات
                                </button>
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


@endsection
