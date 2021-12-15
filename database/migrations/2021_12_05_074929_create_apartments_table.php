<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("city_id")->nullable();// المدينة
            $table->unsignedBigInteger("step_id")->nullable();// المرحلة
            $table->unsignedBigInteger("group_id")->nullable(); // المجموعة
            $table->unsignedBigInteger("user_id");// تم الانشاء بواسطة
            $table->string("no_building" ,'10')->nullable(); // رقم العمارة
            $table->string("floor" ,'10')->nullable(); // رقم الطابق او الدور
            $table->string("no_apartment" ,'10')->nullable();// رقم الشقة
            $table->integer("apartment_space")->nullable();// مساحة الشقة
            $table->integer("total_rooms")->nullable();// عدد الغرف
            $table->integer("total_bathroom")->nullable();// عدد الحمامات
            $table->integer("garden_space")->nullable(); // مساحة الحديقة
            $table->string("serial_no", '10')->nullable();
            $table->boolean("gas")->nullable(); // غاز
            $table->boolean("water")->nullable(); // مياة
            $table->boolean("Electric")->nullable(); // كهرباء
            $table->boolean("telephone")->nullable(); // هاتف ارضى
            $table->enum('apartment_type',["sell" , 'rent', 'rent_w_furniture'])->nullable(); // نوع التعامل [بيع , ايجار , ايجار مفروش]
            $table->enum('view',["street" , 'big_garden', 'small_garden','parking','opening'])->nullable(); // نوع الاطلالة [شارع , حديقة كبيرة , حديقة صغيرة ,باركينج, مفتوح]
            $table->enum('directions',["north" , 'east', 'west','south'])->nullable();// الاتجاهات [شمال , شرق ,غرب,جنوب]
            $table->enum('decoration',['company','private','company_change'])->nullable(); // نوع التشطيب [شركة ,  تعديل شركة,خاص ]
            $table->boolean("photos")->default(0); // هل يوجد صور
            $table->boolean("videos")->default(0);  // هل يوجد فيديوهان
            $table->text("comments")->nullable(); // ملاحظات
            $table->boolean("available")->nullable(1) ; // هل متاحة ول لا
            $table->timestamps();

            $table->foreign("city_id")->references("id")->on("cities")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("step_id")->references("id")->on("steps")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("group_id")->references("id")->on("groups")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
