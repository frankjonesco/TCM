<?php

namespace App\Models;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageProcess extends Model
{

    use HasFactory;


    // FORCE TABLE NAME

    protected $table = 'images';




    // DATABASE COLUMNS FOR MASS ASSIGNMENT

    protected $fillable = [
        'hex',
        'user_id',
        'resource_model',
        'resource_id',
        'filename',
        'bg_position',
        'caption',
        'copyright',
        'copyright_link',
        'status'
    ];




    // ROUTE KEY


    // SET ROUTE KEY NAME

    public function getRouteKeyName(){

        return 'hex';
        
    }


    // RETRIEVE ROUTE KEY VALUE
    
    public function routeKeyValue(){

        $routeKeyValue = $this->getRouteKeyName();
        return $this->$routeKeyValue;

    }




    // LOAD RESOURCE MODELS
    

    public function resourceModel($model_name)
    {
        switch ($model_name){
            case 'Category':
                $model = new Category();
            break;

            case 'CriminalCase':
                $model = new CriminalCase();
            break;

            case 'ImageProcess':
                $model = new ImageProcess();
            break;
                
            default:
                $model = null;
        }

        return $model;
    }









    // HELPFUL METHODS



    
    // RESOURCE DIRECTORY

    private function resourceDirectory($resource)
    { 
        return 'images/'.$resource->modelData('directory').'/'.$resource->hex.'/';
    }




    // RESOURCE DIRECTORY PATH

    private function resourceDirectoryPath($resource)
    {
        return public_path(self::resourceDirectory($resource));
    }



    
    // MAKE IMAGE NAME

    private function makeImageName($resource, string $file_extension = 'webp')
    {
        return $resource->slug.'-'.time().'.'.$file_extension;
    }




    // BOOLEAN IF IMAGE IS RESOURCE MAIN IMAGE
    
    public function isMainImage(){
        
        $model = self::resourceModel($this->resource_model);

        $main_image_id = $model::find($this->resource_id)->main_image_id;
        if($main_image_id)
            if($this->id === $main_image_id)
                return true;
        
        return false;

    }













    public function fetch(string $size = ''){
        
        $filename = empty($size) ? $this->filename : $size.'-'.$this->filename;
        $directory = Str::kebab(Str::plural($this->resource_model));
        $resource_hex = self::resourceModel($this->resource_model)->where('id', $this->resource_id)->select('hex')->first()->hex;
        return asset('images/'.$directory.'/'.$resource_hex.'/'.$filename);
    }


    // FETCH BG IMAGE POSITION

    public function bgPosition($resource = null, string $bg_position = 'center'){

        if($resource->main_image)
            $bg_position = $resource->main_image->bg_position ?: $bg_position;

        return 'bg-'.$bg_position;

    }   

    


    




    // IMAGE PROCESSING METHODS
        // - UPLOAD
        // - ENCODE
        // - RENDER




    // UPLOAD IMAGE

    public function upload($request, $resource, $image){
        
        // Unique name for new file
        $image_name = self::makeImageName($resource);

        // Target path to save new fil
        $directory_path = self::resourceDirectoryPath($resource);

        $file_path = $directory_path.$image_name;

        // Store the uploaded file
        $request->file('image')->move($directory_path, $image_name);

        // dd($file_path);
        // exit;
        // Encode image to desired format
        $image = self::encode($file_path);

        // Save the new image file name to the database
        $image = self::saveToDatabase($resource, $image);

        return $image;
    }




    // ENCODE
    
    public function encode($file_path, $quality = 80, $format = 'webp'){

        // Encode to image format
        $img = Image::make($file_path)->encode($format);

        // Save image to set quality
        $img->save($file_path, $quality);

        return $img;
    }




    // DATABASE INTERACTIONS

    
    public function saveToDatabase($resource, $image, $main_image = false){

        // Create a new image and store in database
        $image = ImageProcess::create([
            'hex' => Str::random(11),
            'user_id' => auth()->user()->id,
            'resource_model' => $resource->modelData('name'),
            'resource_id' => $resource->id,
            'directory' => $resource->modelData('directory'),
            'filename' => $image->basename,
            'status' => 'public'
        ]);

        // Set main_image_id in item data table if needed
        if($main_image === true){
            $model = self::resourceModel($image->resource_model)->where('hex', $resource->hex)->first();
            $model->main_image_id = $image->id;
            $model->save();
        }

        return $image;
        
    }




    // RENDER CROP

    public function renderCrop($request, $resource, $directory, $image, $width = null, $height = null){

        // Dimensions and coordinates
        $w = round($request['w']);
        $h = round($request['h']);
        $x = round($request['x']);
        $y = round($request['y']);

        
        // Directory paths
        $directory_path = 'images/'.$directory.'/'.$resource->hex.'/';
        $file_path = public_path($directory_path.$image->filename);
        
        // Open file as image resource
        $new_img = Image::make($directory_path.$image->filename);
        
        // Crop image
        $new_img->crop($w,$h,$x,$y);
        
        // Resize
        $new_img->resize($width ?: config('settings.content_image_width'), $height ?: config('settings.content_image_height'));
        $new_img->save($file_path);
        
        return self::makeThumbnail($new_img, $directory_path, $image->filename);
    }




    // MAKE THUMBNAIL
    
    public function makeThumbnail($img, $directory_path, $image_name, $height = 220){

        // Resize image to set height and maintain aspect ratio
        $img->resize(null, $height, function ($constraint){ 
            $constraint->aspectRatio(); 
        });

        // Prepend image namt with 'tn' and save to item directory
        $img->save($directory_path.'/tn-'.$image_name);

        return true;
    }



}
