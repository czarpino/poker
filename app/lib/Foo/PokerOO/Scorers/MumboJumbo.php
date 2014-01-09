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
    public function score(\Foo\PokerOO\Hand $hand)
    {
//        $handType = $this->_indentifyHand($hand);
        $mult = $this->_getMultiplier($hand->getType());
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
    
    private function _ceilingScore()
    {
        // 4 Aces (52) + King (12)
        return 64;
    }
    
    private function _getMultiplier($handType)
    {
        switch ($handType) {
            case "pair":
                return 1;
            case "two pairs":
                return 2;
            case "three of a kind":
                return 3;
            case "straight":
                return 4;
            case "flush":
                return 5;
            case "fullhouse":
                return 6;
            case "four of a kind":
                return 7;
            case "straight flush":
                return 8;
            default:
                return 0;
        }
    }
    
}
