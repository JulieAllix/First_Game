<script>

// **************** Variables necessary for the game ****************

        // ** Colors
        elementsColor = '#1E252D';

        // ** Canvas
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var x = canvas.width/2;
        var y = canvas.height-30;
        
        // ** Ball
        var ballRadius = 10;
        var randomColor = elementsColor;
        var ballSpeedAfterHittingPaddle = 1.1;
        // enable the ball movement
        // I created the initalDx and intialDy variables because the ball movement is redefined after the player loses 1 life, but the ball movement can change during the game
        var initialDx = -3;
        var initialDy = -1;
        var dx = -3;
        var dy = -1;

        // ** Paddle
        var paddleHeight = 15;
        var paddleWidth = 150;
        var paddleSpeed = 15;
        // starting point of the paddle on the X axis
        var paddleX = (canvas.width-paddleWidth) /2;

        // ** Keyboard
        // the default value for both is false because at the beginning the control buttons are not pressed. 
        var rightPressed = false;
        var leftPressed = false;

        // ** Bricks
        var brickRowCount = 5
        var brickColumnCount = 5;
        var brickWidth = 120;
        var brickHeight = 20;
        var brickPadding = 10;
        var brickOffsetTop = 30;
        var brickOffsetLeft = 30;

        // initialize the bricks
        var bricks = [];
        for(var c=0; c<brickColumnCount; c++) {
            bricks[c] = [];
            for(var r=0; r<brickRowCount; r++) {
                bricks[c][r] = { x: 0, y: 0, status: 1 };
            }
        }
                    
        // ** Score + lives
        var score = 0;
        var scorePerHit = 10;
        var lives = 3;
        var scoreStyle = "16px Tomorrow";
        var xScore = 8;
        var yScore = 20;


        // **************** Event listeners : keyboard + mouse ****************

        document.addEventListener("keydown", app.keyDownHandler, false);
        document.addEventListener("keyup", app.keyUpHandler, false);
        document.addEventListener("mousemove", app.mouseMoveHandler, false);        

        // **************** Main function : controls all the rest ****************
        
        app.draw();
            
</script>
  
        

