<?php require('dbconnect.php');?>
<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>よくわかるPHPの教科書</title>
</head>
<body>
<header>
<h1 class="font-weiht-normal">よくわかるPHPの教科書</h1>    
</header>

<main>
<h2>Practice</h2>
<?php
if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
    $page = $_REQUEST['page'];
}else{
    $page = 1;
}
// 配列だから０からで良い
$start = 5*($page-1);
// URLからpage変数を受け取っている
$memos = $db -> prepare('SELECT* FROM memos ORDER BY id LIMIT ?,5');
// バインドは３つのパラメータを決める
$memos-> bindParam(1,$start,PDO::PARAM_INT);
$memos->execute();
?>
<article>
    <?php while($memo = $memos -> fetch()): ?>
    <?php if((mb_strlen($memo['memo']))>50): ?>
    <p><a href="memo.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'],0,50)) ;?>...</a></p>
    <?php else :?>
    <p><a href="memo.php?id=<?php print($memo['id']); ?>"><?php print($memo['memo']);?></a></p>
    <?php endif;?>

        <time><?php print($memo['created_at']); ?></time>
        <hr>
    <?php endwhile;?>
<?php if($page >=2): ?>
<a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
<?php endif; ?>
|
<?php 
$counts= $db -> query('SELECT COUNT(*)as cnt FROM memos');
$count = $counts ->fetch();
$max_page = floor($count['cnt']/5)+1;
if ($page < $max_page):
?> 
<a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
<?php endif; ?>
</article>
</main>
</body>    
</html>