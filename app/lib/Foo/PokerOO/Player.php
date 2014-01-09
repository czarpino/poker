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
        $cards = array_slice($options, 0, 5);
        $this->hand = new Hand($cards, $this->indentifyHand($cards));
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
    
    /**
     * Indentify the typde of hand the cards make up
     * 
     * @param array $cards
     * 
     * @return string hand type
     */
    public function indentifyHand($cards)
    {
        $occurrences = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $suits = [];
        $kindValues = [];
        
        foreach ($cards as $card) {
            $occurrences[$this->_getCardValue($card) - 1] += 1;
            $suits[] = $card->getSuit();
            $kindValues[] = $this->_getCardValue($card);
        }
        
        $occurrences2 = [0, 0, 0, 0, 0];
        
        foreach ($occurrences as $occurrence) {
            $occurrences2[$occurrence] += 1;
        }
        
        if (1 === $occurrences2[4]) {
            return "four of a kind";
        }
        
        if (1 === $occurrences2[3] && 1 === $occurrences2[2]) {
            return "full house";
        }
        
        if (1 === $occurrences2[3]) {
            return "three of a kind";
        }
        
        if (2 === $occurrences2[2]) {
            return "two pairs";
        }
        
        if (1 === $occurrences2[2]) {
            return "pair";
        }
        
        sort($kindValues);
        $consecutiveSum = intval($kindValues[4] / 2) * ($kindValues[0] + $kindValues[4]) + $kindValues[2];
        $isStraight = array_sum($kindValues) === $consecutiveSum;
        $isFlush = 1 === count(array_count_values($suits));
        
        if ($isStraight && $isFlush) {
            return "straight flush";
        }
        
        if ($isFlush) {
            return "flush";
        }
        
        if ($isStraight) {
            return "straight";
        }
        
        return "nothing";
    }
    
    private function _getCardValue(Card $card)
    {
        $kind = $card->getKind();
        
        if ("Ace" === $kind) {
            return 1;
        }
        
        if ("King" === $kind) {
            return 13;
        }
        
        if ("Queen" === $kind) {
            return 12;
        }
        
        if ("Jack" === $kind) {
            return 11;
        }
        
        return intval($kind);
    }
    
}
