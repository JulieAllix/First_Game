var app = {
    init: function(){
        // We first create the main character
        app.drawCharacter(main);
    },
    drawCharacter: function(character){
        app.eraseDrawingZone();
    },
    eraseDrawingZone: function(){
        // I select the game zone
        let gameZone = document.querySelector('#game-zone');
        // I empty its content
        gameZone.innerText = "";
    }
}