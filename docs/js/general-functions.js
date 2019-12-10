var appGen = {

    setCookie: function (cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },

    askPlayersName: function (){        
        // we randomly select a new name among the namesList table
        var namesList = ['Karen','Michel','Jean-Jacques'];
        var randomId = Math.floor(Math.random() * Math.floor(namesList.length));
        var randomName = namesList[randomId];

        // we request the player's name and change it for the new name
        var playerName = prompt('What\'s your name ?');
        alert('Urgh, ' + playerName + ', really ? May I call you ' + randomName + ' instead ?');
        alert('Way better ! Let\'s go ' + randomName + ' !!');
        document.getElementById('randomName').innerHTML = randomName;
        localStorage.setItem('name', randomName);
        // we set cookies in order to transmit the js variables to php (to transmit them to the DB afterwards)
        // there are three parameters : name of the cookie, value of the cookie, number of days until the cookie should expire
        appGen.setCookie('player_name', playerName, 1);
        appGen.setCookie('random_name', randomName, 1);
        window.location.reload(true); 
    },

}