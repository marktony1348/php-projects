<!DOCTYPE html>
<html>
  <head>
    <title>Bouncing Ball</title>
    <style>
      canvas {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <canvas id="canvas" width="400" height="400"></canvas>
    <script>
      // Initialize variables
      var x = 200;
      var y = 200;
      var xSpeed = 1;
      var ySpeed = 1;
      var BALL_DIAMETER = 20;
      var isRunning = true;
      var isPaused = false; 

      // Get canvas context
      var canvas = document.getElementById("canvas");
      var ctx = canvas.getContext("2d");

      // Add event listeners for key presses
      document.addEventListener("keydown", function(event) {
        if (event.code === "Space") {
          toggleAnimation();
          togglePause();
        } 
      });

      // Toggle animation state
      function toggleAnimation() {
        isRunning = !isRunning;
      }

      // Toggle pause state
      function togglePause() {
        isPaused = !isPaused;
      }

      // Main loop
      function gameLoop() {
        if (isRunning && !isPaused) {
          move();
          draw();
        }
        setTimeout(gameLoop, 10);
      }

      // Move the ball
      function move() {
        x += xSpeed;
        y += ySpeed;

        if (x + xSpeed < 0 || x + BALL_DIAMETER + xSpeed > canvas.width) {
          xSpeed = -xSpeed;
        }
        if (y + ySpeed < 0 || y + BALL_DIAMETER + ySpeed > canvas.height) {
          ySpeed = -ySpeed;
        }
      }

      // Draw the ball
      function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "blue";
        ctx.beginPath();
        ctx.arc(x, y, BALL_DIAMETER/2, 0, 2*Math.PI);
        ctx.fill();
      }

      // Start the game loop
      gameLoop();
    </script>
  </body>
</html>
