<html>
<head>
<title>javascript</title>
</head>
<meta charset="UTF-8">

<body>
	
<h1 style="border:2px solid Tomato">Few steps close to get your FREE Cup of Coffee &#128526</h1>
		
	<button onclick="myFunction()">Click Me!</button>

	<p id="demo1"></p>
	<p id="demo2"></p>

	<p id="demo"></p>


	<p style="font-size:xx-large">Looking for partner to get free coffee at cafecoffee?! &#128525</p>
	<button onclick="myFunction2()">click to proceed</button>
	<p id="demo3"></p>

	
	<p><b>Assuming that you accept my terms and condition!</b></p>

<button type="button" onclick="myFunction1()">click to get confirmation!</button>

<p><b>Enter your information</b></p>
<form action="false.php" method="POST" enctype="multipart/form-data">
	<label for="fname">First name:</label><br>
	<input type="text" id="fname" name="fname" required><br>
	<label for="lname">Last name:</label><br>
	<input type="text" id="lname" name="lname" required><br><br>
	<label for="email">Email:</label><br>
	<input type="email" id="email" name="email" required><br>
    <input type="file" name="file"><br>
	<input type="submit" name="insert" >
</form> 

<script type="text/javascript">

function myFunction()
 {
  document.getElementById("demo1").innerHTML = "Hey customer!";
  document.getElementById("demo2").innerHTML = "How are you?";
}

function myFunction1()
	 {
  document.getElementById("demo").innerHTML = "CONGRATULATIONS!!! YOU ARE MY DATE ";
	}	
	function myFunction2()
	 {
  var str = "Terms and Conditions";
  var result = str.link("http://localhost/pattern/js2.html");
  document.getElementById("demo3").innerHTML = result;
	}


	


</script>

</pre>
</body>
</html>

