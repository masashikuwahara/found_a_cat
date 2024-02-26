<?php
$cats_id=$_GET['id'];

require_once('connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT * FROM cats WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$cats_id;
$stmt->execute($data);

$cat =$stmt->fetch(PDO::FETCH_ASSOC);
$cats_title=$cat['title'];
$cats_witness=$cat['witness'];
$cats_kind=$cat['kind'];
$cats_color=$cat['color'];
$cats_feature=$cat['feature'];
$cats_place=$cat['place'];
$cats_year=$cat['year'];
$cats_month=$cat['month'];
$cats_day=$cat['day'];
$cats_comment=$cat['comment'];
$cats_img1=$cat['img1'];
$cats_img2=$cat['img2'];
$cats_img3=$cat['img3'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title><?php echo $cats_title ?></title>
</head>
<body>
    <?php
        try{

          $dbh = null;
  
          if($cats_img1=='')
          {
              $disp_img1='';
          }
          else
          {
              $disp_img1="img/$cats_img1";
          }
      }
      catch (Exception $e)
      {
          echo'ただいま障害により大変ご迷惑をおかけしております。';
          exit();
      }
  
      try{
  
          $dbh = null;
  
          if($cats_img2=='')
          {
              $disp_img2='';
          }
          else
          {
              $disp_img2="img/$cats_img2";
          }
      }
      catch (Exception $e)
      {
          echo'ただいま障害により大変ご迷惑をおかけしております。';
          exit();
      }
  
      try{
  
          $dbh = null;
  
          if($cats_img3=='')
          {
              $disp_img3='';
          }
          else
          {
              $disp_img3="img/$cats_img3";
          }
      }
      catch (Exception $e)
      {
          echo'ただいま障害により大変ご迷惑をおかけしております。';
          exit();
      }

    ?>
    <?php require_once('header.php'); ?>
    <h1><?php echo $cats_title ?></h1>
    <div class="pic">
      <?php 
      echo '<img style="width:360px" src="' . $disp_img1 . '" alt="" >';
      echo '<img style="width:360px" src="' . $disp_img2 . '" alt="" >';
      echo '<img style="width:360px" src="' . $disp_img3 . '" alt="" >';
      ?>
    </div>

    <div class="show">
      <table class="table">
          <tbody>
              <tr>
                  <th>目撃者</th>
                  <td><?php echo $cats_witness;?></td>
              </tr>
              <tr>
                  <th>種類</th>
                  <td><?php echo $cats_kind;?></td>
              </tr>
              <tr>
                  <th>毛色</th>
                  <td><?php echo $cats_color;?></td>
              </tr>
              <tr>
                  <th>特徴</th>
                  <td><?php echo $cats_feature;?></td>
              </tr>
              <tr>
                  <th>目撃場所</th>
                  <td><?php echo $cats_place;?></td>
              </tr>
              <tr>
                  <th>目撃日</th>
                  <td><?php echo $cats_year;?>年<?php echo $cats_month;?>月<?php echo $cats_day;?>日</td>
              </tr>
              <tr>
                  <th>一言</th>
                  <td><?php echo $cats_comment;?></td>
              </tr>
          </tbody>
      </table>
  </div>
  <div class="bottom">
   <a href="index.php" style="font-size:20pt;font-weight:bold;">戻る</a>
  </div>
</body>
</html>