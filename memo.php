<?php require('dbconnect.php');?>
<!doctype html>
<html lang="ja">
<main>
<h2>Practice</h2>
<?php 
$id = $_REQUEST['id'];
if(!is_numeric($id)||$id <= 0){
    print('1以上の数字で指定してください');
    exit();
}
// idの指定->?
$memos = $db->prepare('SELECT* FROM memos WHERE id=?');
$memos->execute(array($_REQUEST['id']));
$memo = $memos -> fetch();
?>
<article>
    <pre><?php print($memo['memo']); ?></pre>
    <a href="index.php">戻る</a>
</article>
</main>