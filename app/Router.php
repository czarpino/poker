<?php



class Router
{
    
    /**
     * Retrieve requested route
     * 
     * @return Requested route
     */
    public function getRequestedRoute()
    {
        return isset ($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : "/";
    }
    
    /**
     * Execute routing
     * 
     * @return Response
     */
    public function execute($request)
    {
        require "controllers" . DIRECTORY_SEPARATOR . "MainController.php";
        
        switch ($request) {
            case "/poker":
                return (new MainController())->poker();
            case "/test":
                return (new MainController())->test();
            default:
                return (new MainController())->home();
        }
    }
}


