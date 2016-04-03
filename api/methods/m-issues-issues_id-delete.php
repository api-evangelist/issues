<?php
$route = '/issues/:issues_id/';
$app->delete($route, function ($issues_id) use ($app){

	$host = $_SERVER['HTTP_HOST'];
	$issues_id = prepareIdIn($issues_id,$host);
	$issues_id = mysql_real_escape_string($issues_id);

	$Add = 1;
	$ReturnObject = array();

 	$request = $app->request();
 	$_POST = $request->params();

	$query = "DELETE FROM issues WHERE issues_id = " . $issues_id;
	//echo $query . "<br />";
	mysql_query($query) or die('Query failed: ' . mysql_error());

	});
?>
