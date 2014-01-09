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
        // TODO
    }
}
