<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Poker</title>
    </head>
    <body>
        <h1>Poker</h1>
        
        <h2>Scenario:</h2>
        <section>
            <?php foreach ($scenario["private"] as $player => $cards): ?>
            <p>
                <strong>Player <?php echo $player ?>:</strong>
                <?php echo $cards[0]->getValue() . " of " . $cards[0]->getSuit(); ?>, 
                <?php echo $cards[1]->getValue() . " of " . $cards[1]->getSuit(); ?>, 
            </p>
            <?php endforeach; ?>
            <p>
                <strong>Community cards:</strong>
                <?php echo $scenario["community"][0]->getValue() . " of " . $scenario["community"][0]->getSuit(); ?>,
                <?php echo $scenario["community"][1]->getValue() . " of " . $scenario["community"][1]->getSuit(); ?>,
                <?php echo $scenario["community"][2]->getValue() . " of " . $scenario["community"][2]->getSuit(); ?>,
                <?php echo $scenario["community"][3]->getValue() . " of " . $scenario["community"][3]->getSuit(); ?>,
                <?php echo $scenario["community"][4]->getValue() . " of " . $scenario["community"][4]->getSuit(); ?>
            </p>
        </section>
        
        <h2>Plays</h2>
        <section>
            <?php foreach ($plays as $player => $cards): ?>
            <p>
                <strong>Player <?php echo $player ?>:</strong>
                <?php echo $cards[0]->getValue() . " of " . $cards[0]->getSuit(); ?>, 
                <?php echo $cards[1]->getValue() . " of " . $cards[1]->getSuit(); ?>, 
                <?php echo $cards[2]->getValue() . " of " . $cards[2]->getSuit(); ?>, 
                <?php echo $cards[3]->getValue() . " of " . $cards[3]->getSuit(); ?>, 
                <?php echo $cards[4]->getValue() . " of " . $cards[4]->getSuit(); ?>, 
            </p>
            <?php endforeach; ?>
        </section>
    </body>
</html>