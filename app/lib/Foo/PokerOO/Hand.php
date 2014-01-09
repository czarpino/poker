<?php namespace Foo\PokerOO;



class Hand
{
    private $cards, $type;
    
    /**
     * Constructor
     * 
     * @param array $cards
     * @param string $type
     */
    public function __construct($cards, $type)
    {
        $this->cards = $cards;
        $this->type = $type;
    }
    
    /**
     * Retrieve cards
     * 
     * @return array Cards of this hand
     */
    public function getCards()
    {
        return $this->cards;
    }
    
    /**
     * Retrieve hand type
     * 
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
