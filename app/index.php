<?php
$err_msg1 = "";
$err_msg2 = "";
$message = "";
$usrname = (isset($_POST["usrname"]) === true) ?$_POST["usrname"]: "";
$comment = (isset($_POST["comment"]) === true) ? trim($_POST["comment"]): "";
	if(isset($_POST["send"]) === true) {
		if($usrname === "" ) $err_msg1 = "input your name";
		if($comment === "" ) $err_msg2 = "input your comment";
		if($err_msg1 === "" && $err_msg2 === ""){
			$fp = fopen("data.txt", "a");
			fwrite( $fp, $usrname."\t".$comment."\n");
			$message = "comment successful";
		}
	}
	
	$fp = fopen("data.txt","r");

	$dataArr = array();
	while($res = fgets($fp)){
		$tmp = explode("\t",$res);
		$arr = array("usrname"=>$tmp[0], "comment"=>$tmp[1]);
		$dataArr[]=$arr;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>POST_keijiban</title>
	</head>
	<body>
		<?php echo $message; ?>
		<form method="post" action="index.php">
			usrname:<input type="text" name="usrname" value="<?php echo $usrname; ?> ">
			<?php echo $err_msg1; ?><br />
			comment:<textarea name="comment" rows="4" cols"40"><?php echo $comment; ?></textarea>
			<?php echo $err_msg2; ?><br />
<br>
			<input type="submit" name="send" value="go">
		</form>
		<dl>
		<?php foreach($dataArr as $data): ?>
		<p><span><?php echo $data["usrname"]; ?></span>:<span><?php echo $data["comment"]; ?></span></p>
		<?php endforeach; ?>
	</body>
</html>