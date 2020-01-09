<?php foreach
?>

<header>
    <h1 class="scores-title">Top 20</h1>
</header>

<main>

    <div class="minor-btn-div">
        <button type="button" class="minor-btn" id="home-btn" >Home</button>
    </div>

</main>


<script>

    // We add an event listener on the click of the button that enables to change the name
    var homeButton = document.getElementById('home-btn');
    homeButton.addEventListener('click', function(){
        window.location.href = '.'
    }); 

</script>