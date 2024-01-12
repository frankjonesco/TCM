<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Site;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    
    protected $site, $page, $toast, $viewAssets;


    public function __construct()
    {

        $this->site = new Site();
        $this->page = new Page();
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );

        
    }




    // ADMIN INDEX


    public function index() : View
    {
        $this->page->injectMetadata('Manage content', true, '', true);

        return view('admin.index', [
            'pageHeadings' => [
                'Manage content',
                'View, create, edit and delete your content.'
            ],
            'articles' => $this->site->articles(true, 12)->withPath('admin/articles'),
            'categories' => $this->site->categories(true, 12)->withPath('admin/categories'),
            'criminal_cases' => $this->site->criminalCases(true, 12)->withPath('admin/criminal-cases'),
            'criminals' => $this->site->criminals(true, 12)->withPath('admin/criminals'),
            'judges' => $this->site->judges(true, 12)->withPath('admin/judges'),
            'viewAssets' => $this->viewAssets
        ]);

    }




    // VIEW DATABASES


    public function viewDatabases() : View
    {

        return view('admin.databases', [
            'pageHeadings' => [
                'Manage databases',
                'Clone the '.config('app.name').' database to import.'
            ],
            'viewAssets' => $this->viewAssets
        ]);


    }




    // CLONE DATABASE

    public function cloneDatabase()
    {   

        Artisan::call('migrate:fresh --database="mysql_import"');

        $live_db_tables = DB::select('SHOW TABLES');

        $db = "Tables_in_".env('DB_DATABASE');
        $tables = [];

        foreach($live_db_tables as $table){
            $tables[] = $table->{$db};
        }

        foreach($tables as $i => $table){
        
            DB::connection('mysql_import')->table($table)->delete();

            $rows = DB::connection('mysql')->table($table)->get()->toArray();

            foreach($rows as $row){
                DB::connection('mysql_import')->table($table)->insert(json_decode(json_encode($row), true));   
            }

        }

        return redirect('admin')->with('toast', 'Data copied to import database.');
            
    }




    // VIEW EDIT CONFIG FORM


    public function editConfig() : View 
    {

        return view('admin.edit-config', [
            'pageHeadings' => [
                'Edit configuration',
                'Global settings for '.config('app.name').'.'
            ],
            'config' => $this->site->getConfig(),
            'viewAssets' => $this->viewAssets
        ]);


    }




    // UPDATE CONFIG


    public function updateConfig(Request $request) : RedirectResponse
    {

        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_author' => '',
            'meta_image' => '',
            'contact_email' => 'required|email',
            'copyright' => 'required',
            'powered_by' => 'required',
            'powered_by_link' => 'required',
            'allow_registration' => '',
            'allow_comments' => '',
            'facebook_url' => '',
            'twitter_url' => '',
            'youtube_url' => '',
            'instagram_url' => '',
            'content_image_width' => 'required',
            'content_image_height' => 'required',
            'pagination_items' => 'required',
            'site_offline' => '',
        ]);

        $config = $this->site->getConfig();
    
        $config->meta_title = $request->meta_title;
        $config->meta_description = $request->meta_description;
        $config->meta_keywords = $request->meta_keywords;
        $config->meta_author = $request->meta_author;
        $config->meta_image = $request->meta_image;
        $config->contact_email = $request->contact_email;
        $config->copyright = $request->copyright;
        $config->powered_by = $request->powered_by;
        $config->powered_by_link = $request->powered_by_link;
        $config->allow_registration = $request->allow_registration ? true : false;
        $config->allow_comments = $request->allow_comments ? true : false;
        $config->facebook_url = $request->facebook_url;
        $config->twitter_url = $request->twitter_url;
        $config->youtube_url = $request->youtube_url;
        $config->instagram_url = $request->instagram_url;
        $config->content_image_width = $request->content_image_width;
        $config->content_image_height = $request->content_image_height;
        $config->pagination_items = $request->pagination_items;
        $config->site_offline = $request->site_offline ? true : false;

        $config->save();


        // SAVE TO CONFIG FILE

        $config_array = $config->toArray();
        $filePath = config_path() . '/settings.php';
        $content = '<?php return ' . var_export($config_array, true) . ';';
        File::put($filePath, $content);


        return redirect('admin')->with('toast', 'Configuration updated!');


    }




    // VIEW EDIT ENVIRONMENT FORM


    public function editEnvironment() : View 
    {

        return view('admin.edit-environment', [
            'pageHeadings' => [
                'Edit environment',
                'Environment settings for '.config('app.name').'.'
            ],
            'config' => $this->site->getConfig(),
            'viewAssets' => $this->viewAssets
        ]);


    }




    // UPDATE ENVIRONMENT

    
    public function updateEnvironment(Request $request) : RedirectResponse
    {

        $request->validate([
            'environment' => 'required',
            'css_assets' => 'required',
            'js_assets' => 'required',
        ]);

        $config = $this->site->getConfig();

        $config->environment = $request->environment;
        $config->css_assets = $request->css_assets;
        $config->js_assets = $request->js_assets;

        $config->save();

    
        // SAVE TO CONFIG FILE

        $config_array = $config->toArray();
        $filePath = config_path() . '/settings.php';
        $content = '<?php return ' . var_export($config_array, true) . ';';
        File::put($filePath, $content);

        return redirect('admin')->with('toast', 'Environment set to '.$request->environment.'!');

    
    }




// END OF CLASS

}