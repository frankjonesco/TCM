<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    use HasFactory;


    // NO TIMESTAMPS IN DATA TABLE

    public $timestamps = false;




    // DATABASE COLUMNS FOR MASS ASSIGNMENT

    protected $fillable = [
        'name',
        'slug',
        'abbreviation'
    ];




// END OF CLASS

}
