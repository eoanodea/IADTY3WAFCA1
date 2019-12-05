<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Role;
use App\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** 
     * @test 
     * Testing whether the user can 
     *  see the dashboard when not logged in
     * */
    public function user_needs_to_be_logged_in_to_see_dashboard() {
        $response = $this->get('/home')->assertRedirect('/login');
    }

    /** 
     * @test 
     * Test whether a user with a patient role can
     *  access the patient dashboard
     * */
    public function patient_with_patient_role_can_access_patient_dashboard() {
        $user = factory(User::class)->create();
        $user->roles()->attach(Role::where('name', 'patient')->first());

        $this->actingAs($user);
        $response = $this->get('/patient')->assertOk();
    }

    /** 
     * @test 
     * Test whether a user with a doctor role can
     *  access the doctor dashboard
     * */
    public function doctor_with_doctor_role_can_access_doctor_dashboard() {
        $user = factory(User::class)->create();
        $user->roles()->attach(Role::where('name', 'doctor')->first());

        $this->actingAs($user);
        $response = $this->get('/doctor')->assertOk();
    }

    /** 
     * @test 
     * Test whether a user with a admin role can
     *  access the admin dashboard
     * */
    public function admin_with_admin_role_can_access_admin_dashboard() {
        $user = factory(User::class)->create();
        $user->roles()->attach(Role::where('name', 'admin')->first());

        $this->actingAs($user);
        $response = $this->get('/admin/home')->assertOk();
    }
}
