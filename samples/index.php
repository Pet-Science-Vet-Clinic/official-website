<?php 
include 'conn.php';
include('functions.php');
if(isset($_POST['sign'])){
      $teamname = $_POST['teamname'];
      $teamabriviation = $_POST['teamabriviation'];
      $teamgames = $_POST['teamgames'];
      $firstmember = $_POST['firstmember'];
      $secondmember = $_POST['secondmember'];
      $thirdmember = $_POST['thirdmember'];
      $fourthmember = $_POST['fourthmember'];
      $fifthmember = $_POST['fifthmember'];

      $sql = "INSERT INTO registration (teamname,teamabriviation,teamgames,firstmember,secondmember,thirdmember,fourthmember,fifthmember) VALUES ('$teamname','$teamabriviation','$teamgames','$firstmember','$secondmember','$thirdmember','$fourthmember','$fifthmember')";
$query=$conn->query($sql);
      if($query)  
      {
        echo '<script>
alert("Congratulations You are now Registered!");
        </script>';
 header("Refresh:0");
      }
      else
      {
        echo '<script>
alert("Not Inserted!");
        </script>';
         header("Refresh:0");
      }
}
if(isset($_POST['adminlogin_btn'])){
$uname=$_POST['uname'];
$psw =$_POST['psw'];

$sql1="SELECT * FROM admin WHERE username='$uname' AND password='$psw'";
$wewe=$conn->query($sql1);

if(mysqli_num_rows($wewe) > 0){
  echo'<script>
alert("Access Granted");
</script>';
header ("location: adminpage.php");
header("Refresh:0");
}
else{
    echo'<script>
alert("Access Denied");
</script>';
header("Refresh:0");
}
}

