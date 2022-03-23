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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->tinyText('description');
            $table->text('address');
            $table->string('amount');
            $table->text('image');
            $table->string('floor');
            $table->string('year');
            $table->tinyInteger('storeroom');
            $table->tinyInteger('balcony');
            $table->string('area');
            $table->tinyInteger('room');
            $table->tinyInteger('toilet');
            $table->tinyInteger('parking');
            $table->string('tags')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('post_categories');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sell_status');
            $table->tinyInteger('type');
            $table->bigInteger('view')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
