<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountySeeder extends Seeder
{

    // RUN SEEDER

    public function run(): void
    {
        $model = new County();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){
            
            $model::create([
                'id' => $item->id,
                'state_id' => $item->state_id,      
                'name' => $item->name,      
                'slug' => $item->slug
            ]);

        }

    }
    
}
