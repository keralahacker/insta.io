<?php
include 'functions.php';

if(isset($_GET["number"]))
{	
	$user_id = $_GET["number"];
	
	$array = GetArrayFromId($user_id);
	
	// id
	// profile_pic_url
	// username
	$user_id = $array["data"]["user"]["reel"]["user"]["id"];
	
	$username = $array["data"]["user"]["reel"]["user"]["username"];

	$profile_pic = $array["data"]["user"]["reel"]["user"]["profile_pic_url"];
}


if(isset($_GET["username"]))
{	
	$username = $_GET["username"];	
		
	$array = GetArrayFromUsername($username);
	
	
	// id
	// profile_pic_url
	// username
	$user_id = $array["data"]["user"]["reel"]["user"]["id"];
	
	$username = $array["data"]["user"]["reel"]["user"]["username"];

	$profile_pic = $array["data"]["user"]["reel"]["user"]["profile_pic_url"];
}


?>



<html>

<style>

.screen_center{
	
	position: fixed;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
	
	text-align: center;
	
};

</style>

<body>

<a href="./">back</a>

<div class="screen_center">

<?php

if(isset($user_id))
{
	
	echo "<a href='https://instagram.com/$username' target='blank'>user id: <br>$user_id<br>";
	
	echo "<img src='$profile_pic'></img><br>";
	
	echo "$username</a>";
	
}
else
{
	echo "No account found with this id.";
}

?>

</div>


</body>

</html>