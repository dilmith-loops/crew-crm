<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('password');

        // 1. Executive & Administrative Roles
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Finance Admin (Demo)',
                'password' => $password,
                'role' => 'Finance Admin',
                'department' => 'Corporate',
                'supervisor_id' => null,
            ]
        );

        $management = User::updateOrCreate(
            ['email' => 'management@example.com'],
            [
                'name' => 'Management User (Demo)',
                'password' => $password,
                'role' => 'Management',
                'department' => 'Corporate',
                'supervisor_id' => null,
            ]
        );

        $itAdmin = User::updateOrCreate(
            ['email' => 'itadmin@example.com'],
            [
                'name' => 'IT Admin (Demo)',
                'password' => $password,
                'role' => 'IT Admin',
                'department' => 'Tech',
                'supervisor_id' => null,
            ]
        );

        // 2. Tech Department Hierarchy
        $techHod = User::updateOrCreate(
            ['email' => 'hod.tech@example.com'],
            [
                'name' => 'Tech HOD (Demo)',
                'password' => $password,
                'role' => 'HOD',
                'department' => 'Tech',
                'supervisor_id' => null,
            ]
        );

        $techManager = User::updateOrCreate(
            ['email' => 'manager.tech@example.com'],
            [
                'name' => 'Tech Manager (Demo)',
                'password' => $password,
                'role' => 'Manager',
                'department' => 'Tech',
                'supervisor_id' => $techHod->id,
            ]
        );

        $techStaff = User::updateOrCreate(
            ['email' => 'staff.tech@example.com'],
            [
                'name' => 'Tech Staff (Demo)',
                'password' => $password,
                'role' => 'Staff',
                'department' => 'Tech',
                'supervisor_id' => $techHod->id,
            ]
        );

        // Convenient short aliases for quick testing
        User::updateOrCreate(
            ['email' => 'hod@example.com'],
            [
                'name' => 'HOD User (Demo)',
                'password' => $password,
                'role' => 'HOD',
                'department' => 'Tech',
                'supervisor_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Manager User (Demo)',
                'password' => $password,
                'role' => 'Manager',
                'department' => 'Tech',
                'supervisor_id' => $techHod->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@example.com'],
            [
                'name' => 'Staff User (Demo)',
                'password' => $password,
                'role' => 'Staff',
                'department' => 'Tech',
                'supervisor_id' => $techHod->id,
            ]
        );

        // 3. Creative Department Hierarchy
        $creativeHod = User::updateOrCreate(
            ['email' => 'hod.creative@example.com'],
            [
                'name' => 'Creative HOD (Demo)',
                'password' => $password,
                'role' => 'HOD',
                'department' => 'Creative',
                'supervisor_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager.creative@example.com'],
            [
                'name' => 'Creative Manager (Demo)',
                'password' => $password,
                'role' => 'Manager',
                'department' => 'Creative',
                'supervisor_id' => $creativeHod->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff.creative@example.com'],
            [
                'name' => 'Creative Staff (Demo)',
                'password' => $password,
                'role' => 'Staff',
                'department' => 'Creative',
                'supervisor_id' => $creativeHod->id,
            ]
        );

        // 4. Sales Department (AM) Hierarchy
        $salesHod = User::updateOrCreate(
            ['email' => 'hod.sales@example.com'],
            [
                'name' => 'Sales HOD (Demo)',
                'password' => $password,
                'role' => 'HOD',
                'department' => 'AM',
                'supervisor_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager.sales@example.com'],
            [
                'name' => 'Sales Manager (Demo)',
                'password' => $password,
                'role' => 'Manager',
                'department' => 'AM',
                'supervisor_id' => $salesHod->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff.sales@example.com'],
            [
                'name' => 'Sales Staff (Demo)',
                'password' => $password,
                'role' => 'Staff',
                'department' => 'AM',
                'supervisor_id' => $salesHod->id,
            ]
        );
    }
}
