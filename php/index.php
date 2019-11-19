<?php
require 'templates/header.tpl.php';
require 'inc/data.php';
$namesTableLength = count($namesList);
?>

<script>

function randomName(){
    Math.floor(Math.random() * Math.floor(max));
}

function askPlayersName(){
            var playerName = prompt('What\'s your name ?');
            alert("Urgh, " + playerName + ', really ? May I call you ' + randomName() + ' instead ?');
        }

randomName()
//askPlayersName();
</script>

<?php
require 'templates/footer.tpl.php';
?>