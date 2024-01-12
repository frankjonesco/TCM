<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Site;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\CriminalCase;
use App\Models\ImageProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{

    protected $site, $page, $image, $viewAssets;


    public function __construct(){
        $this->site = new Site();
        $this->page = new Page();

        $this->image = new ImageProcess();
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
    }




    // ADMIN IMAGE INDEX

    public function adminImageIndex($model = null, $slug = null) : View
    {
        $this->page->injectMetadata('Image index', true, '', true);

        $resource = CriminalCase::where('slug', $slug)->first();

        return view('admin.resources.admin-image-index', [
            'pageHeadings' => [
                'Images',
                'Images for this resource.'
            ],
            'viewAssets' => $this->viewAssets,
            'resource' => $resource,
            'directory' => $model,
            'hex' => $resource->hex,
            'images' => $this->image->where('resource_model', Str::studly(Str::singular($model)))->where('resource_id', $resource->id)->get()
        ]);
    }




    // UPLOAD IMAGE

    public function uploadImage(Request $request, $model_slug, $resource_slug) : RedirectResponse
    {
        $image =  new ImageProcess();
        $model_name = Str::studly(Str::singular($model_slug));
        $resource_model = $image->resourceModel($model_name);
        $resource =  $resource_model::where('slug', $resource_slug)->first();

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        if($request->hasFile('image')){
            $image = $image->upload($request, $resource, $image);
            $redirect = $model_slug.'/'.$resource_slug.'/images/'.$image->hex.'/crop';
            return redirect($redirect);
        }

        return false;      

    }




    // CROP IMAGE
    
    public function cropImage($model_slug = null, $slug, ImageProcess $image) : View
    {      
        $this->page->injectMetadata('Crop image', true, '', true);

        $model_name = Str::studly(Str::singular($model_slug));
        $model = $image->resourceModel($model_name);
        
        
        return view('admin.resources.crop-image', [
            'pageHeadings' => [
                'Crop image',
                'Select the area of the image you want to use.'
            ],
            'resource' => $model->where('slug', $slug)->first(),
            'image' => $image,
        ]);

    }




    // RENDER IMAGE 

    public function renderImage($directory, $slug, ImageProcess $image, Request $request) : RedirectResponse
    {

        $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $model_name = Str::studly(Str::singular($directory));
        $model = $image->resourceModel($model_name);

        $resource = $model->where('slug', $slug)->first();
        
        if($request->set_as_main){
            $resource->main_image_id = $image->id;
            $resource->save();
        }

        $image->renderCrop($request, $resource, $directory, $image);

        $image->bg_position = $request->bg_position;
        $image->caption = $request->caption;
        $image->copyright = $request->copyright;
        $image->copyright_link = $request->copyright_link;
        $image->save();

        return redirect($resource->link())->with('toast', 'Image cropped!');

    }




    // VIEW EDIT IMAGE FORM

    public function editImage($directory, $resource_slug, ImageProcess $image) : View
    {
        $this->page->injectMetadata('Edit image', true, '', true);

        $model_name = Str::studly(Str::singular($directory));
        $model = $image->resourceModel($model_name);

        return view('admin.resources.edit-image', [
            'pageHeadings' => [
                'Edit image',
                'Editing image for this '.str_replace('-', ' ', Str::singular($directory)).'.'
            ],
            'directory' => $directory,
            'resource' => $image->resourceModel($image->resource_model)->where('slug', $resource_slug)->first(),
            'image' => $image,
            'viewAssets' => $this->viewAssets,
            'model' => $model
        ]);
    }




    // VIEW CONFIRM DELETE FORM

    public function confirmDelete($directory, $resource_slug, ImageProcess $image) : View
    {

        $this->page->injectMetadata('Delete image', true, '', true);

        $model_name = Str::studly(Str::singular($directory));
        $model = $image->resourceModel($model_name);

        return view('admin.resources.confirm-delete-image', [
            'pageHeadings' => [
                'Delete image',
                'Are you sure you want to delete this image?'
            ],
            'directory' => $directory,
            'resource' => $image->resourceModel($image->resource_model)->where('slug', $resource_slug)->first(),
            'image' => $image,
            'viewAssets' => $this->viewAssets,
            'model' => $model
        ]);
        
    }




    // DESTROY DATABASE RECORD AND DELETE IMAGE

    public function destroy($model_slug, $resource_slug){
        
        echo "pop";

    }

}
