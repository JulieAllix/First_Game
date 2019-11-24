var app = {

    // xxx Event listeners subfunctions xxx

    mouseMoveHandler: function(e){
        // e.clientX = horizontal mouse position in the viewport
        // canvas.offsetLeft = distance between the left edge of the canvas and left edge of the viewport
        // relativeX = distance between the canvas left edge and the mouse pointer
        var relativeX = e.clientX - canvas.offsetLeft;

        /*If the relative X pointer position is greater than zero and lower than the Canvas width, the pointer is within the Canvas boundaries*/
        if(relativeX > 0 && relativeX < canvas.width) {
            // paddleX = position of the paddle (anchored on the left edge of the paddle)
            paddleX = relativeX - paddleWidth/2;
        }
    },

    keyDownHandler: function(e){
        if(e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = true;
        }
        else if(e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = true;
        }
    },

    keyUpHandler: function(e){
        if(e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = false;
        }
        else if(e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = false;
        }
    },

    // xxxxxxxxxx Draw subfunctions xxxxxxxxxxxxx

    drawBricks: function() {
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
                ctx.fillStyle = elementsColor;
                ctx.fill();
                ctx.closePath();
                }
            }
        }
    },

    drawBall: function(color) {
        ctx.beginPath();
        ctx.arc(x, y, ballSize, 0, Math.PI*2);
        ctx.fillStyle = color;
        ctx.fill();
        ctx.closePath();
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
    },

    drawPaddle: function() {
        ctx.beginPath();
        ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        ctx.fillStyle = elementsColor;
        ctx.fill();
        ctx.closePath();
    },

    drawScore: function() {
        ctx.font = "16px Arial";
        ctx.fillStyle = elementsColor;
        ctx.fillText("Score: "+score, 8, 20);
    },

    drawLives: function() {
        ctx.font = "16px Arial";
        ctx.fillStyle = elementsColor;
        ctx.fillText("Lives: "+lives, canvas.width-65, 20);
    },

    // xxxxxxxxxx Collisions xxxxxxxxxx

    collisionDetection: function() {
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
                    randomColor = app.getRandomColor();
                    score = score + scorePerHit;
                    /* if all available points have been collected, we will display a winning message */
                        if(score == brickRowCount*brickColumnCount*scorePerHit) {
                            alert("YOU WIN, CONGRATULATIONS! Total points : " + score);
                            document.location.reload();
                        }
                    }
                }
            }
        }
    },
    
    // xxxxxxxxxx Random colors xxxxxxxxxx

    getRandomColor: function() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    },

    // **************** Draw function ****************

    draw: function() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        app.drawBricks();
        app.drawBall(randomColor);
        app.drawPaddle();
        app.drawScore();
        app.drawLives();
        app.collisionDetection();
        
        x += dx;
        y += dy;
    
        if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
            dx = -dx;
            randomColor = app.getRandomColor();
        };
    
        if(y + dy < ballRadius) {
            dy = -dy;
            randomColor = app.getRandomColor();
        } else if(y + dy > canvas.height-ballRadius) {
            if(x > paddleX && x < paddleX + paddleWidth) {
                dy = -dy * 1.1;
            }
            else {
                lives--;
                if(!lives) {
                    alert("GAME OVER");
                    document.location.reload();
                }
                else {
                    x = canvas.width/2;
                    y = canvas.height-30;
                    dx = 2;
                    dy = -2;
                    paddleX = (canvas.width-paddleWidth)/2;
                }
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
    // Restart the game
    requestAnimationFrame(app.draw);
    }

};

document.addEventListener('DOMContentLoaded', app.draw);






