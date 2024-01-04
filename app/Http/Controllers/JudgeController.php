<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Site;
use App\Models\Judge;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\CriminalCase;
use App\Models\ImageProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;

class JudgeController extends Controller
{

    protected $site, $model, $directory, $label, $plural, $pageHeadings, $viewAssets, $toast;


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->site = new Site();
        $this->model = $this->site->formatModelData('Judge', 'lg');
        $this->pageHeadings = $this->site->getPageHeadings($this->model);
        $this->toast = "Good!";
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
    }



    
    // INDEX OF RESOURCES

    public function index() : View
    {
        $this->site->injectMetadata(ucfirst($this->model->plural), true, 'The most memorable judges that have presided over the most popular televised True Crime court cases. ');

        
        return view($this->model->directory.'.index', [
            'pageHeadings' => $this->pageHeadings,
            'judges' => $this->site->judges(true, 12, 'public')
        ]);

    }




    // SHOW SINGLE RESOURCE

    public function show(Judge $judge) : View
    {
        return view($this->model->directory.'.show', [
            'pageHeadings' => [
                $judge->fullName(),
                $judge->description ?: 'About this judge.',
            ],
            'judge' => $judge
        ]);

    }




    // USER AUTHENTICATION REQUIRED


    // ADMIN INDEX

    public function adminIndex() : View
    {
        $this->site->injectMetadata('Manage '.$this->model->plural, true, null, true);

        return view('admin.resources.index', [
            'pageHeadings' => $this->pageHeadings,
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'criminal_cases' => $this->site->criminalCases(true, 12)
        ]);
    }




    // VIEW CREATE FORM
        
    public function create() : View
    {
        $this->site->injectMetadata('Create '.$this->model->label, true, null, true);

        return view('admin.resources.create', [
            'pageHeadings' => $this->pageHeadings,
            'form_fields' => [
                'input-title',
                'input-short-name',
                'select-category',
                'textarea-description-ck-editor',
                'input-image',
                'input-country-state-city',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'categories' => $this->site->categories(),
            'countries' => $this->site->countries(),
            'states' => $this->site->states()
        ]);

    }




    // STORE IN DATATBASE

    public function store(Request $request)
    {   
        $request->merge([
            'hex' => Str::random(11),
            'user_id' => auth()->id(),
            'slug' => Str::slug($request->title),
            'views' => 0,
        ]);


        $request->validate([
            'hex' => 'required|unique:criminal_cases,hex',
            'user_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:criminal_cases,slug',
            'short_name' => 'required',
            'category_id' => '',
            'caption' => '',
            'description' => '',
            'country_id' => '',
            'city' => '',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,svg|max:2048|dimensions:min_width=100,min_height=100',
            'views' => 'required|numeric',
            'status' => 'required',
        ]);


       


        $resource = CriminalCase::create([
            'hex' => $request->hex,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'short_name' => $request->short_name,
            'category_id' => $request->category_id,
            'caption' => $request->caption,
            'description' => $request->description,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id ?: null,
            'city_id' => City::createIfDoesNotExist($request),
            'views' => $request->views,
            'status' => $request->status
        ]);


        $url = $resource->link();

        if($request->hasFile('image')){

            $image = new ImageProcess();
            $image = $image->upload($request, $resource, $image, true);

            $url = $this->model->directory.'/'.$resource->slug.'/images/'.$image->hex.'/crop/main';

        }

        return redirect($url)->with('toast', $this->toast);

    }




    // VIEW EDIT FORM

    public function edit(CriminalCase $criminal_case) : View
    {
        $this->site->injectMetadata('Create '.$this->model->label, true, null, true);

        return view('admin.resources.edit', [
            'pageHeadings' => $this->pageHeadings,
            'model' => $this->model,
            'countries' => $this->site->countries(),
            'states' => $this->site->states(),
            'categories' => $this->site->categories(),
            'resource' => $criminal_case,
            'viewAssets' => $this->viewAssets,
            'form_fields' => [
                'input-title',
                'input-short-name',
                'select-category',
                'textarea-description-ck-editor',
                'input-country-state-city',
                'select-status'
            ]
            
        ]);
    }




    // UPDATE THIS RECORD IN DATABASE

    public function update(Request $request, CriminalCase $criminal_case){

        $request->validate([
            'title' => 'required',
            'short_name' => 'required',
            'category_id' => '',
            'caption' => '',
            'description' => '',
            'country_id' => '',
            'state_id' => '',
            'city' => '',
            'status' => 'required',
        ]);

        $resource = $criminal_case;

        $resource->title = $request->title;
        $resource->slug = Str::slug($request->title);
        $resource->short_name = $request->short_name;
        $resource->category_id = $request->category_id;
        $resource->caption = $request->caption;
        $resource->description = $request->description;
        $resource->country_id = $request->country_id;
        $resource->state_id = $request->state_id;
        $resource->city_id = City::createIfDoesNotExist($request);
        $resource->status = $request->status;

        $resource->save();

        return redirect($resource->link())->with('toast', $this->toast);

    }




    // VIEW CONFIRM DELETE FORM

    public function confirmDelete(CriminalCase $criminal_case) : View
    {
        $this->site->injectMetadata('Delete '.$this->model->label, true, null, true);

        return view('admin.resources.confirm-delete', [
            'pageHeadings' => $this->pageHeadings,
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'resource' => $criminal_case
                
        ]);
    }




    // DESTROY DATABASE RECORD AND DELETE IMAGE DIRECTORY

    public function destroy(Request $request, CriminalCase $criminal_case) : RedirectResponse
    {
        $request->validate([
            'resource' => 'required'
        ]);

        $resource = $criminal_case;

        $resource->delete();

        File::deleteDirectory(public_path('images/'.$this->model->directory.'/'.$resource->hex));

        return redirect('admin/'.$this->model->directory)->with('toast', $this->toast);

    }




// END OF CLASS

}
