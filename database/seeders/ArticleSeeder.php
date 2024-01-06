<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    
    // RUN SEEDER

    public function run(): void
    {
        $model = new Article();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,
                'user_id' => $item->user_id,
                'resource_model' => $item->resource_model,
                'resource_id' => $item->resource_id,
                'title' => $item->title,
                'slug' => $item->slug,
                'subtitle' => $item->subtitle,
                'introduction' => $item->introduction,
                'body' => $item->body,
                'main_image_id' => $item->main_image_id,
                'views' => $item->views,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'status' => $item->status,
            ]);

        }

    }
    
}