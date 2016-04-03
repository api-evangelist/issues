<?php
$route = '/issues/:issues_id/';
$app->get($route, function ($issues_id) use ($app){

	$host = $_SERVER['HTTP_HOST'];
	$issues_id = prepareIdIn($issues_id,$host);
	$issues_id = mysql_real_escape_string($issues_id);

	$ReturnObject = array();
	$Query = "SELECT * FROM issues WHERE issues_id = " . $issues_id;
	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());

	while ($Database = mysql_fetch_assoc($DatabaseResult))
		{

		$issues_id = $Database['issues_id'];
		$title = $Database['title'];
		$image = $Database['image'];
		$header = $Database['header'];
		$footer = $Database['footer'];

		$KeysQuery = "SELECT * from keys k";
		$KeysQuery .= " WHERE issues_id = " . $issues_id;
		$KeysQuery .= " ORDER BY name ASC";
		$KeysResults = mysql_query($KeysQuery) or die('Query failed: ' . mysql_error());

		$issues_id = prepareIdOut($issues_id,$host);

		$F = array();
		$F['issues_id'] = $issues_id;
		$F['title'] = $title;
		$F['image'] = $image;
		$F['header'] = $header;
		$F['footer'] = $footer;

		$Issues_History_Query = "SELECT * from issues_history ih";
	 $Issues_History_Query .= " WHERE issues_id = " . $issues_id;
	 $Issues_History_Query .= " ORDER BY name ASC";
	 $Issues_History_Results = mysql_query($Issues_History_Query) or die('Query failed: ' . mysql_error());

	 $issues_id = prepareIdOut($issues_id,$host);

	 $F = array();
	 $F['issues_id'] = $issues_id;
	 $F['title'] = $title;
	 $F['image'] = $image;
	 $F['header'] = $header;
	 $F['footer'] = $footer;

	 // issues_history
	 $F['issues_history'] = array();
	 while ($issues_history = mysql_fetch_assoc($Issues_History_Results))
		 {
		 $title = $issues_history['title'];
		 $description = $issues_history['description'];
		 $url = $issues_history['url'];
		 $data = $issues_history['data'];

		 $K = array();
		 $K['title'] = $title;
		 $K['description'] = $description;
		 $K['url'] = $url;
		 $K['data'] = $data;
		 array_push($F['issues_history'], $K);
		 }

		$ReturnObject = $F;
		}

		$app->response()->header("Content-Type", "application/json");
		echo format_json(json_encode($ReturnObject));
	});
?>
