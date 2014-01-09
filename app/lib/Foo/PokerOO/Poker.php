<?php namespace Foo\PokerOO;



class Poker
{
    
    private $players, $deck;
    
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
        // TODO
    }
    
    public function showdown()
    {
        // TODO
    }
    
    public function getResults()
    {
        // TODO
    }
    
}
