<?php namespace Foo\Poker;



class Card
{
    private $suit, $value;
    
    /**
     * Constructor
     * 
     * @param string $suit
     * @param string $value
     */
    public function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }
    
    /**
     * Retrieve card suit
     * 
     * @return Card suit
     */
    public function getSuit()
    {
        return $this->suit;
    }
    
    /**
     * Retrieve card value
     * 
     * @return Card value
     */
    public function getValue()
    {
        return $this->value;
    }
}