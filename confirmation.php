<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>
    <div class="form">
        <?php
        require_once('library.php');

        $post=sanitize($_POST);
        $cats_title=$post['title'];
        $cats_witness=$post['witness'];
        $cats_kind=$post['kind'];
        $cats_color=$post['color'];
        $cats_feature=$post['feature'];
        $cats_place=$post['place'];
        $cats_year=$post['year'];
        $cats_month=$post['month'];
        $cats_day=$post['day'];
        $cats_comment=$post['comment'];
        $cats_img1=$_FILES['img1'];
        $cats_img2=$_FILES['img2'];
        $cats_img3=$_FILES['img3'];

        if($cats_title=='')
        {
            echo'<p style="color:#ff0000">タイトルが入力されていません。</p><br />';
        }
        else
        {
            echo'タイトル:';
            echo$cats_title;
            echo'<br />';
        }

        if($cats_witness=='')
        {
            echo'<p style="color:#ff0000">目撃者が入力されていません。</p><br />';
        }
        else
        {
            echo'目撃者:';
            echo$cats_witness;
            echo'<br />';
        }
        
        echo'種類:';
        echo$cats_kind;
        echo'<br />';

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

            echo'目撃日:';
            echo$cats_year;
            echo'年';
            echo$cats_month;
            echo'月';
            echo$cats_day;
            echo'日';
            echo'<br />';

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
                move_uploaded_file($cats_img1['tmp_name'],'img/'.$cats_img1['name']);
                echo'<img src="img/'.$cats_img1['name'].'" width="250" >';
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
                move_uploaded_file($cats_img2['tmp_name'],'img/'.$cats_img2['name']);
                echo'<img src="img/'.$cats_img2['name'].'" width="250" >';
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
                move_uploaded_file($cats_img3['tmp_name'],'img/'.$cats_img3['name']);
                echo'<img src="img/'.$cats_img3['name'].'" width="250" >';
                echo'<br />';
            }
        }

        if($cats_color==''||$cats_feature==''||$cats_place==''||$cats_year==''||$cats_month==''||
        $cats_day==''||$cats_witness==''||$cats_comment==''||$cats_img1['size']>1000000)
        {
            echo'<form>';
            echo 'すべて入力してください<br/>';
            echo'<input class="" type="button" onclick="history.back()" value="戻る">';
            echo'</form>';
        }
        else
        {
            echo'上記の内容を追加します。<br />';
            echo'<form method="post" action="create.php">';
            echo'<input type="hidden" name="title" value="'.$cats_title.'">';
            echo'<input type="hidden" name="witness" value="'.$cats_witness.'">';
            echo'<input type="hidden" name="kind" value="'.$cats_kind.'">';
            echo'<input type="hidden" name="color" value="'.$cats_color.'">';
            echo'<input type="hidden" name="feature" value="'.$cats_feature.'">';
            echo'<input type="hidden" name="place" value="'.$cats_place.'">';
            echo'<input type="hidden" name="year" value="'.$cats_year.'">';
            echo'<input type="hidden" name="month" value="'.$cats_month.'">';
            echo'<input type="hidden" name="day" value="'.$cats_day.'">';
            echo'<input type="hidden" name="comment" value="'.$cats_comment.'">';
            echo'<input type="hidden" name="img1" value="'.$cats_img1['name'].'">';
            echo'<input type="hidden" name="img2" value="'.$cats_img2['name'].'">';
            echo'<input type="hidden" name="img3" value="'.$cats_img3['name'].'">';
            echo'<br />';
            echo'<input class="" type="button" onclick="history.back()" value="戻る">&nbsp;';
            echo'<input class="" type="submit" value="決定する">';
            echo'</form>';
        }
        ?>
    </div>
    <div class="bottom"></div>
</body>
</html>