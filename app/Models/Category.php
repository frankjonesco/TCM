<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;



     // DATABASE COLUMNS FOR MASS ASSIGNMENT

     protected $fillable = [
        'hex',
        'user_id',
        'name',
        'slug',
        'description',
        'color',
        'status'
    ];

    

    public function modelData(){
        
        $name = class_basename(__CLASS__);
        $site = new Site();
        return $site->formatModelData($name, 'md', false);

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



    // MUTATORS


    public function getTitleAttribute($date){

        return $this->name;
            
    }

    


    // RESOURCE LINK URL
    
    public function link($extended_path = null){

        $path = '/'.self::modelData()->directory.'/'.$this->routeKeyValue();

        if($extended_path)
            return $path.'/'.$extended_path;

        return $path;

    }


    // RESOURCE LINK ARIA LABEL

    public function linkLabel(){

        return 'View '.self::modelData()->label.': '.$this->title;
        
    }




    // MODEL RELATIONSHIPS


    // CRIMINAL CASE

    public function criminal_cases(): HasMany
    {
        return $this->hasMany(CriminalCase::class);
    }


    // USER

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    
}
