<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigSeeder extends Seeder
{
    
    // RUN SEEDER
    
    public function run(): void
    {
        $model = new Site();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'hex' => $item->hex,
                'meta_title' => $item->meta_title,
                'meta_description' => $item->meta_description,
                'meta_keywords' => $item->meta_keywords,
                'meta_author' => $item->meta_author,
                'meta_image' => $item->meta_image,
                'contact_email' => $item->contact_email,
                'copyright' => $item->copyright,
                'powered_by' => $item->powered_by,
                'powered_by_link' => $item->powered_by_link,
                'allow_registration' => $item->allow_registration,
                'allow_comments' => $item->allow_comments,
                'facebook_url' => $item->facebook_url,
                'twitter_url' => $item->twitter_url,
                'youtube_url' => $item->youtube_url,
                'instagram_url' => $item->instagram_url,
                'content_image_width' => $item->content_image_width,
                'content_image_height' => $item->content_image_height,
                'pagination_items' => $item->pagination_items,
                'environment' => $item->environment,
                'css_assets' => $item->css_assets,
                'js_assets' => $item->js_assets,
                'google_analytics_tag' => $item->google_analytics_tag,
                'site_offline' => $item->site_offline
            ]);

        }

    }
    
}