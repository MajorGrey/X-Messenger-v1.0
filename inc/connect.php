<?php
// //pdo connection
$db = new PDO("mysql:host=localhost;dbname=IM;charset=utf8mb4", "root", "");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//mysqli connection

$con = mysqli_connect('localhost', 'root', '', 'im');
if(!$con){
	echo "Error: Unable to connect to MySQL.";
    exit;
}

// function fetch_user_chat_history($sid, $rid, $db)
// {
// 	$query = "
// 	SELECT * FROM chat 
// 	WHERE (sid = '".$sid."' 
// 	AND rid = '".$rid."') 
// 	OR (sid = '".$rid."' 
// 	AND rid = '".$sid."') 
// 	ORDER BY timestamp DESC
// 	";
// 	$statement = $db->prepare($query);
// 	$statement->execute();
// 	$result = $statement->fetchAll();
// 	$output = '<ul class="list-unstyled">';
// 	foreach($result as $row)
// 	{
// 		$user_name = '';
// 		$dynamic_background = '';
// 		$chat = '';
// 		if($row["sid"] == $sid)
// 		{
// 			if($row["status"] == '2')
// 			{
// 				$chat = '<em>This message has been removed</em>';
// 				$user_name = '<b class="text-success">You</b>';
// 			}
// 			else
// 			{
// 				$chat = $row['chat'];
// 				$user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
// 			}
			

// 			$dynamic_background = 'background-color:#ffe6e6;';
// 		}
// 		else
// 		{
// 			if($row["status"] == '2')
// 			{
// 				$chat = '<em>This message has been removed</em>';
// 			}
// 			else
// 			{
// 				$chat = $row["chat"];
// 			}
// 			$user_name = '<b class="text-danger">'.get_user_name($row['sid'], $db).'</b>';
// 			$dynamic_background = 'background-color:#ffffe6;';
// 		}
// 		$output .= '
// 		<li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
// 			<p>'.$user_name.' - '.$chat.'
// 				<div align="right">
// 					- <small><em>'.$row['timestamp'].'</em></small>
// 				</div>
// 			</p>
// 		</li>
// 		';
// 	}
// 	$output .= '</ul>';
// 	$query = "
// 	UPDATE chat 
// 	SET status = '0' 
// 	WHERE sid = '".$rid."' 
// 	AND rid = '".$sid."' 
// 	AND status = '1'
// 	";
// 	$statement = $db->prepare($query);
// 	$statement->execute();
// 	return $output;
// }


?>