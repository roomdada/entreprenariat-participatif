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
            $table->string('identifier')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name')->virtualAs('CONCAT(first_name, " ", last_name)');
            $table->string('contact');
            $table->string('profil_path')->nullable();
            $table->string('email')->unique();
            $table->foreignIdFor(\App\Models\Role::class)->constrained('roles')->cascadeOnDelete();
            $table->integer('user_type_id')->index()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamp('password_changed_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('password');
            $table->softDeletes();
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
