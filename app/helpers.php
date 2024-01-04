<?php

use Carbon\Carbon;
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


