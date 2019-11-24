<?php
    require 'templates/header.tpl.php';
?>

        <body>
            <header>
                <h1 class="game-title">I want to break free</h1>
            </header>
            <main>
                <div class="wrapper">
                    <h2 class="level-title">Please select your level of difficulty, <em id="randomName"></em> :</h2>
                    <!-- Form that will enable the player to choose a level of difficulty -->
                    <form class="form" action="" method="post">
                        <div class="btn-group-vertical">
                            <button class="btn btn-primary border-0"><a class="level-link" href="very-easy-level.php">I really suck at that game, don't judge me, ok ?</a></button>
                            <button class="btn btn-primary border-0"><a class="level-link" href="easy-level.php">Let's start easy !</a></button>
                            <button class="btn btn-primary border-0" ><a class="level-link" href="medium-level.php">I can handle more complicated stuff !</a></button>
                            <button class="btn btn-primary border-0" ><a class="level-link" href="hardcore-level.php">HARDCOOOORE !</a></button>
                        </div>
                    </form>
                </div>
            </main>
        </body>
    </html>


    <script>

        function askPlayersName(){
                    var namesList = ['Karen','Michel','Jean-Jacques'];
                    var randomId = Math.floor(Math.random() * Math.floor(namesList.length));
                    var randomName = namesList[randomId];

                    var playerName = prompt('What\'s your name ?');
                    alert('Urgh, ' + playerName + ', really ? May I call you ' + randomName + ' instead ?');
                    alert('Way better ! Let\'s go ' + randomName + ' !!');
                    document.getElementById('randomName').innerHTML = randomName;
                }
                
        askPlayersName();

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    


