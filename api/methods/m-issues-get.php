<?php
$route = '/issues/';
$app->get($route, function ()  use ($app,$contentType,$githuborg,$githubrepo){

	$ReturnObject = array();
	//$ReturnObject["contentType"] = $contentType;

	if($contentType == 'application/apis+json')
		{
		$app->response()->header("Content-Type", "application/json");

		$apis_json_url = "http://" . $githuborg . ".github.io/" . $githubrepo . "/apis.json";
		$apis_json = file_get_contents($apis_json_url);
		echo stripslashes(format_json($apis_json));
		}
	else
		{

	 	$request = $app->request();
	 	$params = $request->params();

		if(isset($params['query'])){ $query = trim(mysql_real_escape_string($params['query'])); } else { $query = '';}
		if(isset($params['page'])){ $page = trim(mysql_real_escape_string($params['page'])); } else { $page = 0;}
		if(isset($params['count'])){ $count = trim(mysql_real_escape_string($params['count'])); } else { $count = 50;}
		if(isset($params['sort'])){ $sort = trim(mysql_real_escape_string($params['sort'])); } else { $sort = 'Title';}
		if(isset($params['order'])){ $order = trim(mysql_real_escape_string($params['order'])); } else { $order = 'ASC';}

		// Pull from MySQL
		if($query!='')
			{
			$Query = "SELECT * FROM issues WHERE title LIKE '%" . $query . "%' OR header LIKE '%" . $query . "%' OR footer LIKE '%" . $query . "%'";
			}
		else
			{
			$Query = "SELECT * FROM issues";
			}
			$Query .= " ORDER BY " . $sort . " " . $order . " LIMIT " . $page . "," . $count;
			//echo $Query . "<br />";
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
			}
	});
?>
