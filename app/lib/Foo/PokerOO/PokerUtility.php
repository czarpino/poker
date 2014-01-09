<?php namespace Foo\PokerOO;



class PokerUtility
{
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
        $suits  = ["Heart", "Spade", "Club", "Diamond"];
        $values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
        $deck   = [];
        
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $deck[] = new Card($suit, $value);
            }
        }
        
        return $deck;
    }
}
