@extends('layouts.master')
@section('css')


@section('title')
    Get Qr Code Scan
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  Get Qr Code Scan</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">Get Qr Code Scan</li>
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
                <div class="card-header">
                 <h5> QR image for authentication</h5>
                </div>
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

                        <form action="{{$methods}}" method="get" enctype="application/x-www-form-urlencoded" id="GetQrCode">
                            <input type="hidden" class="tokenApi" name="token" value="{{$token}}">
                            <button type="submit" class="btn btn-success btn-md text-center m-auto">
                                <i class="fa fa-qrcode"></i>
                                طلب الكود
                            </button>
                        </form>
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
        //
        // $("#GetQrCode").on("submit",function (e) {
        //     e.preventDefault();
        //
        //    let  action = $(this).attr("action"),
        //        method = $(this).attr("method"),
        //        token =  $(".tokenApi").val(),
        //        iframe = action + "?token=" + token;
        //    console.log(iframe);
        //   $.ajax({
        //       url: action,
        //       type: method,
        //       dataType:"html",
        //       data: {token : token} ,
        //       success: function (data) {
        //           $(".QrCode").append(`<iframe src="${iframe}" frameborder="0" height="800" width="800"> </iframe>`);
        //       },
        //       error: function (jqXHR,textStatus,errorThrown) {
        //           alert("XHR : -" + jqXHR + " Text Status : - " + textStatus + " Error Thrown :- " + errorThrown);
        //       }
        //   })
        //
        // });
    });
    </script>
@endsection
