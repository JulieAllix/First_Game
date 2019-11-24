<?php
    require 'templates/header.tpl.php';
    require 'templates/link-to-index.tpl.php';
?>

    <script>

            // **************** Variables necessary for the game ****************
            
                    // Colors
                    elementsColor = '#F9F7E8';
            
                    // Canvas
                    var canvas = document.getElementById("myCanvas");
                    var ctx = canvas.getContext("2d");
                    var x = canvas.width/2;
                    var y = canvas.height-30;
                    var dx = -3;
                    var dy = -1;
            
                    // Ball
                    var ballRadius = 10;
                    var randomColor = elementsColor;
                    var ballSize = 30;
            
                    // Paddle
                    var paddleHeight = 15;
                    var paddleWidth = 450;
                    var paddleX = (canvas.width-paddleWidth) /2;
            
                    // Keyboard
                    var rightPressed = false;
                    var leftPressed = false;
            
                    // Bricks
                    var brickRowCount = 2
                    var brickColumnCount = 5;
                    var brickWidth = 120;
                    var brickHeight = 20;
                    var brickPadding = 10;
                    var brickOffsetTop = 30;
                    var brickOffsetLeft = 30;
            
                    // Score + lives
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
        