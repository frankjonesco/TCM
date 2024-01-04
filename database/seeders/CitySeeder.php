<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{

    // RUN SEEDER
    
    public function run(): void
    {
        $model = new City();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'state_id' => $item->state_id,      
                'name' => $item->name,      
                'slug' => $item->slug
            ]);

        }

    }
    
}
