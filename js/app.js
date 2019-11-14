var app = {
    init: function(){
        
        // We get the start button and add an event to it
        let buttonElement = document.querySelector('#start');
        buttonElement.addEventListener("click", app.handleButtonClick);

        //let buttonElementClean = document.querySelector('#clean');
        //buttonElementClean.addEventListener('click', function(){
            //console.log('test');
        //});
    },
    handleButtonClick:function(){
        app.drawModel('player');
    },
    drawModel: function(name){
        // We first erase the gaming zone
        app.erasePlayerZone();
        event.preventDefault();
        // We get the content of the model with the character name
        let model = drawings.characters[name];
        console.log('fail');
        //For each model element, I get the line in the modelLine variable
        for (let modelLine of model) {
            app.drawLine(modelLine);
            
        }
    },
    erasePlayerZone: function(){
        // I select the game zone
        let playerZone = document.querySelector('#player-zone');
        // I empty its content
        playerZone.innerText = "";
    },
    drawLine: function(line) {
        // I select the player zone
        let playerZone = document.querySelector('#player-zone');
        // for each character of the line, we create a pixel element and we add the class corresponding to the character. Then we add the pixel elt to the player zone
        for (let character of line) {
            let pixelElement = document.createElement('div');
            pixelElement.innerText = character;
            let className = app.getCharacterClassName(character);
            pixelElement.classList.add(className);
            console.log(pixelElement);
            playerZone.appendChild(pixelElement);
        }
        // We go back to the next line
        let brElement = document.createElement('br');
        playerZone.appendChild(brElement);
    },
    getCharacterClassName: function(char) {
        // We will find in drawings.js the value corresponding to the 'char' index
        return drawings.types[char];
    }
};

document.addEventListener('DOMContentLoaded', app.init);