<?php
require_once __DIR__ . '/config.php';

// 接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function signup_validate($email, $name, $password)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($name)) {
        $errors[] = MSG_NAME_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }


    if (
        empty($errors) &&
        check_exist_user($email)
    ) {
        $errors[] = MSG_EMAIL_DUPLICATE;
    }

    return $errors;
}

function insert_user($email, $name, $password)
{
    $dbh = connect_db();

    $sql = <<<EOM
    INSERT INTO
        users
        (email, name, password)
    VALUES
        (:email, :name, :password);
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $pw_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindValue(':password', $pw_hash, PDO::PARAM_STR);

    $stmt->execute();
}

function check_exist_user($email)
{
    $err = false;

    $dbh = connect_db();

    $sql = <<<EOM
    SELECT 
        * 
    FROM 
        users 
    WHERE 
        email = :email;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user)) {
        $err = true;
    }
    return $err;
}

function login_validate($email, $password)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    return $errors;
}

function find_user_by_email($email)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        users
    WHERE
        email = :email;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// keijiban_kakikomi.phpの入力からDB登録
function insert_keijiban($user_id, $nickname, $goal, $target, $action, $anxiety, $personality, $deadline)
{
    // データベースに接続
    $dbh = connect_db();

    // レコードを追加
    $sql = <<<EOM
    INSERT INTO
        internet_forum
        (user_id, name, goal, target, action, anxiety, personality, deadline)
    VALUES
        (:user_id, :name, :goal, :target, :action, :anxiety, :personality, :deadline)
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->bindValue(':name', $nickname, PDO::PARAM_STR);
    $stmt->bindValue(':goal', $goal, PDO::PARAM_STR);
    $stmt->bindValue(':target', $target, PDO::PARAM_STR);
    $stmt->bindValue(':action', $action, PDO::PARAM_STR);
    $stmt->bindValue(':anxiety', $anxiety, PDO::PARAM_STR);
    $stmt->bindValue(':personality', $personality, PDO::PARAM_STR);
    $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

    // プリペアドステートメントの実行
    $stmt->execute();
}


// internet_formのDBからkeijiban.phpに表示する
function display_list()
{
    $dbh = connect_db();
    $sql = <<<EOM
    SELECT
        *
    FROM
        internet_forum ORDER BY created_at DESC;
    EOM;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}

// internet_formのDBから、検索して該当する値を表示する
function search_list($keyword_param)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        internet_forum
    WHERE
        goal LIKE :keyword
    EOM;

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':keyword', $keyword_param, PDO::PARAM_STR);

    $stmt->execute();

    $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}

function delete_mydata($id)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT 
        * 
    FROM 
        internet_forum
    WHERE 
        id = :id;
    EOM;
    
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
