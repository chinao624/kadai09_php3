<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}
//DB接続
function db_conn()
{
    try {
        $db_name =  'kadai09';            //データベース名
        $db_host =  'localhost';  //DBホスト
        $db_id =    'root';                //アカウント名(登録しているドメイン)
        $db_pw =    '';           //さくらサーバのパスワード
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
    }

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

function redirect($file_name){
    header("Location: ".$file_name);
    exit();
    }

?>