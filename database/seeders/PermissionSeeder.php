<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'transaksi-pemesanan-makanan']);
        Permission::create(['name' => 'melihat-catatan-transaksi']);
        Permission::create(['name' => 'mengelola-menu']);
        Permission::create(['name' => 'melihat-catatan-transaksi-pegawai']);
        Permission::create(['name' => 'melihat-laporan-pendapatan']);
        Permission::create(['name' => 'melihat-log-aktivitas-pegawai']);
        Permission::create(['name' => 'mengelola-user']);

        // Create roles and assign existing permissions
        $roleKasir = Role::create(['name' => 'kasir']);
        $roleKasir->givePermissionTo('transaksi-pemesanan-makanan');
        $roleKasir->givePermissionTo('melihat-catatan-transaksi');

        $roleManajer = Role::create(['name' => 'manajer']);
        $roleManajer->givePermissionTo('mengelola-menu');
        $roleManajer->givePermissionTo('melihat-catatan-transaksi-pegawai');
        $roleManajer->givePermissionTo('melihat-laporan-pendapatan');
        $roleManajer->givePermissionTo('melihat-log-aktivitas-pegawai');

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('mengelola-user');
        $roleAdmin->givePermissionTo('melihat-log-aktivitas-pegawai');

        $roleSuperadmin = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // Create users
        $user = User::factory()->create([
            'name' => 'Kasir Kasir User',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($roleKasir);

        $user = User::factory()->create([
            'name' => 'Manajer Manajer User',
            'email' => 'manajer@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($roleManajer);

        $user = User::factory()->create([
            'name' => 'Admin Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($roleAdmin);

        $user = User::factory()->create([
            'name' => 'Super Super Admin User',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($roleSuperadmin);
    }
}
