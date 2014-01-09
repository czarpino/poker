<?php namespace Foo\PokerOO;



class Poker
{
    
    private $players, $deck, $communityCards = [];
    
    public function __construct($players, $deck)
    {
        $this->players = $players;
        $this->deck = $deck;
    }
    
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
    
    public function dealCommunityCards()
    {
        $numOfPlayers = count($this->players);
        for ($i = 0; $i < 5; $i ++) {
            $this->communityCards[] = $this->deck[2 * $numOfPlayers + $i];
        }
        
        return $this;
    }
    
    public function showdown()
    {
        // TODO
    }
    
    public function getResults()
    {
        // TODO
    }
    
    public function getCommunityCards()
    {
        return $this->communityCards;
    }
    
}
