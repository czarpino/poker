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
        //return rand(1, 5);
        $handType = $this->_indentifyHand($hand);
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
    
    private function _indentifyHand($hand)
    {
        $occurrences = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $suits = [];
        $kindValues = [];
        
        foreach ($hand as $card) {
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
    
}
