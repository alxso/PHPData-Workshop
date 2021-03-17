<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<h1>Application</h1>
<br>* Mandatory to fill.
<form name="form" action="lab5part1.php" method="POST">
<br><label for="fname">First name: *</label><br>
<input type="text" id="fname" name="fname" placeholder="Your First Name" required><br>
<label for="mname">Middle name:</label><br>
<input type="text" id="mname" name="mname" placeholder="Your Middle Name" ><br>
<label for="lname">Last name: *</label><br>
<input type="text" id="lname" name="lname" placeholder="Your Last Name" required><br>
<label for="sal"> Salutation: </label><br>
<select name="sal">
  <option>None</option>
  <option>Mr.</option>
  <option>Ms.</option>
  <option>Mrs.</option>
  <option>Prof.</option>
  <option>MSc.</option>
  <option>PhD.</option>
</select><br>
<label for="age">Age: *</label><br>
<input type="number" size="4" name="age" min="18" max="150" required><br>
<label for="email">Enter your email: *</label><br>
<input type="email" id="email" name="email" placeholder="e.g. issoys@ttu.ee" required><br>
<label for="phone">Contact phone:</label><br>
<input type="tel" id="phone" name="phone" placeholder="e.g. 372-5390-9999" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}"><br>
<label for="arrival">Arrival Date: *</label><br>
<input type="date" id="arrival" name="arrival" required><br><br>
<input type="submit" name="submitbutton" value="submit">
</form><br>

<?php
if($_POST){
$fname=@$_POST['fname'];
$mname=@$_POST['mname'];
$lname=@$_POST['lname'];
$sal=@$_POST['sal'];
$age=@$_POST['age'];
$email=@$_POST['email'];
$phone=@$_POST['phone'];
$arrival=@$_POST['arrival'];

if (
($age >= 18 ? true : false)
and (strtotime($arrival) ? true : false) and (explode("/",$arrival)[0]<=2099 ? true : false)
and (preg_match("/^[- '\p{L}]+$/u", $fname)==1 ? true : false)
and ($mname!="" ? (preg_match("/^[- '\p{L}]+$/u", $mname)==1 ? true : false) : true)
and (preg_match("/^[- '\p{L}]+$/u", $lname)==1 ? true : false)
){

	$data= array($fname,$mname,$lname,$sal,$age,$email,$phone,$arrival);
	$fp = fopen('registration.csv', 'a+');
	fputcsv($fp, $data);
	fclose($fp);
	$counter = file_get_contents("counter.txt");
	file_put_contents("counter.txt", $counter+1);
	print(nl2br("Application successfully saved! \n"));

foreach($data as $key => $value)
{
  	if ($value != "") echo nl2br("\n $value");
}
}

else {
	print ("Enter the parameters correctly");

}

}?>


</body>
</html>
