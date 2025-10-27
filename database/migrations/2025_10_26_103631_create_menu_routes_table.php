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
        Schema::create('menu_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('menu_id');
            $table->string('section_or_route')->nullable();
            $table->integer('sort')->nullable();
            $table->string('route')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Seed example data
        $now = now();

        DB::table('menu_routes')->insert([
            ['name' => 'Add',    'menu_id' => 17, 'section_or_route' => 'route', 'sort' => 1, 'route' => 'admin.role-management.role-info.add', 'status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Edit',   'menu_id' => 17, 'section_or_route' => 'route', 'sort' => 2, 'route' => 'admin.role-management.role-info.edit', 'status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Delete', 'menu_id' => 17, 'section_or_route' => 'route', 'sort' => 3, 'route' => 'admin.role-management.role-info.destroy', 'status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Add',    'menu_id' => 23, 'section_or_route' => 'route', 'sort' => 1, 'route' => 'admin.user-management.user-info.add', 'status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Edit',   'menu_id' => 23, 'section_or_route' => 'route', 'sort' => 2, 'route' => 'admin.user-management.user-info.edit', 'status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Delete', 'menu_id' => 23, 'section_or_route' => 'route', 'sort' => 3, 'route' => 'admin.user-management.user-info.destroy', 'status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_routes');
    }
};
