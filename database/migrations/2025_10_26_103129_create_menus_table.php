<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('module_id')->default(1);
            $table->integer('parent');
            $table->string('url_path');
            $table->integer('sort');
            $table->string('icon');
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Current timestamp for all rows
        $now = now();

        DB::table('menus')->insert([
            ['id' => 11, 'name' => 'Site Setting Management', 'module_id' => 1, 'parent' => 0, 'url_path' => '#', 'sort' => 1, 'icon' => 'ion-arrow-move', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'name' => 'Site Setting', 'module_id' => 1, 'parent' => 11, 'url_path' => 'admin/site-setting-management/site-setting-info/list', 'sort' => 1, 'icon' => 'ion-arrow-shrink', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 13, 'name' => 'Email Configuration', 'module_id' => 1, 'parent' => 11, 'url_path' => 'admin/site-setting-management/email-configuration-info/list', 'sort' => 2, 'icon' => 'ion-arrow-shrink', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'name' => 'Module', 'module_id' => 1, 'parent' => 11, 'url_path' => 'admin/site-setting-management/module-info/list', 'sort' => 3, 'icon' => 'ion-log-in', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'name' => 'Menu', 'module_id' => 1, 'parent' => 11, 'url_path' => 'admin/site-setting-management/menu-info/list', 'sort' => 4, 'icon' => 'ion-arrow-shrink', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'name' => 'Role Management', 'module_id' => 1, 'parent' => 0, 'url_path' => '#', 'sort' => 2, 'icon' => 'ion-log-out', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'name' => 'Role List', 'module_id' => 1, 'parent' => 16, 'url_path' => 'admin/role-management/role-info/list', 'sort' => 1, 'icon' => 'ion-heart-broken', 'status' => 1, 'created_by' => 1, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'name' => 'Role Permission', 'module_id' => 1, 'parent' => 16, 'url_path' => 'admin/role-management/role-permission-info/list', 'sort' => 2, 'icon' => 'ion-help-buoy', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'name' => 'Profile Management', 'module_id' => 1, 'parent' => 0, 'url_path' => '#', 'sort' => 3, 'icon' => 'ion-log-out', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'name' => 'Profile Info', 'module_id' => 1, 'parent' => 19, 'url_path' => 'admin/profile-management/profile-info/profile', 'sort' => 1, 'icon' => 'ion-heart-broken', 'status' => 1, 'created_by' => 1, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 21, 'name' => 'Change Password', 'module_id' => 1, 'parent' => 19, 'url_path' => 'admin/change-password', 'sort' => 2, 'icon' => 'ion-help-buoy', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 22, 'name' => 'User Management', 'module_id' => 1, 'parent' => 0, 'url_path' => '#', 'sort' => 4, 'icon' => 'ion-log-out', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 23, 'name' => 'User List', 'module_id' => 1, 'parent' => 22, 'url_path' => 'admin/user-management/user-info/list', 'sort' => 1, 'icon' => 'ion-heart-broken', 'status' => 1, 'created_by' => 1, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 31, 'name' => 'Member Management', 'module_id' => 1, 'parent' => 0, 'url_path' => '#', 'sort' => 7, 'icon' => 'ion-log-out', 'status' => 1, 'created_by' => null, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 32, 'name' => 'Member List', 'module_id' => 1, 'parent' => 31, 'url_path' => 'admin/member-management/member-info/list', 'sort' => 1, 'icon' => 'ion-heart-broken', 'status' => 1, 'created_by' => 1, 'updated_by' => null, 'deleted_by' => null, 'deleted_at' => null, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