if(isset($_POST['register_btn'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $contactno = $_POST['contactno'];
      $birthdate = $_POST['birthdate'];

      $sql = "INSERT INTO members (username,password,firstname,lastname,gender,email,contactno,birthdate) VALUES ('$username','$password','$firstname','$lastname','$gender','$email','$contactno','$birthdate')";
$query=$conn->query($sql);
      if($query)  
      {
        echo '<script>
alert("Congratulations You are now Registered!");
        </script>';
 header("Refresh:0");
      }
      else
      {
        echo '<script>
alert("Not Inserted!");
        </script>';
         header("Refresh:0");
      }
}

  ?>
<!DOCTYPE html>
<html><head><title>Homepage</title></head>
<div class="header">
  <button onclick="document.getElementById('id02').style.display='block'" class = "buttonv" style="width:auto;  margin-right: 5px;">Admin Login</button>
  <button onclick="document.getElementById('id01').style.display='block'" class = "button" style="width:auto; margin-right: 5px;">Login</button>
  <button onclick="document.getElementById('id03').style.display='block'" class = "buttonk" style="width:auto; margin-right: 5px;">Register</button>

  <div id="id02" class="modalv">
  
  <form class="modalv-content animate" action="index.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="controller.png" alt="Avatar" class="avatar">
    </div>

    <div class="containers">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" class ="buttonadmin" name= "adminlogin_btn">Login</button>
    
    </div>

    <div class="containers" style="background-color:#f1f1f1"> 
      
    </div>
    <br><br><br><br>
  </form>
</div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="index.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="memberlogin.png" alt="Avatar" class="avatar">
    </div>

    <div class="containers">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" class="buttonnormal" name= "login_btn">Login</button>
    
    </div>

    <div class="containers" style="background-color:#f1f1f1"> 
      
    </div>
    <br><br><br><br>
  </form>
</div>

<div id="id03" class="modal">
  
  <form class="modalk-content animate" action="index.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="newuser.png" alt="Avatar" class="avatar">
    </div>

    <div class="containers">

      <label for="firstmember"><u><b>FirstName:</b></u></label>
    <input type="text" placeholder="Enter Full name" name="firstname" required>

    <label for="secondmember"><u><b>Lastname:</b></u></label>
    <input type="text" placeholder="Enter Full name" name="lastname" required>

    <label for="thirdmember"><u><b>Username:</b></u></label>
    <input type="text" placeholder="Enter Full name" name="username" required>

    <label for="fourthmember"><u><b>Password:</b></u></label>
    <input type="password" placeholder="Enter Full name" name="password" required>

    <label><b><u>Gender</b></u></br></label>
    <label class='radiolabel'><input type="radio" name="gender" value="male"><b> Male</b></label><br>

    <label class='radiolabel'><input type="radio" name="gender" value="female"><b> Female</label></b><br><br>

    <label for="fifthmember"><u><b>Email:</b></u></label>
    <input type="text" placeholder="Enter Full name" name="email" required>

    <label for="fifthmember"><u><b>Contact Number:</b></u></label>
    <input type="text" placeholder="Enter Full name" name="contactno" required>

    <label for="fifthmember"><u><b>Birthdate:</b></u></label><br>
    <input type="date" placeholder="Enter Full name" name="birthdate" required><br><br>
        
      <button type="submit" class="buttonnormal" name= "register_btn">Register</button>
    
    </div>

    <div class="containers" style="background-color:#f1f1f1"> 
      
    </div>
    <br><br><br><br>
  </form>
</div>
<br><br>
  <h1>Cebu Online Tournament Site</h1>
  <p>View ongoing or coming tournaments in Cebu City.</p>
</div>

<!-- Header style -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.buttonk {
    background-color: orange;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    float: right;
}

.modalk-content {
    background-color: white;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
    color: orange;

}





.buttonv {
    background-color: red;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    float: right;
}
.buttonnormal{
    background-color: dodgerblue;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    float: right;
}
.buttonadmin {
    background-color: red;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    float: right;
}
.modalv {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}
.modalv-content {
    background-color: white;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
    color: red;

}

/*Login and signup*/

/* Set a style for all buttons */


/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.button {
    background-color: #20B2AA;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    float: right;
}

.button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.containers {
    padding: 50px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: white;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
color: dodgerblue;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}


/*Login and signup End*/

* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
}

/* Style the header */
.header {
    padding: 50px;
    background: #696969;
    color: #ADFF2F;
}

/* Increase the font size of the h1 element */
/*Color of the Header*/
.header h1 {
    font-size: 50px;
}
/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Column container */
.row {  
    display: flex;
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    flex: 30%;
    background-color: #000;
    padding: 20px;
    color: white;
}

/* Main column */
.main {   
    flex: 70%;
    background-color: #000;
    padding: 20px;
    color: white;

}

/* Fake image, just for this example */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Set height of body and the document to 100% to enable "full page tabs" */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 50%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 430%;
}
/*News*/
* {
  box-sizing: border-box;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.hides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursors {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.newsrow:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.newscolumn {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
/*News*/

/*Text block*/
/* Bottom right text */
.text-block {
    position: absolute;
    top: 10px;
    right: 10px;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
}
.opa
{
background: rgba(0,0, 0, 0.6) /* Green background with 30% opacity */
}
/* Container holding the image and the text */

#Home {background-color: black;}
#News {background-color: black;}
#Signup {background-color: black;}
#About {background-color: black;}

/* Style each tab content individually */ 
#London {background-color:red;}
#Paris {background-color:green;}
#Tokyo {background-color:blue;}
#Oslo {background-color:orange;}

/*Sign up*/
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.containers {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
/*Sign up end*/
</style>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

<body>

<!-- Login button -->



<!-- Login button -->
<!-- Navigation -->
<!-- <nav class="w3-bar w3-black">
  <a href="#home" class="w3-button w3-bar-item">Tournaments</a>
  <a href="#band" class="w3-button w3-bar-item">Registrations</a>
  <a href="#tour" class="w3-button w3-bar-item">Participants</a>
  <a href="#contact" class="w3-button w3-bar-item">Venue</a>
</nav> -->


<button class="tablink" onclick="openPage('Home', this, 'white')" id="defaultOpen"><font color = "Black">Home</font></button>

<button class="tablink" onclick="openPage('Signup', this, 'white')"><font color = "Black">Sign up</font></button>


<div id="Home" class="tabcontent">
<section>

  <?php
    $servername= "localhost";
    $username= "root";
    $password= "";
    $DatabaseName = "webprog";
    
   $conn = new mysqli($servername, $username, $password,$DatabaseName);

    $query = "select * from tb_images";
    $Result = mysqli_query($conn, $query);

     while($rows = mysqli_fetch_array($Result)){
        $Pic_URL = 'data:image/png;base64,'.base64_encode($rows['Imageblob']);

        echo '<img class="mySlides" src='.$Pic_URL.' style="width:100%">';
     }
  ?>

  <div class="main">
      <h2>On-going tournaments</h2>
      <h1>PlayerUnknown's BattleGrounds</h1>
      <img class="pictures" src="pubgpic.jpg" style="width:100%">
      <p><h3>1 Squad = 4 persons + 1 back up player</h3></p>
      <p><h4>Map: Erangel</h4></p>
      <p><h4>In-game time: Dusk</h4></p>
      <p><h2>Tournament Prize Pool: ₱40,000</h2></p>
      <br>

      <h1>League of Legends</h1>
      <img class="pictures" src="lolpic.jpg" style="width:100%">
      <p><h3>1 team = 5 Players + 1 Back-up player</h3></p>
      <p><h4>Map: Summoner's Rift</h4></p>
      <p><h4>Game mode: Tournament Draft Pick</h4></p>
      <p><h4>Game style: Best of 3</h4></p>
      <p><h2>Tournament Prize Pool: ₱100,000</h2></p>
  </div>
</div>
</section>
</div>



<div id="Signup" class="tabcontent">
 
  <form method = "POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="teamname"><b>Team name</b></label>
    <input type="text" placeholder="Enter Team name" name="teamname" required>

    <label for="teamabriviation"><b>Team Abbreviation</b></label>
    <input type="text" placeholder="Enter Team Abbreviation" name="teamabriviation" required>

  <label><h1>Game to join: </h1></label>
		<select name = "teamgames" required>
      <option value="0">~~SELECT~~</option>
			<option value="PUBG">PUBG</option>
			<option value="League of Legends">League of Legends</option>
			<option value="DOTA 2">DOTA 2</option>
			<option value="Overwatch">Overwatch</option>
			<option value="Tekken 7">Tekken 7</option>
			<option value="CS:GO">CS:GO</option>
			<option value="Fortnite">Fortnite</option>
		</select>
		<br><br><br>

    <label for="firstmember"><b>First Member full name:</b></label>
    <input type="text" placeholder="Enter Full name" name="firstmember" required>

    <label for="secondmember"><b>Second Member full name:</b></label>
    <input type="text" placeholder="Enter Full name" name="secondmember" required>

    <label for="thirdmember"><b>Third Member full name:</b></label>
    <input type="text" placeholder="Enter Full name" name="thirdmember" required>

    <label for="fourthmember"><b>Fourth Member full name:</b></label>
    <input type="text" placeholder="Enter Full name" name="fourthmember" required>

    <label for="fifthmember"><b>Fifth Member full name:</b></label>
    <input type="text" placeholder="Enter Full name" name="fifthmember" required>

    <label>
      
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="sign" id="sign" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</div>

<!-- Slide Show -->


<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
}
</script>
<script>
function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
  </script>
<script>
  var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("hides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</body>
</html>

