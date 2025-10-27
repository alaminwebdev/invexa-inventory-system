<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort');
            $table->timestamps();
        });

        // Seed default English designations
        DB::table('designations')->insert([
            ['name' => 'System Manager', 'sort' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'System Analyst', 'sort' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Senior System Analyst', 'sort' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Senior Maintenance Engineer', 'sort' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Senior Programmer', 'sort' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assistant Programmer', 'sort' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Network Engineer', 'sort' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Database Administrator', 'sort' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Computer Operator', 'sort' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Website Administrator', 'sort' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
