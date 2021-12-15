<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediators', function (Blueprint $table) {
            $table->id();
            $table->string("name",100)->nullable();
            $table->string("title", 100)->nullable();
            $table->string("phone", 15)->nullable();
            $table->string("other_phone", 15)->nullable();
            $table->mediumText("comment")->nullable();
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
        Schema::dropIfExists('mediators');
    }
}
