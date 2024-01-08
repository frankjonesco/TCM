<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\ImageProcess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criminal extends Model
{
    use HasFactory;


    // DATABASE COLUMNS FOR MASS ASSIGNMENT

    protected $fillable = [
        'hex',
        'user_id',
        'criminal_case_id',
        'first_name',
        'middle_name',
        'last_name',
        'slug',
        'description',
        'personal_summary',
        'date_of_birth',
        'gender',
        'star_sign',
        'criminal_status',
        'arrest_date',
        'conviction_date',
        'sentence',
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




    // FORMATTERS


    // FULL NAME OF CRIMINAL

    public function fullName($acceptInput = false, $first_name = null, $last_name = null){

        if($acceptInput)
            return $first_name.' '.$last_name;
            
        return $this->first_name.' '.$this->last_name;

    }




    // MUTATORS


    public function getTitleAttribute($date){

        return $this->fullName();
        
    }


    // FORMATTED DATE OF BIRTH

    public function getFormattedDateOfBirthAttribute($date){   

        if($this->date_of_birth != null)
            return Carbon::parse($date)->format('F d, Y');

        return $this->year_of_birth ? Carbon::parse($this->year_of_birth)->format('Y') : null;

    }

    // DATE OF BIRTH

    public function getDateOfBirthShortAttribute($date){   

        if($this->date_of_birth != null)
            return Carbon::parse($date)->format('d/m/y');

        return $this->year_of_birth ? Carbon::parse($this->year_of_birth)->format('Y') : null;

    }

    public function getDobDayAttribute($date){

        if($this->date_of_birth)
            return Carbon::parse($this->date_of_birth)->format('d');

        return null;
        
    }

    public function getDobMonthAttribute($date)
    {
        if($this->date_of_birth)
            return Carbon::parse($this->date_of_birth)->format('m');

        return null;
    }

    public function getDobYearAttribute($date){

        if($this->date_of_birth)
            return Carbon::parse($this->date_of_birth)->format('Y');

        return $this->year_of_birth ?: null;
    }


    // ARREST DATE

    public function getFormattedArrestDateAttribute($date){   

        if($this->arrest_date != null)
            return Carbon::parse($date)->format('F d, Y');
    
        return null;
    
    }
    
    public function getArrestDateDayAttribute($date){
    
        if($this->arrest_date)
            return Carbon::parse($this->arrest_date)->format('d');
    
        return null;
                
    }
    
    public function getArrestDateMonthAttribute($date)
    {
        if($this->arrest_date)
            return Carbon::parse($this->arrest_date)->format('m');
    
        return null;
    }
    
    public function getArrestDateYearAttribute($date){
    
        if($this->arrest_date)
            return Carbon::parse($this->arrest_date)->format('Y');
    
        return null;
    }


    // CONVICTION DATE

    public function getFormattedConvictionDateAttribute($date){   

        if($this->conviction_date != null)
            return Carbon::parse($date)->format('F d, Y');
    
        return null;
    
    }
    
    public function getConvictionDateDayAttribute($date){
    
        if($this->conviction_date)
            return Carbon::parse($this->conviction_date)->format('d');
    
        return null;
                
    }
    
    public function getConvictionDateMonthAttribute($date)
    {
        if($this->conviction_date)
            return Carbon::parse($this->conviction_date)->format('m');
    
        return null;
    }
    
    public function getConvictionDateYearAttribute($date){
    
        if($this->conviction_date)
            return Carbon::parse($this->conviction_date)->format('Y');
    
        return null;
    }


    // TRIAL DATE

    public function getFormattedTrialDateAttribute($date){   

        if($this->trial_date != null)
            return Carbon::parse($date)->format('F d, Y');
        
        return null;
        
    }
        
    public function getTrialDateDayAttribute($date){
        
        if($this->trial_date)
            return Carbon::parse($this->trial_date)->format('d');
        
        return null;
                    
    }
        
    public function getTrialDateMonthAttribute($date)
    {
        if($this->trial_date)
            return Carbon::parse($this->trial_date)->format('m');
        
        return null;
    }
        
    public function getTrialDateYearAttribute($date){
        
        if($this->trial_date)
            return Carbon::parse($this->trial_date)->format('Y');
        
        return null;
    }
    

    // ACQUITTAL DATE

    public function getFormattedAcquittalDateAttribute($date){   

        if($this->acquittal_date != null)
            return Carbon::parse($date)->format('F d, Y');
        
        return null;
        
    }
        
    public function getAcquittalDateDayAttribute($date){
        
        if($this->acquittal_date)
            return Carbon::parse($this->acquittal_date)->format('d');
        
        return null;
                    
    }
        
    public function getAcquittalDateMonthAttribute($date)
    {
        if($this->acquittal_date)
            return Carbon::parse($this->acquittal_date)->format('m');
        
        return null;
    }
        
    public function getAcquittalDateYearAttribute($date){
        
        if($this->acquittal_date)
            return Carbon::parse($this->acquittal_date)->format('Y');
        
        return null;
    }
    

    // SENTENCING DATE

    public function getFormattedSentencingDateAttribute($date){   

        if($this->sentencing_date != null)
            return Carbon::parse($date)->format('F d, Y');
        
        return null;
        
    }
        
    public function getSentencingDateDayAttribute($date){
        
        if($this->sentencing_date)
            return Carbon::parse($this->sentencing_date)->format('d');
        
        return null;
                    
    }
        
    public function getSentencingDateMonthAttribute($date)
    {
        if($this->sentencing_date)
            return Carbon::parse($this->sentencing_date)->format('m');
        
        return null;
    }
        
    public function getSentencingDateYearAttribute($date){
        
        if($this->sentencing_date)
            return Carbon::parse($this->sentencing_date)->format('Y');
        
        return null;
    }
    

    // FREED DATE

    public function getFormattedFreedDateAttribute($date){   

        if($this->freed_date != null)
            return Carbon::parse($date)->format('F d, Y');
        
        return null;
        
    }
        
    public function getFreedDateDayAttribute($date){
        
        if($this->freed_date)
            return Carbon::parse($this->freed_date)->format('d');
        
        return null;
                    
    }
        
    public function getFreedDateMonthAttribute($date)
    {
        if($this->freed_date)
            return Carbon::parse($this->freed_date)->format('m');
        
        return null;
    }
        
    public function getFreedDateYearAttribute($date){
        
        if($this->freed_date)
            return Carbon::parse($this->freed_date)->format('Y');
        
        return null;
    }






// MODEL RELATIONSHIPS


    // CRIMINAL CASE

    public function criminal_case(): BelongsTo
    {
        return $this->belongsTo(CriminalCase::class);
    }


    // IMAGES

    public function images(): HasMany
    {
        return $this->hasMany(ImageProcess::class, 'resource_id', 'id')->where('resource_model', 'Criminal');
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
