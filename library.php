<?php
// function session(){
//     session_start();
//     session_regenerate_id(true);
//     $user_name = $_SESSION['user_name'];
//     if(isset($_SESSION['login'])==false)
//     {
//         header("Content-Type: text/html; charset=UTF-8");
//         echo'ログインされていません。<br />';
//         echo'<a href="login.html">ログイン画面へ</a>';
//         exit();
//     }
//     else
//     {
//     $user_name = mb_convert_encoding($user_name, "UTF-8", "auto");
//     echo $user_name;
//     echo'さんログイン中<br />';
//     echo'<br />';
//     }
// }

function sanitize($before)
{
    foreach($before as $key=>$value)
    {
        $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    return $after;
}
?>