<?php namespace Foo\PokerOO;

use Scorers\Scorer;
use Scorers\Sorter;



class PokerUtility
{
    private $suits  = ["Heart", "Spade", "Club", "Diamond"];
    private $kinds = ["Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King"];
    
    public function createPlayers($numOflayers)
    {
        $players = [];
        while (0 < $numOflayers --) {
            $players[] = new Player("Player $numOflayers");
        }
        
        return $players;
    }
    
    public function createDeck()
    {
        $deck   = [];
        
        foreach ($this->suits as $suit) {
            foreach ($this->kinds as $kind) {
                $deck[] = new Card($suit, $kind);
            }
        }
        
        return $deck;
    }
    
    public function sortPlayersByHand($players, Scorer $scorer = NULL, Sorter $sorter = NULL)
    {
        if (NULL === $scorer) {
            $scorer = new Scorers\MumboJumbo();
        }
        
        $scores = [];
        
        foreach ($players as $key => $player) {
            $scores[$key] = $scorer->score($player->getHand());
        }
        
        // DEBUG
        foreach ($players as $key => $player) {
            echo $player->getName() . "(" . $scores[$key] . "):";
            foreach ($player->getHand() as $card) {
                echo "$card - ";
            }
            echo "<br/>";
        }
        exit;
        
        if (NULL === $sorter) {
            $sorter = new QuickSorter();
        }
        
        return $sorter->sort($players, $scores);
    }
}
