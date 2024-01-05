<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class CategoryController extends Controller
{

    protected $site, $model, $directory, $label, $plural, $pageHeadings, $viewAssets, $toast;


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->site = new Site();
        $this->model = $this->site->formatModelData('Category', 'md');
        $this->pageHeadings = $this->site->getPageHeadings($this->model);
        $this->toast = "Good!";
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
    } 




    // INDEX OF RESOURCES


    public function index() : View 
    {
        $this->site->injectMetadata('True crime '.$this->model->plural, true, 'List of the different categories of the true crimes we have covered. Types of crime, murdered and offences.');

        return view($this->model->directory.'.index', [
            'pageHeadings' => $this->pageHeadings,
            'categories' => $this->site->categories(true, 50, 'public')
        ]);

    }




    // SHOW SINGLE CATEGORY


    public function show(Category $category) : View
    {
        $this->site->injectMetadata('Crime category: '.$category->name, true, $category->description);

        return view('categories.show', [
            'pageHeadings' => [
                $category->name,
                $category->description
            ],
            'criminal_cases' => $category->criminal_cases()->paginate()
        ]);

    }




    // ADMIN INDEX


    public function adminIndex() : View
    {

        $this->site->injectMetadata('Manage '.$this->model->plural, true, null, true);

        return view('admin.resources.index', [
            'pageHeadings' => $this->pageHeadings,
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'categories' => $this->site->categories(true, 12)
        ]);
            
    }




    // VIEW CREATE FORM
    

    public function create() : View
    {
        $this->site->injectMetadata('Create '.$this->model->label, true, null, true);

        return view('admin.resources.create', [
            'pageHeadings' => $this->pageHeadings,
            'form_fields' => [
                'input-name',
                'textarea-description',
                'input-color',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets
        ]);

    }




    // STORE IN DATABASE


    public function store(Request $request) : RedirectResponse
    {
        $request->merge([
            'hex' => Str::random(11),
            'user_id' => auth()->id(),
            'slug' => Str::slug($request->name),
            'color' => $request->color ? $request->color.'-700' : null
        ]);

        $resource = $request->validate([
            'hex' => 'required|unique:categories,hex',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
            'description' => 'required',
            'color' => '',
            'status' => 'required'
        ]);


        $resource = Category::create($resource);

        return redirect('admin/'.$this->model->directory)->with('toast', $this->toast);
        
    }




    // VIEW EDIT FORM
    

    public function edit(Category $category) : View
    {
        $this->site->injectMetadata('Edit '.$this->model->label, true, null, true);

        return view('admin.resources.edit', [
            'pageHeadings' => $this->pageHeadings,
            'form_fields' => [
                'input-name',
                'textarea-description',
                'input-color',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets, 
            'resource' => $category
        ]);

    }




    // UPDATE RESOURCE IN DATABASE

    public function update(Request $request, Category $category) : RedirectResponse
    {
        $request->merge([
            'slug' => Str::slug($request->name),
        ]);

        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'slug' => 'required|unique:categories,slug,'.$category->id,
            
            'description' => '',
            'color' => '',
            'status' => 'required'
        ]);

        $resource = $category;
            
        $resource->name = $request->name;
        $resource->slug = Str::slug($request->name);
        $resource->description = $request->description;
        $resource->color = $request->color.'-700';
        $resource->status = $request->status;
            
        $resource->save();

        return redirect('admin/'.$this->model->directory)->with('toast', $this->toast);
            
    }




    // VIEW CONFIRM DELETE FORM

    public function confirmDelete(Category $category) : View
    {
        $this->site->injectMetadata('Delete '.$this->model->label, true, null, true);

        return view('admin.resources.confirm-delete', [
            'pageHeadings' => $this->pageHeadings,
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'resource' => $category
            
        ]);
    }




    // DESTROY DATABASE RECORD AND DELETE IMAGE DIRECTORY

    public function destroy(Request $request, Category $category) : RedirectResponse
    {
        $request->validate([
            'resource' => 'required'
        ]);

        $resource = $category;

        $resource->delete();

        File::deleteDirectory(public_path('images/'.$this->model->directory.'/'.$resource->routeKeyValue()));

        return redirect('admin/'.$this->model->directory)->with('toast', $this->toast);

    }




// END OF CLASS

}
