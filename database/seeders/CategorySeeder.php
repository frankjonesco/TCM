<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    
    // RUN SEEDER

    public function run(): void
    {
        $model = new Category();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,
                'user_id' => $item->user_id,
                'name' => $item->name,
                'slug' => $item->slug,
                'description' => $item->description,
                'color' => $item->color,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'status' => $item->status              
            ]);

        }

    }
    
}
