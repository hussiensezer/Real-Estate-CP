<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string("name" , 100)->nullable();
            $table->string("phone" , 15)->nullable();
            $table->unsignedBigInteger("apartment_id");
            $table->string("other_phone",15)->nullable();
            $table->mediumText("comment")->nullable();
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
        Schema::dropIfExists('owners');
    }
}
