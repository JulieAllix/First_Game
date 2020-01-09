    <header>
        <h1 class="game-title">I want to break free</a></h1>
    </header>
<main>
    <div class="wrapper">
        <h2 class="level-title">Please select your level, <span id="randomName"></span> :</h2>
        
            <div class="btn-group-vertical">
                <button class="btn btn-primary border-0" id="v-easy-btn" type="button">I really suck at that game, don't judge me, ok ?</button>
                <button class="btn btn-primary border-0" id="easy-btn" type="button">Let's start easy !</button>
                <button class="btn btn-primary border-0" id="medium-btn" type="button">I can handle more complicated stuff !</button>
                <button class="btn btn-primary border-0" id="hardcore-btn" type="button">HARDCOOOORE !</button>
            </div>

            <div class="minor-btn-div">
                <button type="button" class="minor-btn" id="change-name-btn" >New player</button>
                <!-- <button type="button" class="minor-btn" id="scores-btn" >Scores</button> -->
            </div>
    </div>
</main>

<script>
    // We use a localStorage in order to keep the name given to the player in memory
    const randomName = localStorage.getItem('name')
    
    // If no name was given to the player yet, we call the function askPlayersName
    if (randomName == ""){
    appGen.askPlayersName();
    }else{
    document.getElementById('randomName').innerHTML = randomName;
    }

    // We add event listeners on the click of the level buttons that enable to reach the level page
    var veryEasyButton = document.getElementById('v-easy-btn');
    veryEasyButton.addEventListener('click', function(){
        window.location.href = 'very-easy'
    }); 
    var easyButton = document.getElementById('easy-btn');
    easyButton.addEventListener('click', function(){
        window.location.href = 'easy'
    }); 
    var mediumButton = document.getElementById('medium-btn');
    mediumButton.addEventListener('click', function(){
        window.location.href = 'medium'
    }); 
    var hardcoreButton = document.getElementById('hardcore-btn');
    hardcoreButton.addEventListener('click', function(){
        window.location.href = 'hardcore'
    }); 

    // We add an event listener on the click of the button that enables to change the name
    var changeNameButton = document.getElementById('change-name-btn');
    changeNameButton.addEventListener('click', function(){
        appGen.askPlayersName()
    }); 
    // We add an event listener on the click of the score button that enable to reach the scores page
    var scoresButton = document.getElementById('scores-btn');
    scoresButton.addEventListener('click', function(){
    window.location.href = 'all-scores'
    }); 

</script>

