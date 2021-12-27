@extends('layouts.master')
@section('css')


@section('title')
    تعديل بيانات ايجار الوحدة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  تعديل بيانات ايجار الوحدة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">الصفحة الرائسية</a></li>
                    <li class="breadcrumb-item active">تعديل بيانات ايجار الوحدة</li>
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
                        <div class="col-md-12">
                            <br>
                            <form action="{{route("dashboard.apartment.rent.update" , $rent->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">  الايجار</h6><br>
                                    </div>
                                    <!-- Start Col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rent_value">القيمة الايجارية : <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="rent_value"  value="{{ $rent->rent_value}}">
                                        </div>
                                        <div class="alert alert-danger rent_value d-none"></div>

                                    </div>
                                    <!-- End Col-->
                                    <!-- Start Col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rent_insurance">التامين : <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="rent_insurance" value="{{ $rent->rent_insurance}}">
                                        </div>
                                        <div class="alert alert-danger rent_insurance d-none"></div>

                                    </div>
                                    <!-- End Col-->



                                    <!-- Start Col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="duration_contract"> مدة العقد بالشهر : <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="duration_contract" value="{{ $rent->duration_contract}}">
                                        </div>
                                        <div class="alert alert-danger duration_contract d-none"></div>

                                    </div>
                                    <!-- End Col-->

                                    <!-- Start Col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="annual_expenses"> مصروفات الوحدة السنوية : <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="annual_expenses"  value="{{ $rent->annual_expenses}}">
                                        </div>
                                        <div class="alert alert-danger annual_expenses d-none"></div>

                                    </div>
                                    <!-- End Col-->
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تعديل </button>
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
        //Start Change total_installments
        $(document).on('change',"select#total_installments",function () {
            let totalAksat = "عدد الاقساط :-",
                valueElkast = " قيمة كل قسط :- ",
                agmaleAlaksat = " الجمالى مجموع الاقساط :-",
                algha = "الجهة التابعة للاقساط :-",
                lastWord = totalAksat + "&#10; &#10;" + valueElkast + "&#10; &#10;" + agmaleAlaksat + "&#10; &#10;" + algha;
            if($(this).val() == 1){
                $(this).replaceWith("<textarea class='form-control' rows='7' name='total_installments' id='total_installments'>"+ lastWord +"</textarea>");
                $(".noInstallments").removeClass("d-none")
            }
        });

        $(document).on('click','.noInstallments',function () {
            $("#total_installments").replaceWith(`
              <select class="custom-select mr-sm-2" name="total_installments" id="total_installments">
                    <option selected disabled value="NULL"> هل يوجد اقساط ...</option>
                    <option value="1"> نعم</option>
                    <option value="0"> لا</option>
                </select>
            `);
            $(this).addClass("d-none");
        });
        //End Change total_installments

    </script>
@endsection
