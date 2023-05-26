<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('county_id');
            $table->string('aprtmnt_name');
            $table->string('main_image')->nullable();
            $table->string('extras');
            $table->string('price');
            $table->unsignedBigInteger('house_aprt_type');
            $table->string('closest_town');
            $table->string('email');
            $table->string('location');
            $table->string('contact_phone_number');
            $table->longText('description');
            $table->boolean('vacant')->default(1);
            $table->foreign('county_id')
                  ->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('house_aprt_type')
                  ->references('id')->on('apartment_types')->onDelete('cascade');
            
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
        Schema::dropIfExists('listings');
    }
};
