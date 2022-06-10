<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('role_id');
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
	        $table->string('email')->unique();
	        $table->string('phone', 25)->nullable();
            $table->enum('gender', ['M','F','N'])->nullable()->comment('M=>Male, F=>Female, N=>None');
            $table->date('date_of_birth')->nullable();
            $table->text('pic_path')->nullable();
            $table->tinyInteger('have_address')->default(0)->comment('0=>No, 1=>Yes');
            $table->text('thumbnail')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
	        $table->string('country', 8)->nullable();
            $table->string('postal_code', 30)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_details');
    }
}
