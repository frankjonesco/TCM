<?php

namespace Database\Seeders;

use App\Models\CriminalCase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriminalCaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $model = new CriminalCase();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,
                'user_id' => $item->user_id,
                'category_id' => $item->category_id,
                'title' => $item->title,
                'slug' => $item->slug,
                'short_name' => $item->short_name,
                'caption' => $item->caption,
                'description' => $item->description,
                'views' => $item->views,      
                'country_id' => $item->country_id, 
                'state_id' => $item->state_id,      
                'city_id' => $item->city_id,      
                'main_image_id' => $item->main_image_id,
                'views' => $item->views,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'status' => $item->status
            ]);

        }

    }
}