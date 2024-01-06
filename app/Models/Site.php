<?php

namespace App\Models;

use Illuminate\Support\Str;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;


    // FORCE TABLE NAME

    protected $table = 'config';




    // FORMAT MODEL DATA

    public function formatModelData(string $name = null, string $form_size = 'lg', bool $has_image = false){

        if(empty($name))
            return false;

        $kebab = Str::kebab($name);
        $kebab_plural = Str::plural($kebab);
        $label = Str::replace('-', ' ', $kebab);
        $plural = Str::plural($label);

        return (object) array(
            'name' => $name,
            'directory' => $kebab_plural,
            'form_size' => $form_size,
            'label' => $label,
            'plural' => $plural,
            'has_image' => $has_image
        );

    }




    // GET PAGE HEADINGS

    public function getPageHeadings($model){

        $method = self::getMethod();
        $label = $model->label;
        $plural = $model->plural;

        switch ($method){
                
            // INDEX
            case 'index':
                $pageHeadings = [
                    'True crime '.$plural,
                    'Browse our full index of '.$plural.'.'
                ];
            break;

            // ADMIN INDEX
            case 'adminIndex':
                $pageHeadings = [
                    'Manage '.$plural,
                    'View, edit, manage your '.$plural.'.'
                ];
            break;

            // CREATE
            case 'create':
                $pageHeadings = [
                    'Create a new '.$label,
                    'Add the information for this '.$label.'.'
                ];
            break;

            // EDIT
            case 'edit':
                $pageHeadings = [
                    'Edit this '.$label,
                    'Update the information for this '.$label.'.'
                ];
            break;

            // CONFIRM DELETE
            case 'confirmDelete':
                $pageHeadings = [
                    'Delete this '.$label,
                    'Are you sure you want to delete this '.$label.'?'
                ];
            break;
                
            // DEFAULT
            default:
                $pageHeadings = [];
                    
        }

        return $pageHeadings;

    }




    // GET CONTROLLER NAME

    public function getController(){

        return strtok(substr(strrchr(request()->route()->getActionName(), '\\'), 1), '@');

    }




    // GET THE METHOD IN USE

    public function getMethod(){
        list(, $method) = explode('@', Route::getCurrentRoute()->getActionName());
        return $method;
    }




    




// GET RESOURCES

private function getResources(
    object $model, 
    bool $paginate = false, 
    int $limit = null,
    string $status = null,
    bool $random = false, 
    string $order = null, 
    string $sort = null
){

    $order = $order ?: 'created_at';
    $sort = $sort ?: 'desc';

    $resources = $status ? $model::where('status', $status) : $model::whereNotNull('id');

    if($paginate){

        $limit = $limit ?: 12;
        $prepend = self::getController() == 'AdminController' ? 'admin/' : null;

        return $resources
            ->orderBy($order, $sort)
            ->paginate($limit)
            ->withPath($prepend.$model->directory);

    }

    if($limit){
    
        if($random)
            return $resources->inRandomOrder()->take($limit)->get();
        else
            return $resources->orderBy($order, 'desc')->take($limit)->get();
    }
        
    return $resources->orderBy($order, $sort)->get();

}




    // RESOURCE: CATEGORIES

    public function categories(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = 'name', string $sort = 'ASC'){

        $model = new Category();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: COUNTRIES

    public function countries(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = 'name', string $sort = 'ASC'){

        $model = new Country();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }


    // RESOURCE: STATES

    public function states(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = 'name', string $sort = 'ASC'){

        $model = new State();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: COUNTIES

    public function counties(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = 'name', string $sort = 'ASC'){

        $model = new County();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: CITIES

    public function cities(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = 'name', string $sort = 'ASC'){

        $model = new City();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: CRIMINAL CASES

    public function criminalCases(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = null, string $sort = null){

        $model = new CriminalCase();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: CRIMINALS

    public function criminals(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = null, string $sort = null){

        $model = new Criminal();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: JUDGES

    public function judges(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = null, string $sort = null){

        $model = new Judge();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }



    // RESOURCE: NEWS ARTICLES

    public function articles(bool $paginate = false, int $limit = null, string $status = null, $random = false, string $order = null, string $sort = null){

        $model = new Article();
        return self::getResources($model, $paginate, $limit, $status, $random, $order, $sort);

    }

    // STATES WITH COUNT OF CRIME CASES

    public function getStateCounts(){

        $states = CriminalCase::select('state_id', DB::raw('count(*) as cases'))
        ->groupBy('state_id')
        ->orderBy('cases', 'DESC')
        ->get();

        $state_counts = [];

        foreach($states as $state){
            $state_counts[] = [
                'state' => State::find($state['state_id']),
                'cases' => $state['cases']
            ];
        }

        return $state_counts;

    }







    // SEARCH RESULTS

    private function getSearchResources($model, string $search_term, $search_field = 'title', bool $paginate = false, int $limit = null, $random = null, string $order = null, string $sort = null){

        $order = $order ?: 'created_at';
        $sort = $sort ?: 'desc';
        $search_field = $search_field ?: 'title';
        if($paginate){
    
            $limit = $limit ?: 12;
            $prepend = self::getController() == 'AdminController' ? 'admin/' : null;
    
            return $model::where($search_field, 'LIKE', '%'.$search_term.'%')
                ->orderBy($order, $sort)
                ->paginate($limit)
                ->withPath($prepend.$model->modelData()->directory);
    
        }
    
        if($limit){
            if($random)
                return $model::inRandomOrder()->take($limit)->get();
            else
                return $model::orderBy($order, 'desc')->take($limit)->get();
        }
    
        return $model::orderBy($order, $sort)->get();
    
    }
    
    
    
    
    // RESOURCE: SEARCH CRIMINAL CASES
    
    public function searchCriminalCases(string $search_term, string $search_field = null, bool $paginate = true, int $limit = 12, $random = false, $order = null, $sort = null){
    
        $model = new CriminalCase();
        return self::getSearchResources($model, $search_term, $search_field, $paginate, $limit, $random, $order, $sort);
    
    }
    
    
    // RESOURCE: SEARCH ARTICLES
    
    public function searchArticles(string $search_term, string $search_field = null, bool $paginate = true, int $limit = 12, $random = false, $order = null, $sort = null){
    
        $model = new Article();
        return self::getSearchResources($model, $search_term, $search_field, $paginate, $limit, $random, $order, $sort);
    
    }
    
    
    // RESOURCE: SEARCH CRIMINALS
    
    public function searchCriminals(string $search_term, string $search_field = 'first_name', bool $paginate = true, int $limit = 12, $random = false, $order = null, $sort = null){
    
        $model = new Criminal();
        return self::getSearchResources($model, $search_term, $search_field, $paginate, $limit, $random, $order, $sort);
    
    }
    
    


// END OF CLASS

}
