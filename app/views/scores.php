<header>
    <h1 class="scores-title">Scores for the <?= $viewVars['level_name'] ?>: Top 20</a></h1>
</header>

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
        <button type="button" class="minor-btn" id="home-btn" >Home</button>
        <!--
        <button type="button" class="minor-btn" id="try-again-btn" >Try again</button>
            -->
    </div>

</main>


<script>

    // We add an event listener on the click of the button that enables to change the name
    var homeButton = document.getElementById('home-btn');
    homeButton.addEventListener('click', function(){
        window.location.href = '.'
    }); 
    // We add an event listener on the click of the score button that enable to reach the scores page
    var tryAgainButton = document.getElementById('try-again-btn');
    tryAgainButton.addEventListener('click', function(){
    window.location.href = 'scores'
    }); 

</script>