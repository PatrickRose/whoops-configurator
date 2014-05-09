<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 08/05/14
 * Time: 17:51
 */

namespace PatrickRose\WhoopsConfigurator;


use Config;
use App;
use Whoops\Handler\PrettyPageHandler;

class DeferredWhoopsHandler {

    public static function updateWhoops()
    {

        if(App::bound("whoops")) {
            // Retrieve the whoops handler in charge of displaying exceptions:
            $whoopsDisplayHandler = App::make("whoops.handler");

            // Laravel will use the PrettyPageHandler by default, unless this
            // is an AJAX request, in which case it'll use the JsonResponseHandler:
            if($whoopsDisplayHandler instanceof PrettyPageHandler) {

                // Set a custom page title for our error page:
                $whoopsDisplayHandler->setPageTitle(Config::get("whoops-configurator::title"));

                // Set the "open:" link for files to our editor of choice:
                $whoopsDisplayHandler->setEditor(Config::get("whoops-configurator::editor"));
                return $whoopsDisplayHandler;

            }
        }
        return false;
    }
}
