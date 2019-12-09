var app = {

    // xxx Event listeners subfunctions xxx

    mouseMoveHandler: function(e){
        // e.clientX = horizontal mouse position in the viewport
        // canvas.offsetLeft = distance between the left edge of the canvas and left edge of the viewport
        // relativeX = distance between the canvas left edge and the mouse pointer
        var relativeX = e.clientX - canvas.offsetLeft;
        // if the relative X pointer position is greater than half the paddle width and lower than the Canvas width minus half the paddle width, the pointer is within the Canvas boundaries
        if(relativeX > paddleWidth/2 && relativeX < canvas.width - paddleWidth/2) {
            paddleX = relativeX - paddleWidth/2;
        }else if(relativeX <= paddleWidth){
            paddleX = 0;
        }else if(relativeX >= canvas.width - paddleWidth){
            paddleX = canvas.width - paddleWidth;
        }
    },

    // define what happens when the keys are pressed
    keyDownHandler: function(e){
        if(e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = true;
        }
        else if(e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = true;
        }
    },

    // define what happens when the keys stop being pressed
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
        // loop through all the bricks in the array and draw them on the screen
        for(var c=0; c<brickColumnCount; c++) {
            for(var r=0; r<brickRowCount; r++) {
                // if status is 1, then draw the brick, but if it's 0, then it was hit by the ball and we don't want it on the screen anymore
                if(bricks[c][r].status == 1) {
                var brickX = (c*(brickWidth+brickPadding))+brickOffsetLeft;
                var brickY = (r*(brickHeight+brickPadding))+brickOffsetTop;
                bricks[c][r].x = brickX;
                bricks[c][r].y = brickY;
                // beginPath enables to start a new path on the canvas and closePath is closing it
                ctx.beginPath();
                // define the rectangle
                ctx.rect(brickX, brickY, brickWidth, brickHeight);
                // enables to paint the rectangle
                ctx.fillStyle = elementsColor;
                ctx.fill();
                ctx.closePath();
                }
            }
        }
    },

    drawBall: function(color) {
        ctx.beginPath();
        // 5 parameters: x and y coordinates of the arc's center, arc radius, start and end angle
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        ctx.fillStyle = color;
        ctx.fill();
        ctx.closePath();
    },

    drawPaddle: function() {
        ctx.beginPath();
        ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        ctx.fillStyle = elementsColor;
        ctx.fill();
        ctx.closePath();
    },

    drawScore: function() {
        ctx.font = scoreStyle;
        ctx.fillStyle = elementsColor;
        // three parameters : text, coordinates where the text will be placed on the canvas
        ctx.fillText("Score: "+score, xScore, yScore);
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
                - we'll add points to the score;
                */
                if(b.status == 1) {
                    if(x > b.x && x < b.x+brickWidth && y > b.y && y < b.y+brickHeight) {
                    dy = -dy;
                    b.status = 0;
                    randomColor = app.getRandomColor();
                    score = score + scorePerHit;
                    /* if all available points have been collected, we will display a winning message */
                        if(score == brickRowCount*brickColumnCount*scorePerHit) {
                            appGen.setCookie('score', score, 1);
                            alert("YOU WIN, CONGRATULATIONS! Total points : " + score);
                            // we set cookies in order to transmit the js score variable to php (to transmit it to the DB afterwards)
                            // there are three parameters : name of the cookie, value of the cookie, number of days until the cookie should expire
                            window.location.reload();
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
        // clear canvas content
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        app.drawBricks();
        app.drawBall(randomColor);
        app.drawPaddle();
        app.drawScore();
        app.drawLives();
        app.collisionDetection();
        
        // update x and y with our dx and dy variable on every frame, so the ball will be painted in the new position on every update
        x += dx;
        y += dy;
    
        // when the distance between the center of the ball and the edge of the wall is exactly the same as the radius of the ball, it will change the movement direction + give a new random color to the ball.
        if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
            dx = -dx;
            randomColor = app.getRandomColor();
        };
    
        if(y + dy < ballRadius) {
            dy = -dy;
            randomColor = app.getRandomColor();
        } else if(y + dy > canvas.height-ballRadius) {
            // collision detection between the ball and the paddle, so it can bounce off it and get back into the play area
            if(x > paddleX && x < paddleX + paddleWidth) {
                dy = -dy * ballSpeedAfterHittingPaddle;
            }
            else {
                lives--;
                if(!lives) {
                    appGen.setCookie('score', score, 1);
                   
                    alert("GAME OVER. Total points : " + score);
                    window.location.reload();
                }
                // if there are still some lives left, then the position of the ball and the paddle are reset, along with the movement of the ball
                else {
                    x = canvas.width/2;
                    y = canvas.height-30;
                    dx = initialDx;
                    dy = initialDy;
                    paddleX = (canvas.width-paddleWidth)/2;
                }
            }
        }
        
        // define the movement of the paddle (with speed) when the keys are pressed
        if(rightPressed) {
            paddleX += paddleSpeed;
            // move the paddle only within the boundaries of the canvas
            if (paddleX + paddleWidth > canvas.width){
                paddleX = canvas.width - paddleWidth;
            }
        }
        else if(leftPressed) {
            paddleX -= paddleSpeed;
            if (paddleX < 0){
                paddleX = 0;
            }
        };
    // Restart the game
    requestAnimationFrame(app.draw);
    }

};
// the draw() function is getting executed again and again within a requestAnimationFrame() loop, but instead of a fixed frame rate, we are giving control of the framerate back to the browser. It will sync the framerate accordingly and render the shapes only when needed. This produces a more efficient, smoother animation loop than the setInterval() method.
document.addEventListener('DOMContentLoaded', app.draw);







