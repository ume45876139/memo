<?php require('dbconnect.php'); ?>
<!doctype html>
<html lang="ja">
<main>
<h2>Practice</h2>
<?php
$statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
$statement->execute(array($_POST['memo'],$_POST['id']));
?>
<p>メモの内容を変更しました</p>
<p><a href="index.php">戻る</a></p>
</main>
</html>