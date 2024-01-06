<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    
    // RUN SEEDER

    public function run(): void
    {
        $model = new Country();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){
            
            $model::on('mysql')->create([
                'id' => $item->id,      
                'name' => $item->name,      
                'slug' => $item->slug,
                'iso' => $item->iso
            ]);

        }

    }
    
}