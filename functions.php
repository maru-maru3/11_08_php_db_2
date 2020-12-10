<?php

function connect_to_db()
// DB名は自分で設定したものを使用する！
{
    $dbn = 'mysql:dbname=gacf_l04_08;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // $dbn = 'mysql:dbname=gacf_l04_08;charset=utf8;port=3306;host=localhost';
    // $user = 'root';
    // $pwd = '';


    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}
