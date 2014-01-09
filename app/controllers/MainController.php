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
    
    public function poker()
    {
        $util = new \Foo\PokerOO\PokerUtility();
        
        $players = $util->createPlayers(intval($_GET["players"]));
        
        //echo nl2br(print_r($players, true)); exit;
        
        $deck = $util->createDeck();
        
        $poker = new Poker($players, $deck);
        $poker->dealPrivateCards();
        $poker->dealCommunityCards();
        $poker->showdown();
        $rankedPlayers = $poker->getRankedPlayers();
        
        // include template
    }
    
}
