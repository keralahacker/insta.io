<html>

<meta name="viewport" content="width=device-width, initial-scale=0.6">
<link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="style.css">


<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);

function GetArrayFromId($user_id)
{
	$url = 'https://www.instagram.com/graphql/query/?query_hash=c9100bf9110dd6361671f113dd02e7d6&variables=%7B"user_id"%3A"'.$user_id.'"%2C"include_chaining"%3Atrue%2C"include_reel"%3Atrue%2C"include_suggested_users"%3Afalse%2C"include_logged_out_extras"%3Atrue%2C"include_highlight_reels"%3Atrue%2C"include_related_profiles"%3Atrue%7D';
		
	$result = file_get_contents($url);
		
	$array = json_decode( $result, true );
	
	return $array;
}

function GetArrayFromIdFromFile($user_id)
{
	$url = "temp/user_id_$user_id.txt";
		
	$result = file_get_contents($url);
		
	$array = json_decode( $result, true );
	
	return $array;
}


function GetArrayFromUsername($username)
{

	$url = "https://instagram.com/$username";
	
	$result = file_get_contents($url);
	
	$to_find = '"id":';
	
	$id_str_pos = strpos($result, $to_find, 0) + strlen($to_find) + 1;
	
	$finish_pos = strpos($result, '"', $id_str_pos);
	
	$user_id = substr($result, $id_str_pos, $finish_pos - $id_str_pos);
		
	return GetArrayFromId($user_id);
	
}


?>

</html>