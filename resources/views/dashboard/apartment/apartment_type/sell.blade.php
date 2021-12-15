
    <div class="row">
        <!-- -Start Inner Col-->
        <div class="col-md-12">
            <h6 style="font-family: 'Cairo', sans-serif;color: blue">تمليك  </h6><br>
        </div>
        <!-- -End Inner Col-->

        <!-- -Start Inner Col-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="apartment_price">  تمليك : <span class="text-danger">*</span></label>
                <input  type="number"  id="apartment_price" name="apartment_price" class="form-control">
            </div>
            <div class="alert alert-danger apartment_price d-none"></div>

        </div>
        <!-- -End Inner Col-->

        <!-- -Start Inner Col-->
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="total_installments">  هل يوجد اقساط :<span class="text-danger d-none noInstallments" style="cursor: pointer"> عودة</span>   <span class="text-danger">*</span></label>
                <select class="custom-select mr-sm-2" name="total_installments" id="total_installments">
                    <option selected disabled>  هل يوجد اقساط...</option>
                    <option value="1">نعم</option>
                    <option value="0">لا</option>
                </select>
            </div>
            <div class="alert alert-danger total_installments d-none"></div>
        </div>
        <!-- -End Inner Col-->
    </div>
