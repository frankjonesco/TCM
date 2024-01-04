<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;


    // DATABASE COLUMNS FOR MASS ASSIGNMENT

    protected $fillable = [
        'hex',
        'user_id',
        'resource_model',
        'resource_id',
        'title',
        'slug',
        'subtitle',
        'introduction',
        'body',
        'main_image_id',
        'views',
        'status'
    ];




    // RETURN MODEL DATA   

    public function modelData(string $key = ''){
        
        $name = class_basename(__CLASS__);
        $site = new Site();

        $modelData = $site->formatModelData($name, 'md', false);

        if(empty($key))
            return $modelData;

        if(isset($modelData->$key))
            return $modelData->$key;

        return false;

    }




    // ROUTE KEY


    // SET ROUTE KEY NAME

    public function getRouteKeyName(){

        return 'slug';
        
    }


    // RETRIEVE ROUTE KEY VALUE
    public function routeKeyValue(){

        $routeKeyValue = $this->getRouteKeyName();
        return $this->$routeKeyValue;

    }




    // IMAGES


    // FETCH IMAGE

    public function imagePath(bool $fetch_main = false, string $size = '')
    {

        if($fetch_main){
            $image = ImageProcess::where('id', $this->main_image_id)->first();
        }else{
            $image = ImageProcess::where('resource_model', self::modelData('name'))->where('resource_id', $this->id)->first();
        }
        
        $size = empty($size) ? null : $size.'-';
        $filename = $size.$image->filename;
        $file_path = 'images/'.$this->modelData('directory').'/'.$this->hex.'/'.$filename;

        if(file_exists(public_path($file_path)))
            return asset($file_path);

        return asset('images/'.$size.'default-image-true-crime-metrix.webp');

    }


    // IMAGE ALT TEXT

    public function imageAltText(){
        
        return self::modelData('name').': '.$this->title;

    }




    // LINKS

    
    // RESOURCE LINK URL
    
    public function link(string $extended_path = '') : string
    {

        $path = '/'.self::modelData()->directory.'/'.$this->routeKeyValue();

        if($extended_path)
            return $path.'/'.$extended_path;

        return $path;

    }


    // RESOURCE LINK ARIA LABEL

    public function linkLabel() : string
    {
        return 'View '.self::modelData()->label.': '.$this->title;
        
    }




    // MODEL RELATIONSHIPS


    // CRIMINAL CASE

    public function criminal_case(): BelongsTo
    {
        return $this->belongsTo(CriminalCase::class, 'resource_id', 'id');
    }


    // IMAGES

    public function images(): HasMany
    {
        return $this->hasMany(ImageProcess::class, 'resource_id', 'id')->where('resource_model', 'Article');
    }


    // MAIN IMAGE

    public function main_image(): HasOne
    {
        return $this->hasOne(ImageProcess::class, 'id', 'main_image_id');
    }


    // USER

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }





}
