<?php
$route = '/issues/';
$app->post($route, function () use ($app){

 	$request = $app->request();
 	$params = $request->params();

	if(isset($params['title'])){ $title = mysql_real_escape_string($params['title']); } else { $title = date('Y-m-d H:i:s'); }
	if(isset($params['image'])){ $image = mysql_real_escape_string($params['image']); } else { $image = ''; }
	if(isset($params['header'])){ $header = mysql_real_escape_string($params['header']); } else { $header = ''; }
	if(isset($params['footer'])){ $footer = mysql_real_escape_string($params['footer']); } else { $footer = ''; }

  $Query = "SELECT * FROM issues WHERE title = '" . $title . "'";
	//echo $Query . "<br />";
	$Database = mysql_query($Query) or die('Query failed: ' . mysql_error());

	if($Database && mysql_num_rows($Database))
		{
		$Thisissues = mysql_fetch_assoc($Database);
		$issues_id = $Thisissues['ID'];
		}
	else
		{
		$Query = "INSERT INTO issues(title,image,header,footer)";
		$Query .= " VALUES(";
		$Query .= "'" . mysql_real_escape_string($title) . "',";
		$Query .= "'" . mysql_real_escape_string($image) . "',";
		$Query .= "'" . mysql_real_escape_string($header) . "',";
		$Query .= "'" . mysql_real_escape_string($footer) . "'";
		$Query .= ")";
		//echo $Query . "<br />";
		mysql_query($Query) or die('Query failed: ' . mysql_error());
		$issues_id = mysql_insert_id();
		}

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
