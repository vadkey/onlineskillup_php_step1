<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try{
	//DBに接続する
	$dbh = new PDO($dsn, $user, $pass);

	//ここでクエリ実行する
	//quwryメソッド(SELECT)
	//$query_result = $dbh->query('SELECT * FROM test_comments');

	//prepareメソッド(SELECT)
	$sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');

	//prepareメソッド(INSERT)
	$sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');


	//DBを切断する
	$dbh = null;
} catch (PDOException $e) {
	//接続んエラーが発生した場合にここに入る
	print "DB ERROR: " . $e->getMessage() . "<br/>";
	die();
}
?>
<?php
//	foreach($query_result as $row) {
//		print $row["name"] . ": " . $row["text"] . "<br/>";
//	}
	$name = "John";
	$sth_select->execute(array($name));
	$prepare_result = $sth_select->fetchAll();
	foreach($prepare_result as $row) {
		print $row["name"] . ": " . $row["text"] . "<br/>";
	}
	$sth_select->execute(array($name));
?>
<?php
	$name = "John";
	$text = "Power to the People";
	$sth->execute(array($name, $text));
?>