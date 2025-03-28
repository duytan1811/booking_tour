<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Bảng Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->date('day_of_birth')->nullable();
            $table->tinyInteger('gender')->comment('1-male, 2-female')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->timestamps();
        });

        // Bảng Tours
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('destination');
            $table->date('departure_time');
            $table->integer('age_restriction')->nullable();
            $table->string('dress_code')->nullable();
            $table->date('return_time')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('people')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->boolean('is_outstanding')->default(false);
            $table->string('type')->nullable();
            $table->timestamps();
        });

        // Bảng Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(1)->nullable();
            $table->timestamps();
        });

        // Bảng Blog
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('image_1')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('type')->comment('1-blog, 2-tip');
            $table->integer('status')->default(1)->nullable();
            $table->boolean('is_outstanding')->default(false);
            $table->timestamps();
        });


        // Bảng Comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('object_id');
            $table->integer('type')->comment('1-tour, 2-blog');
            $table->text('comment')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });

        // Bảng Contacts
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('comment');
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });

        // Bảng TourBookings
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        // Bảng TourBookingDetails
        Schema::create('tour_booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_booking_id')->constrained('tour_bookings')->onDelete('cascade');
            $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->string('field')->nullable();
            $table->string('desc')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_booking_details');
        Schema::dropIfExists('tour_bookings');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('users');
        Schema::dropIfExists('settings');
    }
};
