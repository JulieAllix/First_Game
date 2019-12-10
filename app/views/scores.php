<header>
    <h1 class="scores-title">Scores for the <?= $viewVars['level_name'] ?>: Top 20</a></h1>
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
    <div class="minor-btn-div">
        <button type="button" class="minor-btn" id="change-name-button" >Home</button>
        <button type="button" class="minor-btn" id="change-name-button" >Try again</button>
    </div>
    <!--
    <nav class="navbar">
        <ul class="navbar-ul">
            <li class="navbar-item">
            <a href="./" class="minor-btn">Home</a>
            </li>
            <li class="navbar-item">
            <a href="" class="minor-btn">Try again</a>
            </li>
        </ul>
    </nav>
            -->
</main>