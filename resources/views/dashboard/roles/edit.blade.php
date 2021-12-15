@extends('layouts.master')
@section('css')


@section('title')
    تعديل صلاحية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  تعديل صلاحية</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">تعديل صلاحية</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route("dashboard.role.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 m-auto text-center">

                                        <label>اسم الصلاحية <span class="tx-danger">*</span></label>
                                        <input type="text" name="name" required="" class="form-control" value="{{$roles->name}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row my-5">

                                    @foreach($roles->permissions as $permission)
                                        <div class="col-md-2 my-2">
                                            <label for="{{$permission->name}}">@lang("global." . $permission->name)</label>
                                            <input type="checkbox"  value="{{$permission->id}}" id="{{$permission->name}}" name="permissions[]" checked>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 text-center my-5">
                                        <button class="btn btn-success btn-sm nextBtn btn-lg " type="submit">اضافة </button>
                                    </div>
                                </div>
                            </form>
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
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>
@endsection
