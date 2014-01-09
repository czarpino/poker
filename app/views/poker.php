<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Poker</title>
    </head>
    <body>
        <h1>Poker</h1>
        
        <h2>Community Cards:</h2>
        <section>
            <ul>
            <?php foreach ($poker->getCommunityCards() as $card): ?>
                <li>
                    <?php echo $card; ?>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
        
        <h2>Private Cards:</h2>
        <section>
            <ul>
            <?php foreach ($poker->getPlayers() as $player): ?>
                <li>
                    <h3><?php echo $player->getName(); ?></h3>
                    <ul>
                        <?php foreach ($player->getCards() as $card): ?>
                        <li><?php echo $card; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
        
        <h2>Showdown:</h2>
        <section>
            <ul>
            <?php foreach ($poker->getPlayers() as $player): ?>
                <li>
                    <h3><?php echo $player->getName() . " : (" . $player->getHand()->getType() . ")"; ?></h3>
                    <ul>
                        <?php foreach ($player->getHand()->getCards() as $card): ?>
                        <li><?php echo $card; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
        
        <h2>Ranked:</h2>
        <section>
            <ul>
            <?php foreach ($sortedPlayers as $player): ?>
                <li>
                    <h3><?php echo $player->getName() . " : (" . $player->getHand()->getType() . ")"; ?></h3>
                    <ul>
                        <?php foreach ($player->getHand()->getCards() as $card): ?>
                        <li><?php echo $card; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
            
    </body>
</html>