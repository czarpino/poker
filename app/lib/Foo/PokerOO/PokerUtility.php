<?php namespace Foo\PokerOO;



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
    
    public function score($cards)
    {
        
    }
}
