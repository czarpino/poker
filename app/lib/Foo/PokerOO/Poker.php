<?php namespace Foo\PokerOO;



class Poker
{
    
    private $players, $deck, $communityCards = [];
    
    /**
     * Constructor
     * 
     * @param type $players
     * @param type $deck
     */
    public function __construct($players, $deck)
    {
        $this->players = $players;
        $this->deck = $deck;
        shuffle($this->deck);
    }
    
    /**
     * Deal private cards to each player
     * 
     * @return \Foo\PokerOO\Poker
     */
    public function dealPrivateCards()
    {
        foreach ($this->players as $key => $player) {
            $player->setCards(array (
                $this->deck[2 * $key],
                $this->deck[2 * $key + 1]
            ));
        }
        
        return $this;
    }
    
    /**
     * Deal community cards
     * 
     * @return \Foo\PokerOO\Poker
     */
    public function dealCommunityCards()
    {
        $numOfPlayers = count($this->players);
        for ($i = 0; $i < 5; $i ++) {
            $this->communityCards[] = $this->deck[2 * $numOfPlayers + $i];
        }
        
        return $this;
    }
    
    /**
     * Every player plays their chosen hand
     * 
     * @return \Foo\PokerOO\Poker
     */
    public function showdown()
    {
        foreach ($this->players as $player) {
            $player->chooseHand($this->communityCards);
        }
        
        return $this;
    }
    
    /**
     * Retrieve community cards
     * 
     * @return array Community cards
     */
    public function getCommunityCards()
    {
        return $this->communityCards;
    }
    
}
