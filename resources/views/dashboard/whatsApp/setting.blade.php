@extends('layouts.master')
@section('css')


@section('title')
   Setting
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Setting</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">Setting</li>
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
                    <div class="row">
                       <div class="col-md-6">
                           <h5>Get instance settings</h5>
                       </div>
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-cogs"></i>
                                Edit Setting
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Setting WhatsApp</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{$methods}}" method="post">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                   <div class="form-group col-md-12">
                                                       <label for="delaySend">Send Delay</label>
                                                       <input type="text" id="delaySend" name="sendDelay" class="form-control">
                                                       <input type="hidden" class="tokenApi" name="token" value="{{$token}}">
                                                   </div>

                                               </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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
                   <div class="row my-5">
                       <div class="col-md-6">

                           <form action="{{$methods}}" method="get" enctype="application/x-www-form-urlencoded" id="setting">
                               <input type="hidden" class="tokenApi" name="token" value="{{$token}}">
                               <button type="submit" class="btn btn-success btn-md text-center m-auto">
                                   <i class="fa fa-cog"></i>
                                    Get Setting
                               </button>
                           </form>
                       </div>
                       <div class="col-md-6">
                           <div class="settingData">

                           </div>
                       </div>
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
        $("#setting").on("submit",function (e) {
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
                $.each(data,function (key, value) {
                    $(".settingData").append(`
                        <div>
                                <span class="text-muted"><b>${key} </b></span>
                                <span class="text-danger">${value}</span>

                        </div>
                    `);
                    console.log(key + " => " + value);

                })
              },
              error: function (jqXHR,textStatus,errorThrown) {
                  alert("XHR : -" + jqXHR + " Text Status : - " + textStatus + " Error Thrown :- " + errorThrown);
              }
          })

        });
    });
    </script>
@endsection
