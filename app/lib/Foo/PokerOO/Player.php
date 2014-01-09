<?php namespace Foo\PokerOO;



class Player
{
    
    private $name, $cards, $hand;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function setCards(array $cards)
    {
        $this->cards = $cards;
        
        return $this;
    }
    
    public function chooseHand(array $communityCards)
    {
        $options = array_merge($this->cards, $communityCards);
        shuffle($options);
        $this->hand = array_slice($options, 0, 5);
        
        return $this;
    }
    
    public function getHand()
    {
        return $this->hand;
    }
    
}
