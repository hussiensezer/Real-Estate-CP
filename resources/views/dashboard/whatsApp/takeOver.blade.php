@extends('layouts.master')
@section('css')


@section('title')
   Take Over
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Take Over</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">Take Over</li>
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
                 <h5>Returns the active session if the device has connected to another instance of Web WhatsApp</h5>
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

                        <form action="{{$methods}}" method="post" enctype="application/x-www-form-urlencoded" id="GetTakeOver">
                            <input type="hidden" class="tokenApi" name="token" value="{{$token}}">
                            <button type="submit" class="btn btn-success btn-md text-center m-auto">
                                <i class="fa fa-angle-double-right"></i>
                                Take Over
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
        $("#GetTakeOver").on("submit",function (e) {
            e.preventDefault();

           let  action = $(this).attr("action"),
               method = $(this).attr("method"),
               token =  $(".tokenApi").val();

          $.ajax({
              url: action,
              type: method,
              dataType:"json",
              data: {token : token} ,
              success: function (data) {
                  console.log(data);
                 if(data.success == "done") {
                    alert("Take Over Already Done Thanks");
                     location.reload();
                 }else {
                     console.log("SomeThing Error in TakeOver Try Latter Or Call The Developer For Help");
                 }
              },
              error: function (jqXHR,textStatus,errorThrown) {
                  alert("XHR : -" + jqXHR + " Text Status : - " + textStatus + " Error Thrown :- " + errorThrown);
              }
          })

        });
    });
    </script>
@endsection
