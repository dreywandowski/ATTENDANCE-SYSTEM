<!doctype html>

<head>

	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet"  href="css/jamb.css">

	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/> 

	<title>

		CBT TEST

	</title>

</head>

<body>

    <?php

    require_once 'connect.php';

    ?>


	<!-- show the user what the game is all about. This message will

	 dissapear after the user clicks ok-->
<div id="initial">
	<p><center>  Welcome to the e-exam portal of the institution.<br>
	Kindly provide your login details obtained and start on to proceed</center></p>
</div>



<form id="begin" method="POST" action="validate_details.php">

	<label for="Surname"> Username:</label>

		<input type="text" id="name" name="username"  minlength="8" required><br><br>

		<label for =  "JAMB no">Password:</label>

			<input type="password" id="number" name="password" minlength="8" required><br>

		<input type="submit" value="Start Test" name="login" id= 'game'>

</form>


<p id="ajax"><center></center></p>



	<form id="formOne" class="hidden" method="POST">

		<!-- Number 1 Question-->

		<h4> 1. One of the most effective methods of soil conservation is: </h4>

			<input type="radio" id="a" name="answer" value="cover cropping" ><h5>cover cropping</h5>

             <input type="radio" id="b" name="answer" value="shifting cultivation" ><h5>shifting cultivation</h5>

             <input type="radio" id="c" name="answer" value="extensive cultivation"><h5>extensive cultivation</h5>

             <input type="radio" id="d" name="answer" value="bush fallowing"><h5>bush fallowing</h5>

             <br>

         <input type="button" id="firstNext" class="next" value="Next" name="Next Question">

</form>

          <form id="formTwo" class="hidden">

             <!-- Number 2 Question-->

		<h4> 2.The most important agent that modifies a coastline is : </h4>

			<input type="radio" id="e" value="fog" name="answer1"><h5>fog</h5>

             <input type="radio" id="f" value="tide" name="answer1"><h5>tide</h5>

             <input type="radio" id="g" value="wave" name="answer1"><h5>wave</h5>

             <input type="radio" id="h" value="wind" name="answer1"><h5>wind</h5>

		<br>

		<input type="button" id="firstPrev" class="prev" value="Previous" name="Prev Question">

		<input type="button" id="secondNext" class="next" value="Next" name="Next Question">

		</form>



        <form id="formThree" class="hidden">

		     <!-- Number 3 Question-->

		<h4> 3. Volcanic activities are usually associated with: </h4>

			<input type="radio" id="i" value="deltas" name="answer2"><h5>deltas</h5>

             <input type="radio" id="j" value="fold mountains" name="answer2"><h5>fold mountains</h5>

             <input type="radio" id="k" value="scarp slopes" name="answer2"><h5>scarp slopes</h5>

             <input type="radio" id="l" value="peneplains" name="answer2"><h5>peneplains</h5>

             <br>

			<input type="button" id="secondPrev" class="prev" value="Previous" name="Prev Question">

		    <input type="button" id="thirdNext" class="next" value="Next" name="Next Question">

	</form>



	<form id="formFour" class="hidden">

		     <!-- Number 4 Question-->

		<h4> 4.Lines drawn on maps to join places having the same sunshine are called: </h4>

			<input type="radio" id="m" value="isohels" name="answer3"><h5>isohels</h5>

             <input type="radio" id="n" value="isonerps" name="answer3"><h5>isonerps</h5>

             <input type="radio" id="o" value="isotherms" name="answer3"><h5>isotherms</h5>

             <input type="radio" id="p"  value="isoyets" name="answer3"><h5>isoyets</h5>

		<br>	

		<input type="button" id="thirdPrev" class="prev" value="Previous" name="Prev Question">

		<input type="button" id="fourthNext" class="next" value="Next" name="Next Question">

	

     </form>



          <form id="finalForm" class="hidden">

		     <!-- Number 5 Question-->

		<h4> 5. Crater lakes are usually associated with areas that have: </h4>

			<input type="radio" id="q" value="drought" name="answer4"><h5>drought</h5>

             <input type="radio" id="r" value="deforestation" name="answer4"><h5>deforestation</h5>

             <input type="radio" id="s"  value="pollution" name="answer4"><h5>pollution</h5>

             <input type="radio" id="t"  value="flooding" name="answer4"><h5>flooding</h5>

		<br>

		<input type="button" id= "finalPrev" class="prev" value="Previous" name="Prev Question">

		

</form>

		<button id="final" type="submit" class="hidden"> Finish Test</button>

		<h3 class="hidden" id="final_text"> You have finished the test.<br> Click <a href="jamb.php" target="_self"> here </a> to go home. Thank you.

		</h3>

	

<script type="text/javascript" src="js/jquery-3.2.1.js"></script>



<script src="js/jambajax.js"></script>





</body>

</html>