<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('otp_id');
            $table->integer('role_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otp_roles');
    }
};
