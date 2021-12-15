<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string("rent_insurance")->nullable();// التامين الايجارى
            $table->string("rent_value")->nullable();// القيمة الايجارى
            $table->string("duration_contract")->nullable();//  مدة العقد
            $table->unsignedBigInteger("apartment_id");
            $table->string("annual_expenses")->nullable();//  مصرفات الوحدة السنوية
            $table->timestamps();
            $table->foreign("apartment_id")->references("id")->on("apartments")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
