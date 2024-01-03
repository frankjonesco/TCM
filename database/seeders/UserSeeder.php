<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $model = new User();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
                'email' => $item->email,
                'email_verified_at' => $item->email_verified_at,
                'username' => $item->username,
                'password' => $item->password,
                'user_type_id' => $item->user_type_id,
                'image' => $item->image,
                'remember_token' => $item->remember_token,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ]);

        }
    }
}
