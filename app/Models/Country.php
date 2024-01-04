<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;


    // NO TIMESTAMPS IN DATA TABLE

    public $timestamps = false;




    // DATABASE COLUMNS FOR MASS ASSIGNMENT

    protected $fillable = [
        'name',
        'slug',
        'iso',
    ];




    // ROUTE KEY


    // SET ROUTE KEY NAME

    public function getRouteKeyName(){

        return 'id';
        
    }


    // RETRIEVE ROUTE KEY VALUE
    public function routeKeyValue(){

        $routeKeyValue = $this->getRouteKeyName();
        return $this->$routeKeyValue;

    }




    // CREATE NEW COUNTY IF IT DOES NOT EXIST 

    public static function createIfDoesNotExist($request){

        $country = Country::where('name', ucwords($request->country))
            ->get()
            ->first();

        if($country)
            return $country->id;

        return self::createCountry($country);

    }




    // CREATE COUNTY

    public static function createCountry($request){

        $new_country = Country::create([
            'hex' => Str::random(11),
            'state_id' => $request->state_id,
            'code' => $request->code,
            'name' => ucwords($request->country),
            'slug' => Str::slug(ucwords($request->country)) 
        ]);

        return $new_country->id;

    }




// END OF MODEL

}