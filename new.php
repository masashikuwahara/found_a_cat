<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <title>猫を登録する</title>
</head>
<body>
  <div class="form">
    <h1>入力してください</h1>
    <form method="post" action="confirmation.php" enctype="multipart/form-data">
      猫の種類<br />
      <select class="tex" name="kind" >
        <option>地域猫</option>
        <option>野良猫</option>
        <option>飼い猫</option>
        <option>不明</option>
      </select><br />
      毛色<br />
      <input class="tex" type="text" name="color" ><br />
      特徴<br />
      <input class="tex" type="text" name="feature" ><br />
      目撃場所<br />
      <input class="tex" type="text" name="place" ><br />
      目撃日<br />
      <input class="tex" type="text" name="sighting" ><br />
      目撃者<br />
      <input class="tex" type="text" name="witness" ><br />
      一言<br />
      <textarea class="textb" type="text" name="comment" ></textarea><br />
      画像を選んでください。<br />
      <input type="file" name="img1" ><br /><br />
      <input type="file" name="img1" ><br /><br />
      <input type="file" name="img1" ><br /><br />
      <input class="" type="button" onclick="history.back()"value="戻る">
      <input class="" type="submit" value="次のページへ">
    </form>
  </div>
</body>
</html>