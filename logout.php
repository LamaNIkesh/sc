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
	}
}
if ($flag==1){
$file = fopen("Libraries/database.txt","w");	
for ($line = 0; $line < count($data); ++$line){
	$userData=explode(" ",$data[$line]);
	if ($userData[0] == $userLogged) {
		$userData[3]="0";
		$newline=implode(" ",$userData);
		fwrite($file,$newline);
		?><p>User logged out.</p><?php
	}
	else{
		fwrite($file,$data[$line]);
	}
}
fclose($file);
}
else{
	?><p>User already logged out.</p><?php
}
}
else{
	?><p>No user registered.</p><?php
}
?>


<?php
include("end_page.html")
?>