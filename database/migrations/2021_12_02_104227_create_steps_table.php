<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("city_id");
            $table->boolean("status")->default(1);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("city_id")->references("id")->on("cities")->onDelete("cascade")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}
