<?php namespace Foo\PokerOO;



class Card
{
    private $suit, $kind;
    
    public function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->kind = $value;
    }
    
    public function getSuit()
    {
        return $this->suit;
    }
    
    public function getKind()
    {
        return $this->kind;
    }
    
    public function __toString()
    {
        return $this->kind . " of " . $this->suit . "s";
    }
}
