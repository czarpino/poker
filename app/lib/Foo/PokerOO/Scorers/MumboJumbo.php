<?php namespace Foo\PokerOO\Scorers;



/**
 * A mumbo jumbo algorithm for scoring hands
 */
class MumboJumbo implements Scorer
{
    
    /**
     * Evaluate hand of cards
     *  
     * @param array $hand
     * 
     * @return Hand score
     */
    public function score(array $hand)
    {
        return rand(1, 5);
        $handType = $this->_indentifyHand();
        $mult = $this->_getMultiplier($handType);
        /*baseScore = 0;
        
        foreach ($hand as $card) {
            $baseScore += $this->_getCardValue($card);
        }
        
        if ("straight" === $handType || "straight flush" === $handType) {
            // if lowest straight (5, 4, 3, 2, Ace) then adjust value of ace to 1
            // by subtracting 12 to basevalue
        }*/
        
        return /*$baseScore +*/ $mult * $this->_ceilingScore();
    }
    
    private function _getCardValue(\Foo\PokerOO\Card $card)
    {
        $kind = $card->getKind();
        
        if ("Ace" === $kind) {
            return 13;
        }
        
        if ("King" === $kind) {
            return 12;
        }
        
        if ("Queen" === $kind) {
            return 11;
        }
        
        if ("Jack" === $kind) {
            return 10;
        }
        
        return intval($kind) - 1;
    }
    
    private function _ceilingScore()
    {
        // 4 Aces (52) + King (12)
        return 64;
    }
    
    public function _getMultiplier($handType)
    {
        switch ($handType) {
            case "":
            default:
                return 0;
        }
    }
    
}
