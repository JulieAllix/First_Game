<?php
    require 'templates/header.tpl.php';
    require 'templates/header-2.tpl.php';
?>

    <script>

            // **************** Variables necessary for the game ****************
            
                    // ** Colors
                    elementsColor = '#F9F7E8';
            
                    // ** Canvas
                    var canvas = document.getElementById("myCanvas");
                    var ctx = canvas.getContext("2d");
                    var x = canvas.width/2;
                    var y = canvas.height-30;
                    
            
                    // ** Ball
                    var ballRadius = 30;
                    var randomColor = elementsColor;
                    var ballSpeedAfterHittingPaddle = 1;
                    // enable the ball movement
                    var dx = -3;
                    var dy = -1;
            
                    // ** Paddle
                    var paddleHeight = 15;
                    var paddleWidth = 450;
                    var paddleSpeed = 15;
                    // starting point of the paddle on the X axis
                    var paddleX = (canvas.width-paddleWidth) /2;
            
                    // ** Keyboard
                    // the default value for both is false because at the beginning the control buttons are not pressed. 
                    var rightPressed = false;
                    var leftPressed = false;
            
                    // ** Bricks
                    var brickRowCount = 2
                    var brickColumnCount = 5;
                    var brickWidth = 120;
                    var brickHeight = 20;
                    var brickPadding = 10;
                    var brickOffsetTop = 30;
                    var brickOffsetLeft = 30;
            
                    // ** Score + lives
                    var score = 0;
                    var scorePerHit = 10;
                    var lives = 3;
            
                    // initialize the bricks
                    var bricks = [];
                    for(var c=0; c<brickColumnCount; c++) {
                        bricks[c] = [];
                        for(var r=0; r<brickRowCount; r++) {
                            bricks[c][r] = { x: 0, y: 0, status: 1 };
                        }
                    }
            
                    // **************** Event listeners : keyboard + mouse ****************
            
                    document.addEventListener("keydown", app.keyDownHandler, false);
                    document.addEventListener("keyup", app.keyUpHandler, false);
                    document.addEventListener("mousemove", app.mouseMoveHandler, false);         

                    // **************** Main function : controls all the rest ****************
                    
                    app.draw();
            
    </script>
        