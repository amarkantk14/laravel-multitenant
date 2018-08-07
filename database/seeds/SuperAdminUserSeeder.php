<?php

use Illuminate\Database\Seeder;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addSuperAdminUsers();
    }

    private function addSuperAdminUsers() {
        \App\User::create([
            'name' => 'Amarkant Kumar',
            'email' => 'super.admin@gmail.com',
            'password' => bcrypt('abc@123'),
            'is_super_admin' => true,
            'is_admin'=> false
        ]);
    }
}
