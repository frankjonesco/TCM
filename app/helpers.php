<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Butschster\Head\Facades\Meta;




/*******************************/
/* ASSET BUILDS FOR PRODUCTION */
/*******************************/



// CHECH IF ENVIRONMENT IS PRODUCTION

if(!function_exists('environmentIsProduction')){

    function environmentIsProduction(){
            
        if(config('settings.environment') === 'production')
            return true;

        return false;

    }

}


// RETURN ARRAY OF CSS ASSETS

if(!function_exists('explodeCssAssets')){

    function explodeCssAssets(){

        return explode(',', config('settings.css_assets'));

    }

}


// RETRURN ARRAY OF JS ASSETS

if(!function_exists('explodeJsAssets')){

    function explodeJsAssets(){

        return explode(',', config('settings.js_assets'));

    }

}




/*******************************/
/* ASSET BUILDS FOR PRODUCTION */
/*******************************/


// SHOW DATE TIME

if(!function_exists('showDateTime')){

    function showDateTime(Carbon $date = null, bool $showTime = false, string $format = ''){

        $date_format = 'F j, Y';
        $time_format = 'H:i';
            
        if($format == 'short')
            $date_format = 'M d, Y';
            
        if($showTime === true)
            return $date->format($date_format).' at '.$date->format($time_format);
                
        return $date->format($date_format);
       
    }

}




// CONVERT NEW LINE TO PARAGRAPH

if(!function_exists('nl2p')){
    function nl2p($string = ''){

        if(empty($string))
            return false;
        
        $paragraphs = '';
        foreach (explode("\n", $string) as $line) {
            if (trim($line)) {
                $paragraphs .= '<p>' . $line . '</p>';
            }
        }
        return $paragraphs;
    }
}




if(!function_exists('truncate')){
    function truncate(string $text = null, int $character_limit = 50){
        $text = strip_tags($text);
        $text = Str::limit($text, $character_limit, $end='...');
        return $text;
    }
}


    

if(!function_exists('addView')){
    function addView($resource){
        $resource->views += 1;
        $resource->save();
        return true;
    }
}





// FORMAT VIEWS

if(!function_exists('formatViews')){

    function formatViews(int $views = 0){
        // number_format(number,decimals,decimalpoint,separator)
        return number_format($views , 0 , '.' , ',');
    }
    
}




if(!function_exists('ckEditorId')){
    function ckEditorId($name = null){
        return 'ckEditor'.ucfirst($name);
    }
}


