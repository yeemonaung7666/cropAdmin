<?php
require '../init.php';

if(isset($_SESSION['admin'])){
}

if($_SERVER['REQUEST_METHOD'] =='POST'){
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$password = $_REQUEST['password'];
	//$hash_password = password_hash($password,PASSWORD_BCRYPT);
	$length_phone = countDigits($phone)+1;
	$string_phone = (string)$phone;
	$start2digit_phone =substr($string_phone, 0,2);
	$admin = getAll("select email from login");
	$emailArr=[];
	foreach($admin as $k=>$v){
		foreach($v as $tbl_email){
			array_push($emailArr, $tbl_email);
		}
	}

	if(array_search($email,$emailArr)){
		setError("Email already exists!");
	}
	else{
		if($start2digit_phone == '09'){
			if($length_phone == 11){
				$query = query("insert into login (name, email, phoneNumber, password) values (?,?,?,?)",[$name,$email,$phone,$password]);
				print_r($query);
				if($query){
					go("http://localhost:100/cropAdmin/english/create_acc.php?createAccount=success");
				}
			}else{
				setError("Phone Number must have 11 digits");
			}
			
		}else{
			setError("Phone Number must start '09' ");
			
		}
		
	}
		
}

if(isset($_GET['createAccount'])){
	setMessage("Successfully Create Account! ");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<!--bootstrap cdn link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>

        
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

	* {
	box-sizing: border-box;
	}

	body {
	background: url(../images/green4.jpg);
	background-repeat: no-repeat;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	height: 100vh;
	position: relative;
	object-fit: cover;
	object-position: 100% 100%;
	}

	.title{
		display: flex;
		width: 1200px;
		height: 140px;
		background-color: #fff;
		border-radius: 10px;
		margin-bottom: 60px;
		box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	}

	.title img{
		width:150px;
		height: 100px;
		margin: 20px;
	}

	.title h1{
		padding-top: 40px;
		color:  rgb(0,102,0);
		font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
		font-size: 2rem;
		font-weight: 300;
		text-align: center;
		text-transform: uppercase;
	}

	h1 {
		font-weight: bold;
		margin: 0;
	}

	h2 {
	text-align: center;
	}

	button {
	border-radius: 20px;
	border: 2px solid rgb(0,145,80);
	background-color: rgb(168,228,160);
	color: black;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	margin-bottom: 10px;
	margin-top: 10px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	}

	button:active {
	transform: scale(0.95);
	}

	button:focus {
	outline: none;
	}

	form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
	}

	input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
	}

	.container {
	background-color: #fff;
	border-radius: 10px;
	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 770px;
	max-width: 100%;
	min-height: 530px;
	
	}

	.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
	}

	.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
	}

	.sign-in-container a{
		text-decoration: none;
	}

	.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
	}

	.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right,   yellow,   green);
	background: linear-gradient(to right,   yellow, green);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
	
	}

	.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	}

	.overlay-right {
	right: 0;

	}


</style>
</head>


<body>
    
<!-- Forgot Password Form -->

<div class="title">
    <img src="<?php echo $root;?>images/Capture-1.PNG" class="myanmar" alt="">
    <h1>A Statistical Reporting System for Cultivation And Production of Crops in Ayeyarwaddy Division</h1>
    <img src="<?php echo $root;?>images/Capture.PNG" class="moali" alt="">
</div>
	
<div class="container" id="container">
	
	<div class="form-container sign-in-container">
	
	<form action="" method="post">
		
			<h1>Create New Account</h1>
			<?php
			showMessage();
			showError();
			?>
			<input type="name" name="name" placeholder="Name" required/>
			<input type="email" name="email" placeholder="Email" required/>
			<input type="number" name="phone" placeholder="Phone Number" required/>
			<input type="password" name="password" placeholder="Password" required/>			
			<button type="submit">Create Account</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Have A Nice Day!</h1>	
			</div>
		</div>
	</div>
</div>


</body>
</html>

