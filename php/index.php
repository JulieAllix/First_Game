<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Casse-moi tout là-dedans !</title>
    <style>
    	* { padding: 0; margin: 0; }
    	canvas { background: #eee; display: block; margin: 0 auto; }
    </style>
    <!--<link rel="stylesheet" href="../css/style.css">-->
</head>
<body>
    <canvas id="myCanvas" width="480" height="320"></canvas>

    <script>
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var x = canvas.width/2;
        var y = canvas.height-30;
        var dx = -3;
        var dy = -1;
        var ballRadius = 10;
        var randomColor = "#0095DD";
        var paddleHeight = 15;
        var paddleWidth = 150;
        var paddleX = (canvas.width-paddleWidth) / 2;
        var rightPressed = false;
        var leftPressed = false;
        var brickRowCount = 1;
        var brickColumnCount = 5;
        var brickWidth = 75;
        var brickHeight = 20;
        var brickPadding = 10;
        var brickOffsetTop = 30;
        var brickOffsetLeft = 30;
        var score = 0;
        var scorePerHit = 10;

        // initialize the bricks
        var bricks = [];
        for(var c=0; c<brickColumnCount; c++) {
            bricks[c] = [];
            for(var r=0; r<brickRowCount; r++) {
                bricks[c][r] = { x: 0, y: 0, status: 1 };
            }
        }

        document.addEventListener("keydown", keyDownHandler, false);
        document.addEventListener("keyup", keyUpHandler, false);

        function keyDownHandler(e) {
            if(e.key == "Right" || e.key == "ArrowRight") {
                rightPressed = true;
            }
            else if(e.key == "Left" || e.key == "ArrowLeft") {
                leftPressed = true;
            }
        };

        function keyUpHandler(e) {
            if(e.key == "Right" || e.key == "ArrowRight") {
                rightPressed = false;
            }
            else if(e.key == "Left" || e.key == "ArrowLeft") {
                leftPressed = false;
            }
        };

        function collisionDetection() {
            for(var c=0; c<brickColumnCount; c++) {
                for(var r=0; r<brickRowCount; r++) {
                    var b = bricks[c][r];
                    /* if the brick is active (its status is 1) we will check whether the collision happens; if a collision does occur:
                    - we'll change the direction of the ball;
                    - we'll set the status of the given brick to 0 so it won't be painted on the screen;
                    - we'll change the color of the ball;
                    - we'll add 1pt to the score;
                    */
                    if(b.status == 1) {
                        if(x > b.x && x < b.x+brickWidth && y > b.y && y < b.y+brickHeight) {
                        dy = -dy;
                        b.status = 0;
                        randomColor = getRandomColor();
                        score = score + scorePerHit;
                        /* if all available points have been collected, we will display a winning message */
                            if(score == brickRowCount*brickColumnCount*scorePerHit) {
                                alert("YOU WIN, CONGRATULATIONS! Total points : " + score);
                                document.location.reload();
                                clearInterval(interval); // Needed for Chrome to end game
                            }
                        }
                    }
                }
            }
        };

        function drawBall(color) {
            ctx.beginPath();
            ctx.arc(x, y, 10, 0, Math.PI*2);
            ctx.fillStyle = color;
            ctx.fill();
            ctx.closePath();
            ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        };

        function drawPaddle() {
            ctx.beginPath();
            ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
            ctx.fillStyle = "#0095DD";
            ctx.fill();
            ctx.closePath();
        };

        function drawBricks() {
            for(var c=0; c<brickColumnCount; c++) {
                for(var r=0; r<brickRowCount; r++) {
                    // if status is 1, then draw the brick, but if it's 0, then it was hit by the ball and we don't want it on the screen anymore
                    if(bricks[c][r].status == 1) {
                    var brickX = (c*(brickWidth+brickPadding))+brickOffsetLeft;
                    var brickY = (r*(brickHeight+brickPadding))+brickOffsetTop;
                    bricks[c][r].x = brickX;
                    bricks[c][r].y = brickY;
                    ctx.beginPath();
                    ctx.rect(brickX, brickY, brickWidth, brickHeight);
                    ctx.fillStyle = "#0095DD";
                    ctx.fill();
                    ctx.closePath();
                    }
                }
            }
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            drawBricks();
            drawBall(randomColor);
            drawPaddle();
            drawScore();
            collisionDetection();
            
            x += dx;
            y += dy;

            if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
                dx = -dx;
                randomColor = getRandomColor();
            };

            if(y + dy < ballRadius) {
                dy = -dy;
                randomColor = getRandomColor();
            } else if(y + dy > canvas.height-ballRadius) {
                if(x > paddleX && x < paddleX + paddleWidth) {
                    dy = -dy * 1.1;
                }
                else {
                    alert("GAME OVER");
                    document.location.reload();
                    clearInterval(interval);
                }
            }

            if(rightPressed) {
                paddleX += 15;
                if (paddleX + paddleWidth > canvas.width){
                    paddleX = canvas.width - paddleWidth;
                }
            }
            else if(leftPressed) {
                paddleX -= 15;
                if (paddleX < 0){
                    paddleX = 0;
                }
            };
        };

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
            };

        function drawScore() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "#0095DD";
            ctx.fillText("Score: "+score, 8, 20);
        }
        
        // The speed of the ball can be changed by changing the timer of the interval
        var interval = setInterval(draw, 15);
    </script>
</body>
</html>