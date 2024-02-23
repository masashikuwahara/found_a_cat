<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>登録しました</title>
</head>
<body>
  <div class="form">
    <?php
        try
        {
            $post=($_POST);
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
            $cats_img1=$post['img1'];
            $cats_img2=$post['img2'];
            $cats_img3=$post['img3'];

            require_once('connect.php');

            $sql = 'INSERT INTO cats (title,witness,kind,color,feature,place,
            year,month,day,comment,img1,img2,img3) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $cats_title;
            $data[] = $cats_witness;
            $data[] = $cats_kind;
            $data[] = $cats_color;
            $data[] = $cats_feature;
            $data[] = $cats_place;
            $data[] = $cats_year;
            $data[] = $cats_month;
            $data[] = $cats_day;
            $data[] = $cats_comment;
            $data[] = $cats_img1;
            $data[] = $cats_img2;
            $data[] = $cats_img3;
            $stmt->execute($data);

            $dbh = null;

            echo '<p style="font-size: 25px;">追加しました。</p>';
        }
        catch (Exception $e)
        {
            echo('Error:'.$e->getMessage());
            exit();
        }
    ?>
    <a href="index.php" style="font-size:20pt;font-weight:bold;">戻る</a>
  </div>
</body>
</html>