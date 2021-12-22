@extends('layouts.master')
@section('css')


@section('title')
    اضافة اعلان
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  اضافة اعلان</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active"> اضافة اعلان</li>
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
                            <form action="{{route("dashboard.ads.store")}}" method="post">
                                @csrf
                                {{method_field('post')}}
                                <div class="form-row">
                                  <div class="col-md-6">

                                        <label>نص الرسالة <span class="tx-danger">*</span></label>
                                      <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
                                      @error('message')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                   <div class="col-md-6">
                                       <label for=""> عدد الاشخاص من</label>
                                       <input type="number" name="ppl_start" id="" class="form-control">
                                       <label for=""> عدد الاشخاص الى</label>
                                       <input type="number" name="ppl_end" id="" class="form-control">
                                   </div>
                                </div>

                                      <br>



                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">ارسال </button>
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
