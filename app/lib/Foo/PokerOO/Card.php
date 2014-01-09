<?php namespace Foo\PokerOO;



class Card
{
    private $suit, $kind;
    
    /**
     * Constructor
     * 
     * @param string $suit
     * @param string $kind
     */
    public function __construct($suit, $kind)
    {
        $this->suit = $suit;
        $this->kind = $kind;
    }
    
    /**
     * Retrieve card suit
     * 
     * @return string
     */
    public function getSuit()
    {
        return $this->suit;
    }
    
    /**
     * Retrieve card suit
     * 
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }
    
    /**
     * @override
     */
    public function __toString()
    {
        return $this->kind . " of " . $this->suit . "s";
    }
}
