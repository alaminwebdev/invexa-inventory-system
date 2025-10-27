<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('sort')->nullable();
            $table->string('color')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        $now = now();

        // Seed data
        DB::table('modules')->insert([
            ['id' => 1, 'name' => 'Moduleless', 'status' => 1, 'sort' => null, 'color' => null, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name' => 'Master setup', 'status' => 1, 'sort' => null, 'color' => null, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
