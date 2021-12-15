<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string("path")->nullable();
            $table->enum('type',['video', 'image'])->nullable();
            $table->unsignedBigInteger("apartment_id");
            $table->boolean("status")->default(1)->nullable();
            $table->foreign("apartment_id")->references("id")->on("apartments")->onDelete("cascade")->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
