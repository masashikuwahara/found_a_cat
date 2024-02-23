<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>猫見つけた！</title>
</head>
<body>
  <h1>猫見つけた！</h1>
  <div style="text-align: right;"><a href="new.php" class="btn">投稿する</a></div>
  <div class="wrapper">
    ここに説明ここに説明ここに説明ここに説明ここに説明ここに説明ここに説明<br/>
    フリーワード検索<br/>
    <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
      <input class="sea" type="text" name="s" placeholder="">
      <input class="" type="submit" value="検索する">
    </form>
    <?php
      try
      {
        require_once('connect.php');
        $dbh->query('SET NAMES utf8');
        $sql='SELECT id,title,kind,img1 FROM cats ORDER BY id DESC';
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
  
        $dbh=null;
  
        while(true)
        {
          $rec=$stmt->fetch(PDO::FETCH_ASSOC);
          if($rec==false)
          {
            break;
          }
  
          if($rec['img1']=='')
          {
            $img_name='';
          }
          else
          {
            $img_name='<img style="width:360px" src="img/'.$rec['img1'].'">';
          }

          echo '<span class="img_style">';
          if($rec['kind'] == '地域猫'){
            echo $rec['kind'] .'</br>';
          }elseif($rec['kind'] == '野良猫'){
            echo $rec['kind'].'</br>' ;
          }elseif($rec['kind'] == '飼い猫'){
            echo $rec['kind'] .'</br>';
          }else{
            echo $rec['kind'] .'</br>';
          }
          echo '<a href="show.php?id='.$rec['id'].'">';
          echo $rec['title'].'<br />'.$img_name.'</a>'.'</span>';
        }
  
        }
        catch (Exception $e)
        {
          echo 'ただいま障害により大変ご迷惑をお掛けしております。';
          exit();
        }
    ?>
  </div>
</body>
</html>