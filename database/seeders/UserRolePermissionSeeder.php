<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            $user = $this->createUser();

            $this->createUserProfile();

            $this->createRole($user);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function createRole($user)
    {
        $role_admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role_operator = Role::create(['name' => 'operator', 'guard_name' => 'web']);
        $role_user = Role::create(['name' => 'user', 'guard_name' => 'web']);

        $permissions = ['read', 'create', 'update', 'delete'];

        foreach ($permissions as $permission) {
            $permissionKonfig =  $permission . ' ' . 'konfigurasi';
            $permissionPerm =  $permission . ' ' . 'permissions';
            $permissionRole =  $permission . ' ' . 'roles';
            $permissionNav =  $permission . ' ' . 'navigation';
            $permissionUser =  $permission . ' ' . 'users';

            Permission::firstOrCreate(['name' => $permissionKonfig]);
            Permission::firstOrCreate(['name' => $permissionPerm]);
            Permission::firstOrCreate(['name' => $permissionRole]);
            Permission::firstOrCreate(['name' => $permissionNav]);
            Permission::firstOrCreate(['name' => $permissionUser]);

            // Admin gets all permissions
            $role_admin->givePermissionTo($permissionKonfig);
            $role_admin->givePermissionTo($permissionPerm);
            $role_admin->givePermissionTo($permissionRole);
            $role_admin->givePermissionTo($permissionNav);
            $role_admin->givePermissionTo($permissionUser);

            // Operator gets read and create permissions
            if ($permission === 'read' || $permission === 'create') {
                $role_operator->givePermissionTo($permissionKonfig);
                $role_operator->givePermissionTo($permissionNav);
                $role_operator->givePermissionTo($permissionUser);
            }

            // User only gets read permissions
            if ($permission === 'read') {
                $role_user->givePermissionTo($permissionNav);
                $role_user->givePermissionTo($permissionUser);
            }
        }

        $user['admin']->assignRole('admin');
        $user['operator']->assignRole('operator');
        $user['user']->assignRole('user');
    }

    public function createUser()
    {
        $result['admin'] = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password000'), // Changed password
            'remember_token' => Str::random(10),
        ]);

        $result['operator'] = User::create([
            'name' => 'Operator',
            'email' => 'operator@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password000'), // Changed password
            'remember_token' => Str::random(10),
        ]);

        $result['user'] = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password000'), // Changed password
            'remember_token' => Str::random(10),
        ]);

        return $result;
    }

    public function createUserProfile()
    {
        // Create profile for Admin
        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin) {
            $admin->profile()->create([
                'no_hp' => '081234567890',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl. Admin No. 1, Jakarta',
            ]);
        }

        // Create profile for Operator
        $operator = User::where('email', 'operator@example.com')->first();
        if ($operator) {
            $operator->profile()->create([
                'no_hp' => '081234567891',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1992-02-02',
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Jl. Operator No. 2, Surabaya',
            ]);
        }

        // Create profile for User
        $user = User::where('email', 'user@example.com')->first();
        if ($user) {
            $user->profile()->create([
                'no_hp' => '081234567892',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1995-03-03',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl. User No. 3, Bandung',
            ]);
        }
    }
}
