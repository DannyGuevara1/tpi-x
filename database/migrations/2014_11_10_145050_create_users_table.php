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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedTinyInteger('age');

            $table->string('username')->unique();
            $table->string('country');
            $table->text('address');
            $table->text('description');
            $table->string('shipping_address');
            $table->decimal('discount');
            $table->decimal('money_reffer');
            $table->string('gender');


            $table->string('rol');
            $table->string('image_profile');
            $table->string('referral_link');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
