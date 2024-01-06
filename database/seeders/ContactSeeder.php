<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{

    // RUN SEEDER
    
    public function run(): void
    {
        $model = new Contact();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'name' => $item->state_id,      
                'email' => $item->name,      
                'message' => $item->slug,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ]);

        }

    }

}