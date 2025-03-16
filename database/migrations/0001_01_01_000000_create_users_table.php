<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('complement')->nullable();
            $table->string('zip_code');
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('address_id')->constrained('addresses');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('cpf')->unique();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('user_group_id')->constrained('user_groups');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('address_id')->constrained('addresses');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('registration_number')->unique();
            $table->string('status');
            $table->boolean('active')->default(true);
            $table->foreignId('establishment_id')->constrained('establishments');
            $table->timestamps();
        });

        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('registered_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('plan_id')->constrained('plans');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('muscle_group');
            $table->timestamps();
        });

        Schema::create('check_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->dateTime('entry_date');
            $table->dateTime('exit_date')->nullable();
            $table->timestamps();
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialization');
            $table->string('registration_number')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->string('available_schedule');
            $table->timestamps();
        });

        Schema::create('student_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('teacher_id')->constrained('teachers');
            $table->string('goal');
            $table->date('creation_date');
            $table->foreignId('status_id')->constrained('statuses');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->boolean('active')->default(true);
            $table->decimal('amount', 10, 2);
            $table->dateTime('payment_date');
            $table->string('payment_method');
            $table->foreignId('status_id')->constrained('statuses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('student_trainings');
        Schema::dropIfExists('check_ins');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('exercises');
        Schema::dropIfExists('registered_plans');
        Schema::dropIfExists('plans');
        Schema::dropIfExists('students');
        Schema::dropIfExists('establishments');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_groups');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('statuses');
    }
};