    <header>
        <h1 class="game-title">I want to break free</a></h1>
    </header>
<main>
    <div class="wrapper">
        <h2 class="level-title">Please select your level of difficulty, <span id="randomName"></span> :</h2>
        
            <div class="btn-group-vertical">
                <button class="btn btn-primary border-0"><a class="level-link" href="./very-easy">I really suck at that game, don't judge me, ok ?</a></button>
                <button class="btn btn-primary border-0"><a class="level-link" href="./easy">Let's start easy !</a></button>
                <button class="btn btn-primary border-0"><a class="level-link" href="./medium">I can handle more complicated stuff !</a></button>
                <button class="btn btn-primary border-0"><a class="level-link" href="./hardcore">HARDCOOOORE !</a></button>
            </div>

            <div class="minor-btn-div">
                <button type="button" class="minor-btn" id="change-name-button" >New player</button>
            </div>
    </div>
</main>
</body>
</html>


    <script>
        // We use a localStorage in order to keep the name given to the player in memory
        const randomName = localStorage.getItem('name')
        
        // If no name was given to the player yet, we call the function askPlayersName
        if (randomName == ""){
        appGen.askPlayersName();
        }else{
        document.getElementById('randomName').innerHTML = randomName;
        }

        // We add an event listener on the click of the button that enables to change the name
        var changeNameButton = document.getElementById('change-name-button');
        changeNameButton.addEventListener('click', function(){
            appGen.askPlayersName()
        }); 

    </script>
