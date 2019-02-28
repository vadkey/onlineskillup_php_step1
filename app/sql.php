<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try{
	//DB�ɐڑ�����
	$dbh = new PDO($dsn, $user, $pass);

	//�����ŃN�G�����s����
	//quwry���\�b�h(SELECT)
	//$query_result = $dbh->query('SELECT * FROM test_comments');

	//prepare���\�b�h(SELECT)
	$sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');

	//prepare���\�b�h(INSERT)
	$sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');


	//DB��ؒf����
	$dbh = null;
} catch (PDOException $e) {
	//�ڑ���G���[�����������ꍇ�ɂ����ɓ���
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