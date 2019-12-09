<header>
    <h1 class="game-title">Scores for the level <?= $viewVars['level_name']?> : Top 20</a></h1>
</header>

<pre>
<?php
//var_dump($viewVars['score_data']);
var_dump($viewVars['level_name']);
?>
</pre>
<main>
    <div class="wrapper-table">
        <table class="table">
            <tr class="table-header">
                <th>Player's name</th>
                <th>Also known as</th> 
                <th>Score</th>
            </tr>
            <tr class="table-content">
                <td>Michel</td>
                <td>Jullix</td>
                <td>100</td>
            </tr>
        </table>
    </div>
</main>