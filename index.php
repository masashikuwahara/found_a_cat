<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>猫見つけた！</title>
</head>
<body>
  <?php require_once('header.php'); ?>
  <div class="wrapper">
    このサイトは地域に住み着いている地域猫、道端などでみつけた猫などを<br/>
    投稿、共有するサイトです。右上の投稿ボタンから猫を投稿し、共有することができます。<br/><br/>
    フリーワード検索<br/>
    <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
      <input class="sea" type="text" name="s" placeholder="">
      <input class="" type="submit" value="検索する">
    </form>
    <?php
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
    } else {
      $page = 1;
    }
    
    if ($page > 1) {
      $start = ($page * 8) - 8;
    } else {
      $start = 0;
    }
    
    require_once('connect.php');
    $dbh->query('SET NAMES utf8');
    $cats = $dbh->prepare(" SELECT id,title,kind,img1 FROM cats 
    ORDER BY id DESC LIMIT {$start}, 8 ");
    $cats->execute();
    $cats = $cats->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($cats as $post) {
      if($post['img1']=='')
      {
        $img_name='';
      } else {
        $img_name='<img style="width:360px" src="img/'.$post['img1'].'">';
      }
      
      echo '<span class="img_style">';
      echo $post['kind'].'</br>';
      echo '<a href="show.php?id='.$post['id'].'">';
      echo $post['title'].'<br />'.$img_name.'</a>'.'</span>';
    }
    
    $page_num = $dbh->prepare(" SELECT COUNT(*) id FROM cats ");
    $page_num->execute();
    $page_num = $page_num->fetchColumn();

    $pagination = ceil($page_num / 8);
    ?>
    <ol>
    <?php for ($x=1; $x <= $pagination ; $x++) { ?>
      <a href="?page=<?php echo $x ?>" id="pgn"><?php echo $x; ?></a>
    <?php } // End of for ?>
    </ol>
  </div>
</body>
</html>