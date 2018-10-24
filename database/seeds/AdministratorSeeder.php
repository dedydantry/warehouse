<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "Dedy dantry";
        $administrator->email = "dedydantry@gmail.com";
        $administrator->password = \Hash::make("sirait");
        $administrator->roles = json_encode(['ADMIN']);
        $administrator->save();
        $this->command->info("User admin berhasil di simpan");
    }
}
