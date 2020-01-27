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
$memos = $db -> prepare('SELECT* FROM memos ORDER BY id LIMIT ?,5');
$memos-> bindParam(1,$_REQUEST['page'],PDO::PARAM_INT);
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

    <p>test</p>
</article>
</main>
</body>    
</html>