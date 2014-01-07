<?php



class MainController
{
    
    public function home()
    {
        include  ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "home.php";
    }
    
    public function test()
    {
        $util = new \Foo\Poker\Utility();
        $scenario = $util->generateScenario($util->getPlayers((int)$_GET["players"]));
        $plays = $util->showdown($scenario["private"], $scenario["community"]);
        
        include  ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "test.php";
    }
    
}
