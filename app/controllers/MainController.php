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
        $deck = $util->createDeck();
        
        $poker = new \Foo\PokerOO\Poker($players, $deck);
        $poker->dealPrivateCards();
        $poker->dealCommunityCards();
        $poker->showdown();
        
        $sortedPlayers = $util->sortPlayersByHand($players);
        
        //var_dump($players);
        //var_dump($sortedPlayers);
//        echo nl2br(print_r($players, true));
//        echo nl2br(print_r($sortedPlayers, true)); exit;
        
        // include template
        include  ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "poker.php";
    }
    
}
