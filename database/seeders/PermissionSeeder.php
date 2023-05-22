<?php

namespace Database\Seeders;

use App\Models\Auth\Permission;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /** Dashboard */
        Permission::insert(['module_id' => '1', 'name' => 'Dashboard','slug'=>'dashboard', 'status' => 1]);

        /** User Management */
        Permission::insert(['module_id' => '2', 'name' => 'View Users','slug'=>'admin.users.index', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Show User','slug'=>'admin.users.show', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Add User','slug'=>'admin.users.create', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Edit User','slug'=>'admin.users.edit', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Delete User','slug'=>'admin.users.destroy', 'status' => 1]);

        /** Role Management */
        Permission::insert(['module_id' => '3', 'name' => 'View Roles','slug'=>'admin.role.index', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Show Role','slug'=>'admin.role.show', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Add Role','slug'=>'admin.role.create', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Edit Role','slug'=>'admin.role.edit', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Delete Role','slug'=>'admin.role.destroy', 'status' => 1]);

        /** Registration Management */
        Permission::insert(['module_id' => '4', 'name' => 'View All Applicants','slug'=>'admin.association-members.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Show Applicant','slug'=>'admin.association-members.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Add Applicant','slug'=>'admin.association-members.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Applicant','slug'=>'admin.association-members.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Applicant','slug'=>'admin.association-members.destroy', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Pending Applicant','slug'=>'admin.association-members.pending', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Approved Applicant','slug'=>'admin.association-members.approved', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Rejected Applicant','slug'=>'admin.association-members.rejected', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Accept Applicant','slug'=>'admin.association-members.accept', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Reject Applicant','slug'=>'admin.association-members.reject', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Print Applicant Form','slug'=>'admin.association-members.print', 'status' => 1]);

    }
}
