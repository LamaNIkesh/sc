<?php
include("head.html")
?>
<?php
$flag=0;
if (file_exists ("Libraries/database.txt")){
$data= file("Libraries/database.txt");
for ($line = 0; $line < count($data); ++$line){
	$userData=explode(" ",$data[$line]);
	if ($userData[3]=="1"){
		$flag=1;
		$userLogged=$userData[0];
		$email=$userData[2];
		$val=strval(intval($userData[4]));
		$simNum=trim(preg_replace('/\s\s+/', ' ', $val));
	}
}
}
if ($flag==1){
	?>
	
	<p> Your user name is: <?php echo $userLogged; ?>.<br>
	Your registered email is: <?php echo $email; ?>.<br>
	You are currently working on simulation number: <?php echo $simNum; ?>.</p>

	<p> In this page the user should be able to access his account and manage his/her data (username, password and email) and initialisation files.<br> 
	The user should also be able to delete files, download files and reset the counter for the files.</p><br><br>
	<?php
}
else{
	?>
	<p>You need to log in to see this page:</p>
	<form action="login.php" method="post">
	<input type="submit" value="Log in">
	</form>
	<br><br>
<?php
}
?>
<?php
include("end_page.html")
?>