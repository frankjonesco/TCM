<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{

    // RUN SEEDER

    public function run(): void
    {
        $model = new State();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'name' => $item->name,      
                'slug' => $item->slug,
                'abbreviation' => $item->abbreviation,      
            ]);

        }

    }

}