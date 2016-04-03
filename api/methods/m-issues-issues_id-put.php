<?php
$route = '/issues/:issues_id/';
$app->put($route, function ($issues_id) use ($app){

	$host = $_SERVER['HTTP_HOST'];
	$issues_id = prepareIdIn($issues_id,$host);
	$issues_id = mysql_real_escape_string($issues_id);

	$ReturnObject = array();

 	$request = $app->request();
 	$params = $request->params();

	if(isset($params['title'])){ $title = mysql_real_escape_string($params['title']); } else { $title = date('Y-m-d H:i:s'); }
	if(isset($params['image'])){ $image = mysql_real_escape_string($params['image']); } else { $image = ''; }
	if(isset($params['header'])){ $header = mysql_real_escape_string($params['header']); } else { $header = ''; }
	if(isset($params['footer'])){ $footer = mysql_real_escape_string($params['footer']); } else { $footer = ''; }

  $Query = "SELECT * FROM issues WHERE ID = " . $issues_id;
	//echo $Query . "<br />";
	$Database = mysql_query($Query) or die('Query failed: ' . mysql_error());

	if($Database && mysql_num_rows($Database))
		{
		$query = "UPDATE issues SET ";
		$query .= "title = '" . mysql_real_escape_string($title) . "'";
		$query .= ", image = '" . mysql_real_escape_string($image) . "'";
		$query .= ", header = '" . mysql_real_escape_string($header) . "'";
		$query .= ", footer = '" . mysql_real_escape_string($footer) . "'";
		$query .= " WHERE issues_id = " . $issues_id;
		//echo $query . "<br />";
		mysql_query($query) or die('Query failed: ' . mysql_error());
		}

	$title = $Database['title'];
	$image = $Database['image'];
	$header = $Database['header'];
	$footer = $Database['footer'];

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
	echo stripslashes(format_json(json_encode($ReturnObject)));

	});
?>
