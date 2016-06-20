<?php



$html = home_page();
print $html;

if(isset($_POST['submit'])){
$name =  $_POST['login'];
$pass =  $_POST['password'];


$connect = mysqli_connnection();
if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

$sql ="SELECT username, password FROM users";
$table = $connect->query($sql);

while($row = $table->fetch_assoc()) {
	echo " - Name: " . $row["username"]. " password: " . $row["password"]. "<br>";
}

//if(true) {
	
//	print "Logged In";
//}
//else {
//	print "No match found";
//}

$connect->close();

}

function home_page() {
	
	$pC = "<h2><center>Login Page </center></h2>";
		
	$pC .= "<form id='login_form' method='post' action='#'>
			<p> Username:<br>  <input type='text' name='login' value='' placeholder='Username or Email'> </p>
            <p> Password:<br>  <input type='password' name='password' value='' placeholder='Password'></p>
			
			<input type = 'submit' name = 'submit' value ='Submit' >
			</form>
			
			";	
	
	return $pC;
}

function mysqli_connnection() {
	$servername = "localhost";
	$username = "first_user";
	$password = "first_pass";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	return $conn;
}
  

  