<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <feature>確認画面</feature>
</head>
<body>
  <h1>猫見つけた！</h1>
  <div class="form">
    この内容で登録します
    <?php
    require_once('library.php');

    $post=sanitize($_POST);
    $cats_kind=$post['kind'];
    $cats_color=$post['color'];
    $cats_feature=$post['feature'];
    $cats_place=$post['place'];
    $cats_sighting=$post['sighting'];
    $cats_witness=$post['witness'];
    $cats_comment=$post['comment'];
    $cats_img1=$_FILES['img1'];
    $cats_img2=$_FILES['img2'];
    $cats_img3=$_FILES['img3'];

    if($cats_color=='')
    {
        echo'<p style="color:#ff0000">色が入力されていません。</p><br />';
    }
    else
    {
        echo'色:';
        echo$cats_color;
        echo'<br />';
    }

    if($cats_feature=='')
    {
        echo'<p style="color:#ff0000">特徴が入力されていません。</p><br />';
    }
    else
    {
        echo'特徴:';
        echo$cats_feature;
        echo'<br />';
    }

    if($cats_place=='')
    {
        echo'<p style="color:#ff0000">目撃場所が入力されていません。</p><br />';
    }
    else
    {
        echo'目撃場所:';
        echo$cats_place;
        echo'<br />';
    }

    if($cats_sighting=='')
    {
        echo'<p style="color:#ff0000">特徴が入力されていません。</p><br />';
    }
    else
    {
        echo'特徴:';
        echo$cats_sighting;
        echo'<br />';
    }

    if($cats_witness=='')
    {
        echo'<p style="color:#ff0000">築城主が入力されていません。</p><br />';
    }
    else
    {
        echo'築城主:';
        echo$cats_witness;
        echo'<br />';
    }

    if($cats_comment=='')
    {
        echo'<p style="color:#ff0000">一言が入力されていません。</p><br />';
    }
    else
    {
        echo'一言:';
        echo$cats_comment;
        echo'<br />';
    }

    if( $cats_img1['size']>0)
    {
        if( $cats_img1['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cats_img1['tmp_name'],'../../img/'.$cats_img1['name']);
            echo'<img src="../../img/'.$cats_img1['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $cats_img2['size']>0)
    {
        if( $cats_img2['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cats_img2['tmp_name'],'../../img/'.$cats_img2['name']);
            echo'<img src="../../img/'.$cats_img2['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $cats_img3['size']>0)
    {
        if( $cats_img3['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cats_img3['tmp_name'],'../../img/'.$cats_img3['name']);
            echo'<img src="../../img/'.$cats_img3['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if($cats_color==''||$cats_feature==''||$cats_place==''||$cats_sighting==''||
    $cats_witness==''||$cats_comment==''||$cats_img1['size']>1000000)
    {
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }
    else
    {
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="cats_add_done.php">';
        echo'<input type="hidden" name="kind" value="'.$cats_kind.'">';
        echo'<input type="hidden" name="color" value="'.$cats_color.'">';
        echo'<input type="hidden" name="feature" value="'.$cats_feature.'">';
        echo'<input type="hidden" name="place" value="'.$cats_place.'">';
        echo'<input type="hidden" name="sighting" value="'.$cats_sighting.'">';
        echo'<input type="hidden" name="witness" value="'.$cats_witness.'">';
        echo'<input type="hidden" name="comment" value="'.$cats_comment.'">';
        echo'<input type="hidden" name="img1" value="'.$cats_img1['name'].'">';
        echo'<input type="hidden" name="img2" value="'.$cats_img2['name'].'">';
        echo'<input type="hidden" name="img3" value="'.$cats_img3['name'].'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
  </div>
</body>
</html>