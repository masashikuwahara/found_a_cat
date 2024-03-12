<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>猫を投稿する</title>
  <style>
  .form-select-wrap {
    display: flex;
    max-width: 300px;
    align-items: center;
    margin: auto;
  }
  
  .form-select-wrap > select {
    padding: 8px 16px;
    margin-left: 10px;
    margin-right: 10px;
    border: 1px solid gray;
    border-radius: 4px;
    font-size: 14px;
  }
  </style>
</head>
<body>
  <div class="form">
    <h1>猫を投稿する</h1>
    <h2>全て入力してください</h2>
    <form method="post" action="confirmation.php" enctype="multipart/form-data">
      タイトル<br />
      <input class="tex" type="text" name="title" ><br />
      目撃者<br />
      <input class="tex" type="text" name="witness" ><br />
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
      <div class="form-select-wrap" >
        <select class="year" name="year"></select>
        / 
        <select class="month" name="month"></select>
        /
        <select class="day" name="day"></select>
      </div>
      一言<br />
      <textarea class="textb" type="text" name="comment" ></textarea><br />
      画像を一枚以上選んでください。<br />
      <input type="file" name="img1" ><br /><br />
      <input type="file" name="img2" ><br /><br />
      <input type="file" name="img3" ><br /><br />
      <input class="" type="button" onclick="history.back()"value="戻る">
      <input class="" type="submit" value="次のページへ">
    </form>
  </div>
  <script>
  let Year = document.querySelector('.year');
  let Month = document.querySelector('.month');
  let Day = document.querySelector('.day');

  /**
   * selectのoptionタグを生成するための関数
   * @param {Element} elem 変更したいselectの要素
   * @param {Number} val 表示される文字と値の数値
   */
  function createOptionForElements(elem, val) {
    let option = document.createElement('option');
    option.text = val;
    option.value = val;
    elem.appendChild(option);
  }
  //年の生成
  for(let i = 2020; i <= 2030; i++) {
    createOptionForElements(Year, i);
  }
  //月の生成
  for(let i = 1; i <= 12; i++) {
    createOptionForElements(Month, i);
  }
  //日の生成
  for(let i = 1; i <= 31; i++) {
    createOptionForElements(Day, i);
  }

  /**
   * 日付を変更する関数
   */
  function changeTheDay() {
    //日付の要素を削除
    Day.innerHTML = '';

    //選択された年月の最終日を計算
    let lastDayOfTheMonth = new Date(Year.value, Month.value, 0).getDate();

    //選択された年月の日付を生成
    for(let i = 1; i <= lastDayOfTheMonth; i++) {
      createOptionForElements(Day, i);
    }
  }

  Year.addEventListener('change', function() {
    changeTheDay();
  });

  Month.addEventListener('change', function() {
    changeTheDay();
  });
  </script>
</body>
</html>