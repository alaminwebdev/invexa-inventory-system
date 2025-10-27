<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Seed table
        DB::table('otps')->insert([
            ['id' => 1, 'name' => 'Email',  'description' => null, 'status' => 1],
            ['id' => 2, 'name' => 'Mobile', 'description' => null, 'status' => 1],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
