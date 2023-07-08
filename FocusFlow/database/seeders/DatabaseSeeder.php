<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::first();
        if(!$user)
        {
            $user = new User();
            $user->first_name = 'Joseph';
            $user->last_name = 'Macharia';
            $user->email = 'josephm2800@gmail.com';
            $user->password = Hash::make('123456');
            $user->save();

        }

        $data = [
            'company_name'=> 'Webtech'
        ];

        foreach($data as $key=>$value){

            $setting =  new Setting();

            $setting->key = $key;
            $setting->value = $value;
            $setting->save();
        }
    }
}
