<div class="wrapper-home-btn">
    <div class="minor-btn-div">
            <button type="button" class="minor-btn" id="home-btn" >Home</button>
    </div>
</div>

<script>
    // We add an event listener on the click of the button that enables to change the name
    var homeButton = document.getElementById('home-btn');
    homeButton.addEventListener('click', function(){
        window.location.href = '.'
    }); 
</script>