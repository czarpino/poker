<?php namespace Foo\PokerOO;

use Scorers\Scorer;
use Scorers\Sorter;



class PokerUtility
{
    
    public function getSuits()
    {
        return ["Heart", "Spade", "Club", "Diamond"];
    }
    
    public function getCardKinds()
    {
        return ["Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King"];
    }
    
    /**
     * Create a specified number of players
     * 
     * @param int $numOflayers
     * 
     * @return \Foo\PokerOO\Player
     */
    public function createPlayers($numOflayers)
    {
        $players = [];
        while (0 < $numOflayers --) {
            $players[] = new Player("Player $numOflayers");
        }
        
        return $players;
    }
    
    /**
     * Create a deck of cards
     * 
     * @return \Foo\PokerOO\Card
     */
    public function createDeck()
    {
        $deck   = [];
        
        foreach ($this->getSuits() as $suit) {
            foreach ($this->getCardKinds() as $kind) {
                $deck[] = new Card($suit, $kind);
            }
        }
        
        return $deck;
    }
    
    /**
     * Sort specified players by their hands
     * 
     * @param array $players
     * @param \Scorers\Scorer $scorer
     * @param \Scorers\Sorter $sorter
     * 
     * @return array
     */
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
