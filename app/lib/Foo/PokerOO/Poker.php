<?php namespace Foo\PokerOO;



class Poker
{
    
    private $players, $deck;
    
    public function __construct($players, $deck)
    {
        $this->players = $players;
        $this->deck = $deck;
    }
    
    public function dealPrivateCards()
    {
        // TODO
    }
    
    public function dealCommunityCards()
    {
        // TODO
    }
    
    public function showdown()
    {
        // TODO
    }
    
    public function getResults()
    {
        // TODO
    }
    
}
