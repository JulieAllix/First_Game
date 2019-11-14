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
        var paddleWidth = 80;
        var paddleX = (canvas.width-paddleWidth) / 2;
        var rightPressed = false;
        var leftPressed = false;

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

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            drawBall(randomColor);
            drawPaddle();
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
                paddleX += 20;
                if (paddleX + paddleWidth > canvas.width){
                    paddleX = canvas.width - paddleWidth;
                }
            }
            else if(leftPressed) {
                paddleX -= 20;
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

        var interval = setInterval(draw, 10);
    </script>
</body>
</html>