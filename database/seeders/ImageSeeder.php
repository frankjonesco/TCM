<?php

namespace Database\Seeders;

use App\Models\ImageProcess;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{

    // RUN SEEDER
    
    public function run(): void
    {
        $model = new ImageProcess();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,	
                'user_id' => $item->user_id,	
                'resource_model' => $item->resource_model,	
                'resource_id' => $item->resource_id,	
                'filename' => $item->filename,
                'bg_position' => $item->bg_position,	
                'caption' => $item->caption,	
                'copyright' => $item->copyright,	
                'copyright_link' => $item->copyright_link,
                'created_at' => $item->created_at,	
                'updated_at' => $item->updated_at,	
                'status' => $item->status,
            ]);

        }

    }
}