<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_apartments', function (Blueprint $table) {
            $table->id();
            $table->integer("apartment_price")->nullable();  //سعر الوحدة
            $table->text("total_installments")->nullable(); // عدد الاقساط
            $table->unsignedBigInteger("apartment_id");

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
        Schema::dropIfExists('sell_apartments');
    }
}
