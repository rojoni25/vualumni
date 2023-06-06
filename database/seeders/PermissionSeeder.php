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
        Permission::insert(['module_id' => '2', 'name' => 'Store User','slug'=>'admin.users.store', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Edit User','slug'=>'admin.users.edit', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Update User','slug'=>'admin.users.update', 'status' => 1]);
        Permission::insert(['module_id' => '2', 'name' => 'Delete User','slug'=>'admin.users.destroy', 'status' => 1]);

        /** Role Management */
        Permission::insert(['module_id' => '3', 'name' => 'View Roles','slug'=>'admin.role.index', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Show Role','slug'=>'admin.role.show', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Add Role','slug'=>'admin.role.create', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Store Role','slug'=>'admin.role.store', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Edit Role','slug'=>'admin.role.edit', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Update Role','slug'=>'admin.role.update', 'status' => 1]);
        Permission::insert(['module_id' => '3', 'name' => 'Delete Role','slug'=>'admin.role.destroy', 'status' => 1]);

        /** Registration Management */
        Permission::insert(['module_id' => '4', 'name' => 'View All Applicants','slug'=>'admin.association-members.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Show Applicant','slug'=>'admin.association-members.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Add Applicant','slug'=>'admin.association-members.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Applicant','slug'=>'admin.association-members.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Applicant','slug'=>'admin.association-members.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Applicant','slug'=>'admin.association-members.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Applicant','slug'=>'admin.association-members.destroy', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Pending Applicant','slug'=>'admin.association-members.pending', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Approved Applicant','slug'=>'admin.association-members.approved', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Rejected Applicant','slug'=>'admin.association-members.rejected', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Approve NID','slug'=>'admin.association-members.nid-approve', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Decline NID','slug'=>'admin.association-members.nid-decline', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Approve Certificate','slug'=>'admin.association-members.certificate-approve', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Decline Certificate','slug'=>'admin.association-members.certificate-decline', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Approve Payment','slug'=>'admin.association-members.payment-approve', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Decline Payment','slug'=>'admin.association-members.payment-decline', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Accept Applicant','slug'=>'admin.association-members.accept', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Reject Applicant','slug'=>'admin.association-members.reject', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Print Applicant Form','slug'=>'admin.association-members.print', 'status' => 1]);

        /** Content Management */
        Permission::insert(['module_id' => '4', 'name' => 'CMS Dashboard','slug'=>'admin.cms.dashboard', 'status' => 1]);

        // /** Posts */
        Permission::insert(['module_id' => '4', 'name' => 'Post List','slug'=>'admin.cms.posts.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View Post','slug'=>'admin.cms.posts.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create Post','slug'=>'admin.cms.posts.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Post','slug'=>'admin.cms.posts.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Post','slug'=>'admin.cms.posts.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Post','slug'=>'admin.cms.posts.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Post','slug'=>'admin.cms.posts.destroy', 'status' => 1]);

        // /** News */
        Permission::insert(['module_id' => '4', 'name' => 'News List','slug'=>'admin.cms.news.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View News','slug'=>'admin.cms.news.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create News','slug'=>'admin.cms.news.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store News','slug'=>'admin.cms.news.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit News','slug'=>'admin.cms.news.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update News','slug'=>'admin.cms.news.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete News','slug'=>'admin.cms.news.destroy', 'status' => 1]);

        // /** Sliders */
        Permission::insert(['module_id' => '4', 'name' => 'Slider List','slug'=>'admin.cms.slider.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View Slider','slug'=>'admin.cms.slider.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create Slider','slug'=>'admin.cms.slider.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Slider','slug'=>'admin.cms.slider.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Slider','slug'=>'admin.cms.slider.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Slider','slug'=>'admin.cms.slider.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Slider','slug'=>'admin.cms.slider.destroy', 'status' => 1]);

        // /** Marquees */
        Permission::insert(['module_id' => '4', 'name' => 'Marquee List','slug'=>'admin.cms.marquee.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View Marquee','slug'=>'admin.cms.marquee.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create Marquee','slug'=>'admin.cms.marquee.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Marquee','slug'=>'admin.cms.marquee.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Marquee','slug'=>'admin.cms.marquee.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Marquee','slug'=>'admin.cms.marquee.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Marquee','slug'=>'admin.cms.marquee.destroy', 'status' => 1]);

        // /** Notices */
        Permission::insert(['module_id' => '4', 'name' => 'Notice List','slug'=>'admin.cms.notice.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View Notice','slug'=>'admin.cms.notice.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create Notice','slug'=>'admin.cms.notice.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Notice','slug'=>'admin.cms.notice.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Notice','slug'=>'admin.cms.notice.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Notice','slug'=>'admin.cms.notice.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Notice','slug'=>'admin.cms.notice.destroy', 'status' => 1]);

        // /** Events */
        Permission::insert(['module_id' => '4', 'name' => 'Event List','slug'=>'admin.cms.event.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View Event','slug'=>'admin.cms.event.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create Event','slug'=>'admin.cms.event.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Event','slug'=>'admin.cms.event.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Event','slug'=>'admin.cms.event.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Event','slug'=>'admin.cms.event.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Event','slug'=>'admin.cms.event.destroy', 'status' => 1]);

        // /** Testimonial */
        Permission::insert(['module_id' => '4', 'name' => 'Testimonial List','slug'=>'admin.cms.testimonial.index', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'View Testimonial','slug'=>'admin.cms.testimonial.show', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Create Testimonial','slug'=>'admin.cms.testimonial.create', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Store Testimonial','slug'=>'admin.cms.testimonial.store', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Edit Testimonial','slug'=>'admin.cms.testimonial.edit', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Update Testimonial','slug'=>'admin.cms.testimonial.update', 'status' => 1]);
        Permission::insert(['module_id' => '4', 'name' => 'Delete Testimonial','slug'=>'admin.cms.testimonial.destroy', 'status' => 1]);
    }
}
