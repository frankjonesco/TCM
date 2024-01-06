<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{

    // RUN SEEDER

    public function run(): void 
    {
        $model = new UserType();
            
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug
            ]);

        }

    }

}