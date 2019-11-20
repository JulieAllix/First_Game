<?php
require 'templates/header.tpl.php';
require 'inc/playersName.php';
require 'templates/footer.tpl.php';
?>

<script>

function askPlayersName(){
            var playerName = prompt('What\'s your name ?');
            var randomName = '<?= $randomName; ?>';
            alert('Urgh, ' + playerName + ', really ? May I call you ' + randomName + ' instead ?');
            alert('Great ! Let\'s go ' + randomName + ' !!');
        }
        
askPlayersName();
</script>

