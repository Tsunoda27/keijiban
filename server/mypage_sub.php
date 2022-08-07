<?php
// 関数ファイルを読み込む
require_once __DIR__ . '/common/functions.php';

// データベースに接続
$dbh = connect_db();

// セッション開始
session_start();

$current_user = '';
$user = '';

if (empty($_SESSION['current_user'])) {
    header('Location: keijiban.php');
    exit;
} elseif (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}

$id = filter_input(INPUT_GET, 'user_id');
$lists = mypage_list();
// $jobs = find_com_job_all();
// $internet_forum = find_photos_all();
?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/_head.php' ?>

<body>
    <?php include_once __DIR__ . '/_header.php' ?>

    <section class="main_content wrapper">
        <div class="content">
        <!-- ?php foreach ($jobs as $job) : ?> -->
       <!-- ?php if ($job['company_id'] == $current_user['id']) : ?> -->
        <!-- すぐ下のforeachを変える　あとは指定する関数が重要だからチェックすること -->
        <?php if ($user['user_id'] == $current_user['id']) : ?>
                    <?php foreach ($lists as $list) : ?>
                <br>
                <p class="keijiban_label">ニックネーム</p>
                <p class="keijiban_answer"><?= h($list['name']) ?></p><br>
                <p class="keijiban_label">私の生きる目的</p>
                <p class="keijiban_answer"> <?= h($list['goal']) ?></p><br>
                <p class="keijiban_label">目的を達成するための目標</p>
                <p class="keijiban_answer"><?= h($list['target']) ?></p><br>
                <p class="keijiban_label">目標を達成するためのアクション</p>
                <p class="keijiban_answer"><?= h($list['action']) ?></p><br>
                <p class="keijiban_label">目的達成における不安要素</p>
                <p class="keijiban_answer"><?= h($list['anxiety']) ?></p><br>
                <p class="keijiban_label">私の性格特性</p>
                <p class="keijiban_answer"><?= h($list['personality']) ?></p><br>
                <p class="keijiban_label">目標達成の期日</p>
                <p class="keijiban_answer"><?= h($list['deadline']) ?></p><br>
                <!-- <p class="keijiban_label">投稿日時</p> 
                <p class="keijiban_answer">?= h($list['creared_at']) ?></p> -->
                <hr class="kugirisen1">
                <hr class="kugirisen2"><br>
        <?php endforeach; ?>
        </div>
            <div class="button">
                <a href="edit.php" class="edit_button">編 集</a>
                <button class="delete_button">削 除</button>
            </div>
        </div>
    </section>

    <?php include_once __DIR__ . '/_footer.php' ?>
</body>

</html>
