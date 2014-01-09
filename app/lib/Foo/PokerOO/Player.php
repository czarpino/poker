<?php namespace Foo\PokerOO;



class Player
{
    private $name, $privateCards, $hand = NULL;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function setCards(array $cards)
    {
        $this->privateCards = $cards;
        
        return $this;
    }
    
    public function chooseHand(array $communityCards)
    {
        // TODOs
    }
}
