@extends('layouts.master')
@section('css')


@section('title')
   Clear Un Sent
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Clear Un Sent</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">Clear Un Sent</li>
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
                 <h5>Delete  Instant messages will be deleted (Un Sent)</h5>
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
                            <input type="hidden" class="StatusMessage" name="status" value="unsent">
                            <button type="submit" class="btn btn-outline-danger btn-md text-center m-auto">
                                <i class="fa fa-trash-o"></i>
                                Clear Un Sent
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
               token =  $(".tokenApi").val(),
               status =  $(".StatusMessage").val();

          $.ajax({
              url: action,
              type: method,
              dataType:"json",
              data: {token : token ,status: status } ,
              success: function (data) {
                  console.log(data);
                 if(data.success == "done") {
                    alert("Clear Un Sent Already Done Thanks");
                     // location.reload();
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
