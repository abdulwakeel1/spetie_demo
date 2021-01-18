<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Seeders;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'buyer',
'role-list',
'role-create',
'role-edit',
'role-delete',
'product-list',
'product-create',
'product-edit',
'product-delete'
];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}