<?php namespace Foo\Poker;



/**
 * Poker functions
 */
class Utility
{
    
    /**
     * Create a deck of cards
     * 
     * @return Deck of Cards
     */
    public function createDeck()
    {
        $suits = ["Club", "Heart", "Diamond", "Spade"];
        $values = ["Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King"];
        $deck = [];
        
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $deck[] = new Card($suit, $value);
            }
        }
        
        return $deck;
    }
    
    /**
     * Create scenario of 5 community cards and 2 private cards
     * 
     * @return Scenario
     */
    public function generateScenario($players)
    {
        $privateCards = [];
        $communityCards = [];
        $deck = $this->createDeck();
        shuffle($deck);
        
        foreach ($players as $key => $player) {
            $privateCards["$player"][] = $deck[$key * 2];
            $privateCards["$player"][] = $deck[$key * 2 + 1];
        }
        
        $numOfPlayers = count($players);
        for ($i = 0; $i < 5; $i ++) {
            $communityCards[] = $deck[$numOfPlayers * 2 + $i];
        }
        
        return ["private" => $privateCards, "community" => $communityCards];
    }
    
    /**
     * Generate plays for a showdown
     * 
     * @param array $privateCards
     * @param array $communityCards
     * 
     * @return Cards played by each player
     */
    public function showdown($privateCards, $communityCards)
    {
        $plays = [];
        
        foreach ($privateCards as $playerName => $playerCards) {
            $cardPool = array_merge($playerCards, $communityCards);
            shuffle($cardPool);
            $plays[$playerName] = array_slice($cardPool, 2);
        }
        
        return $plays;
    }
    
    /**
     * Generate player names
     * 
     * @param int $count
     * 
     * @return Player names
     */
    public function getPlayers($count)
    {
        $names = [];
        
        for ($i = $count; 0 < $i; $i --) {
            $names[] = $count - $i + 1;
        }
        
        return $names;
    }
    
}
