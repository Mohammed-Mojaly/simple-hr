<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('id_number')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('fullname');
            $table->decimal('salary');
            $table->string('phone')->unique();
            $table->string('avatar')->nullable();
            $table->boolean('is_work')->default(1);
            $table->boolean('gender');
            $table->string('password');

            $table->text('roles_name');
            $table->foreignId('postion_id')->constrained()->onDelete('cascade');
            $table->timestamp('email_verified_at')->now();
            $table->rememberToken();
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('users');
    }
}
