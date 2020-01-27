<?php require('dbconnect.php');?>
<!doctype html>
<html lang="ja">
<h2>Practice</h2>
<pre>
<?php 
$statement = $db -> prepare('INSERT INTO memos SET memo=? , created_at=NOW()');
$statement -> bindParam(1,$_POST['memo']);
$statement -> execute();
echo 'メッセージが登録されました';
?>
</pre>