<?php

use App\Models\Company;
use App\Models\Role;
use App\Models\User;

test('admin can access admin routes', function () {
    $admin = User::factory()->create([
        'role_id' => Role::forceCreate(['name' => 'admin'])->id,
        'company_id' => Company::create(['name' => 'Test Company'])->id,
    ]);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertOk();
});

test('staff cannot access admin routes', function () {
    $staff = User::factory()->create([
        'role_id' => Role::forceCreate(['name' => 'staff'])->id,
        'company_id' => Company::create(['name' => 'Test Company'])->id,
    ]);

    $this->actingAs($staff)
        ->get(route('admin.dashboard'))
        ->assertForbidden();
});
