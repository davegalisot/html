
window.onload = function() {
    //Inicialización de variables
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var ballRadius = 10;
    var maxWidth = canvas.width-ballRadius;
    var min = ballRadius;
    var maxHeight = canvas.height-ballRadius;
    var x = Math.floor(Math.random() * (maxWidth - min)) + min;
    var y = Math.floor(Math.random() * (maxHeight - min)) + min;
    var speedX = 2;
    var speedY = -2;
    var paddleHeight = 10;
    var paddleWidth = 75;
    var paddleX = (canvas.width-paddleWidth)/2;
    var rightPressed = false;
    var leftPressed = false;
    var contador = 0;

    var mostrarX = document.getElementById("mostrarX");
    var mostrarY = document.getElementById("mostrarY");
    var mostrarDX = document.getElementById("mostrarDX");
    var mostrarDY = document.getElementById("mostrarDY");

    //Asigna los eventlistener a las teclas
    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);

    //Controla cuando se pulsa una tecla
    function keyDownHandler(e) {
        if(e.keyCode === 39) {
            rightPressed = true;
        }
        else if(e.keyCode === 37) {
            leftPressed = true;
        }
    }

    //Controla cuando se levanta una tecla
    function keyUpHandler(e) {
        if(e.keyCode === 39) {
            rightPressed = false;
        }
        else if(e.keyCode === 37) {
            leftPressed = false;
        }
    }

    //dibuja la bola
    function drawBall() {
        ctx.beginPath();
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        ctx.fillStyle = "#0095DD";
        ctx.fill();
        ctx.closePath();
    }

    //dibuja la raqueta
    function drawPaddle() {
        ctx.beginPath();
        ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        ctx.fillStyle = "#FF8C00";
        ctx.fill();
        ctx.closePath();
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawPaddle();
        drawBall();

        if(x + speedX > canvas.width-ballRadius || x + speedX < ballRadius) {
            speedX = -speedX;
        }
        if(y + speedY < ballRadius) {
            speedY = -speedY;
        }
        else if(y + speedY > canvas.height-ballRadius) {
            if(x > paddleX && x < paddleX + paddleWidth) {
                if(y= y-paddleHeight){
                    speedY = -speedY;
                }
            }
            else {
                document.location.reload();
            }
        }

        if(rightPressed && paddleX < canvas.width-paddleWidth) {
            paddleX += 4;
        }
        else if(leftPressed && paddleX > 0) {
            paddleX -= 4;
        }

        mostrarX.value = x;
        mostrarY.value = y;
        mostrarDX.value = speedX;
        mostrarDY.value = speedY;

        x += speedX;
        y += speedY;

    }

    setInterval(draw,10);
};


