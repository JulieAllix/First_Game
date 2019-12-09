<header>
    <h1 class="game-title">Scores for the <?= $viewVars['level_name'] ?>: Top 20</a></h1>
</header>

<pre>
<?php
//var_dump($viewVars['score_data']);
?>
</pre>
<main>
    <div class="wrapper-table">
        <table class="table">
            <tr class="table-header">
                <th>Ranking</th>
                <th>Player's name</th>
                <th>Also known as</th> 
                <th>Score</th>
            </tr>
            <?php $i = 1;
            foreach ($viewVars['score_data'] as $currentScore):?>
            <tr class="table-content">
                <td><?=$i?></td>
                <td><?= $currentScore->getPlayerNewname() ?></td>
                <td><?= $currentScore->getPlayerName() ?></td>
                <td><?= $currentScore->getScore() ?></td>
            </tr>
            <?php $i++;
            endforeach ?>
        </table>
    </div>
    <button class="btn btn-primary border-0"><a class="" href="./">Back to homepage</a></button>
</main>