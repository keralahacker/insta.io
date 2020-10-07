<html>
<meta name="viewport" content="width=device-width, initial-scale=0.6">

<link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">




<body>

<div class="center">

	<form action="find.php" method="GET">

		<input type="text" placeholder="user name" name="username"></input>
		<input type="submit" value="find!"></input>

	</form>

		OR
		
	<br>
	<br>
	<form action="find.php" method="GET">

		<input type="number" placeholder="user id" name="number"></input>
		<input type="submit" value="find!"></input>

	</form>

</div>

<div class="bottom-fixed">

first instagram members
<br>
<?php 

include 'functions.php';

$count = 0;

$first_members = array(3,4,5,6,8,10,11,12);

for($i = 0;$i < count($first_members);$i++)
{
	$user_id = $first_members[$i];
	$array = GetArrayFromIdFromFile( $user_id );
	
	file_put_contents("user_id_$user_id.txt", json_encode($array));
	
	$profile_pic = $array["data"]["user"]["reel"]["user"]["profile_pic_url"];
	$username = $array["data"]["user"]["reel"]["user"]["username"];
		
	if(isset($profile_pic))
	{
		echo "<div id='member_$i' class='bottom-member'><a href='https://instagram.com/$username' target='blank'><div class='bottom-member-text'>$username ($user_id)</div><img width='150' height='150' src='$profile_pic'></img></a></div>&nbsp;";
		
		$count++;
	}

}

?>

</div>

</body>


<script>

var width = screen.width;

var max_count = (width / 150);

for(var i = 7;i >= max_count;i--)
{
	var name = "member_" + i;
	console.log(name);
	window.document.getElementById(name).remove();
}
	
</script>
</html>