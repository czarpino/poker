<?php namespace Foo\PokerOO;



class Player
{
    private $name, $privateCards, $hand = NULL;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
}
