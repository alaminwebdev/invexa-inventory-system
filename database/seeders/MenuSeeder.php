<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuRoute;
use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Module::truncate();
        Menu::truncate();
        MenuRoute::truncate();

        $now = now();

        $modules = [
            ['name' => 'Moduleless', 'status' => 1],
            ['name' => 'Master setup', 'status' => 1],
        ];

        foreach ($modules as $moduleData) {
            Module::create(array_merge($moduleData, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        // Fetch Modules for later use
        $moduleless = Module::where('name', 'Moduleless')->first();
        $masterSetup = Module::where('name', 'Master setup')->first();

        // Parent Menus
        $siteSettingManagement = Menu::create(['name' => 'Site Setting Management', 'module_id' => $moduleless->id, 'parent' => 0, 'url_path' => '#', 'sort' => 1, 'icon' => 'ion-arrow-move', 'status' => 1, 'created_at' => $now, 'updated_at' => $now]);
        $roleManagement = Menu::create(['name' => 'Role Management', 'module_id' => $moduleless->id, 'parent' => 0, 'url_path' => '#', 'sort' => 2, 'icon' => 'ion-log-out', 'status' => 1, 'created_at' => $now, 'updated_at' => $now]);
        $profileManagement = Menu::create(['name' => 'Profile Management', 'module_id' => $moduleless->id, 'parent' => 0, 'url_path' => '#', 'sort' => 3, 'icon' => 'ion-log-out', 'status' => 1, 'created_at' => $now, 'updated_at' => $now]);
        $userManagement = Menu::create(['name' => 'User Management', 'module_id' => $moduleless->id, 'parent' => 0, 'url_path' => '#', 'sort' => 4, 'icon' => 'ion-log-out', 'status' => 1, 'created_at' => $now, 'updated_at' => $now]);

        // Sub Menus for Site Setting Management
        $siteSettingSubmenus = [
            ['name' => 'Site Setting', 'url_path' => 'site-setting', 'sort' => 1, 'icon' => 'ion-arrow-shrink'],
            ['name' => 'Module', 'url_path' => 'module', 'sort' => 3, 'icon' => 'ion-log-in'],
            ['name' => 'Menu', 'url_path' => 'menu', 'sort' => 4, 'icon' => 'ion-arrow-shrink'],
        ];

        foreach ($siteSettingSubmenus as $menu) {
            Menu::create(array_merge($menu, ['module_id' => $moduleless->id, 'parent' => $siteSettingManagement->id, 'status' => 1, 'created_at' => $now, 'updated_at' => $now]));
        }

        // Sub Menus for Role Management
        $roleSubmenus = [
            ['name' => 'Role List', 'url_path' => 'admin/role-management/role-info/list', 'sort' => 1, 'icon' => 'ion-heart-broken'],
            ['name' => 'Role Permission', 'url_path' => 'admin/role-management/role-permission-info/list', 'sort' => 2, 'icon' => 'ion-help-buoy'],
        ];

        foreach ($roleSubmenus as $menu) {
            Menu::create(array_merge($menu, ['module_id' => $moduleless->id, 'parent' => $roleManagement->id, 'status' => 1, 'created_at' => $now, 'updated_at' => $now]));
        }

        // Sub Menus for Profile Management
        $profileSubmenus = [
            ['name' => 'Profile Info', 'url_path' => 'admin/profile-management/profile-info/profile', 'sort' => 1, 'icon' => 'ion-heart-broken'],
            ['name' => 'Change Password', 'url_path' => 'admin/change-password', 'sort' => 2, 'icon' => 'ion-help-buoy'],
        ];

        foreach ($profileSubmenus as $menu) {
            Menu::create(array_merge($menu, ['module_id' => $moduleless->id, 'parent' => $profileManagement->id, 'status' => 1, 'created_at' => $now, 'updated_at' => $now]));
        }

        // Sub Menus for User Management
        $userListMenu = Menu::create(['name' => 'User List', 'module_id' => $moduleless->id, 'parent' => $userManagement->id, 'url_path' => 'admin/user-management/user-info/list', 'sort' => 1, 'icon' => 'ion-heart-broken', 'status' => 1, 'created_at' => $now, 'updated_at' => $now]);

        /*
        |--------------------------------------------------------------------------
        | Add Menu Routes Dynamically
        |--------------------------------------------------------------------------
        */
        $roleListMenu = Menu::where('name', 'Role List')->where('parent', $roleManagement->id)->first();
        $menuRoutes = [
            ['name' => 'Add', 'menu_id' => $roleListMenu->id, 'section_or_route' => 'route', 'sort' => 1, 'route' => 'admin.role-management.role-info.add'],
            ['name' => 'Edit', 'menu_id' => $roleListMenu->id, 'section_or_route' => 'route', 'sort' => 2, 'route' => 'admin.role-management.role-info.edit'],
            ['name' => 'Delete', 'menu_id' => $roleListMenu->id, 'section_or_route' => 'route', 'sort' => 3, 'route' => 'admin.role-management.role-info.destroy'],

            ['name' => 'Add', 'menu_id' => $userListMenu->id, 'section_or_route' => 'route', 'sort' => 1, 'route' => 'admin.user-management.user-info.add'],
            ['name' => 'Edit', 'menu_id' => $userListMenu->id, 'section_or_route' => 'route', 'sort' => 2, 'route' => 'admin.user-management.user-info.edit'],
            ['name' => 'Delete', 'menu_id' => $userListMenu->id, 'section_or_route' => 'route', 'sort' => 3, 'route' => 'admin.user-management.user-info.destroy'],
        ];

        foreach ($menuRoutes as $route) {
            MenuRoute::create(array_merge($route, ['status' => 1, 'created_by' => 1, 'created_at' => $now, 'updated_at' => $now]));
        }
    }
}
