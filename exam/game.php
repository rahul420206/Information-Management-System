<!DOCTYPE html>
<html>
<head>
	<title>Dice Game</title>
</head>
<body>
<h1><b>Dice Game</b></h1>
<style>
h1{
    text-align: center;
}
</style>
</body>
<body>
	<div class="container">
		<div class="player-box1">
			<h2>Player 1</h2>
			<p>Name: <span id="player1-name">Player 1</span></p>
			<p>Score: <span id="player1-score">0</span></p>
			<p>Rank: <span id="player1-rank">1</span></p>
		</div>
		<div class="dice-box1">
			<h1>Dice Game</h1>
			<button id="roll-btn1">Roll Dice</button>
			<p id="dice-result"></p>
            <span id="score1Display"></span><br>
		</div>
        <div class="dice-box2">
			<h1>Dice Game</h1>
			<button id="roll-btn2">Roll Dice</button>
			<p id="dice-result"></p>
		    <span id="score2Display"></span><br>
		</div>
		<div class="player-box2">
			<h2>Player 2</h2>
			<p>Name: <span id="player2-name">Player 2</span></p>
			<p>Score: <span id="player2-score">0</span></p>
			<p>Rank: <span id="player2-rank">2</span></p>
		</div>
	</div>
</body>
</html>
<style>
body {
	margin: 0;
	padding: 0;
	background-color: #f2f2f2;
	font-family: Arial, sans-serif;
}
.container {
	max-width: 1200px;
	margin: 0 auto;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	padding: 50px;
}
.player-box1 {
	background-color: #fff;
	padding: 20px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	text-align: center;
}
.player-box2 {
	background-color: #fff;
	padding: 20px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	text-align: center;
}

.player-box h2 {
	margin-top: 0;
}
.dice-box1 {
	background-color: #fff;
	padding: 50px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	text-align: center;
}
.dice-box2 {
	background-color: #fff;
	padding: 50px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	text-align: center;
}
.dice-box h1 {
	margin-top: 0;
}
#dice-result {
	font-size: 24px;
	margin-top: 20px;
}
.player-box p {
	margin-bottom: 10px;
}
.player-box span {
	font-weight: bold;
}
</style>
<script>
var player1Score=0;
var player2Score=0;
var rollBtn1=document.getElementById("roll-btn1");
var rollBtn2=document.getElementById("roll-btn2");
var score1Display=document.getElementById("score1Display");
var score2Display=document.getElementById("score2Display");
function generateScore() {
  return Math.floor(1 + Math.random() * 6);
}
function updateScore1(score) {
  player1Score += score;
  score1Display.innerHTML = "You Got: " + score + "<br>Score: " + player1Score;
  if (player1Score >= 100) {
    alert("Player 1 Wins!");
    rollBtn1.disabled = true;
    rollBtn2.disabled = true;
  }
}
function updateScore2(score) {
  player2Score += score;
  score2Display.innerHTML = "You Got: " + score + "<br>Score: " + player2Score;
  if (player2Score >= 100) {
    alert("Player 2 Wins!");
    rollBtn1.disabled = true;
    rollBtn2.disabled = true;
  }
}
rollBtn1.addEventListener("click", function() {
  var score = generateScore();
  updateScore1(score);
});
rollBtn2.addEventListener("click", function() {
  var score = generateScore();
  updateScore2(score);
});
</script>

