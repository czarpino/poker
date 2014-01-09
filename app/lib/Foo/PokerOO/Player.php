<?php namespace Foo\PokerOO;



class Player
{
    
    private $name, $cards, $hand;
    
    /**
     * Constructor
     * 
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    /**
     * Set player's private cards
     * 
     * @param array $cards
     * 
     * @return \Foo\PokerOO\Player self
     */
    public function setCards(array $cards)
    {
        $this->cards = $cards;
        
        return $this;
    }
    
    /**
     * Player creates a hand using private cards and community cards
     * 
     * @param array $communityCards
     * 
     * @return \Foo\PokerOO\Player self
     */
    public function chooseHand(array $communityCards)
    {
        $options = array_merge($this->cards, $communityCards);
        shuffle($options);
        $this->hand = array_slice($options, 0, 5);
//        $this->hand = [
//            new Card("Spade", "2"),
//            new Card("Heart", "2"),
//            new Card("D", "2"),
//            new Card("C", "2"),
//            new Card("Spade", "5"),
//        ];
        return $this;
    }
    
    /**
     * Retrieve player hand
     * 
     * @return Player's hand
     */
    public function getHand()
    {
        return $this->hand;
    }
    
    /**
     * Get player name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Retrieve private cards
     * 
     * @return array Private cards
     */
    public function getCards()
    {
        return $this->cards;
    }
    
}
