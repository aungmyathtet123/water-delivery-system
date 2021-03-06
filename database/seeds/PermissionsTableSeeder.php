<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
			'manage-laundry',
			'manage-water',
			'manage-user',
			'manage-category',
			'manage-township',
			'manage-shop',
			'manage-service',
			'manage-order',
			'manage-order_detail',
			];
			
			foreach ($permissions as $permission) {
			Permission::create(['name' => $permission]);


		}    }
}
