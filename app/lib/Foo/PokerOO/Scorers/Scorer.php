<?php namespace Foo\PokerOO\Scorers;



/**
 * Interface for scoring algorithms
 */
interface Scorer
{
    public function score(\Foo\PokerOO\Hand $hand);
}
