<?php
// 関数ファイルを読み込む
require_once __DIR__ . '/common/functions.php';

// セッション開始
session_start();

$current_user = '';

if (empty($_SESSION['current_user'])) {
    header('Location: keijiban.php');
    exit;
}

$current_user = $_SESSION['current_user'];

$msg = '';
$err_msg = '';
$nickname = '';
$user_id = '';
$goal = '';
$target = '';
$action = '';
$anxiety = '';
$personality = '';
$deadline = '';
$badword = '%' . '殺' . '%';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームに入力されたデータを受け取る
    $nickname = filter_input(INPUT_POST, 'name');
    $goal = filter_input(INPUT_POST, 'goal');
    $target = filter_input(INPUT_POST, 'target');
    $action = filter_input(INPUT_POST, 'action');
    $anxiety = filter_input(INPUT_POST, 'anxiety');
    $personality = filter_input(INPUT_POST, 'personality');
    $deadline = filter_input(INPUT_POST, 'deadline');
    insert_keijiban($current_user['id'], $nickname, $goal, $target, $action, $anxiety, $personality, $deadline);
    // $num1 = $_POST['name'];
    // $num2 = $_POST['goal'];
    // $num3 = $_POST['target'];
    // $num4 = $_POST['action'];
    // $num5 = $_POST['anxiety'];
    // $num6 = $_POST['personality'];
    // $num7 = $_POST['deadline'];
    //ここに禁止ワードでif文を入れたい!!
    if ((empty($nickname)) || empty($goal) || empty($target) || empty($action) || empty($anxiety) || empty($personality) || empty($deadline)) {
        $err_msg = '全ての項目を入力してください';
    } elseif ($goal == $badword) {
        echo '禁止ワードが含まれています';
    }    
     else {
        $msg = "入力お疲れ様でした!!" . PHP_EOL . "目標掲示板に反映させていただきました。" . PHP_EOL . "あなたの目標達成を心から応援しています!!";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/_head.php' ?>

<body>
    <?php include_once __DIR__ . '/_header.php' ?>
    <?php if (!empty($current_user)) : ?>
        <a href="keijiban_kakikomi.php" class="add_button">
            <i class="fa-solid fa-plus"></i>
        </a>
    <?php endif; ?>
    <main>
        <h1 class="keijiban-title">あなたの目標を教えてください!</h1>
        <form action="" method="POST">
            <div class="msg">
                <?= htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') ?>
            </div>
            <div>
                <?php if (!empty($err_msg)) : ?>
                    <ul>
                        <li><?= $err_msg ?></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="form_question wrapper">
                <label class="question">1.ニックネーム(必須)</label><br>
                <input type="text" name="name" class="answer_short" required><br><br>
                <label class="question">2.私の生きる目的(必須)</label><br>
                <textarea name="goal" class="answer" placeholder="あなたがどんな人生を歩みたいか、その目的を考えて記入してみましょう" required></textarea><br>
                <label class="question">3.目的を達成するための目標(必須)</label><br>
                <textarea name="target" class="answer" placeholder="上記の目的を達成するために、どのような目標(旗)があるか検討し、整理してみましょう(複数可)" required></textarea><br>
                <label class="question">4.目標を達成するためのアクション(必須)</label><br>
                <textarea name="action" class="answer" placeholder="上記の目標を達成するためにどのようなアクション(行動)が必要か整理してみましょう(複数可)" required></textarea><br>
                <label class="question">5.目的達成における不安要素(必須)</label><br>
                <textarea name="anxiety" class="answer" placeholder="上記の行動を実現するために、不安なことや懸念事項を記入してみましょう(恐れずに言語化してみるときっと状況が整理できると思います)" required></textarea><br>
                <label class="question">6.私の性格特性(必須)</label><br>
                <textarea name="personality" class="answer" placeholder="今の自分はどのような性格だと感じるか、自分を客観視して整理してみましょう(同じ人でも置かれた環境や心身の状況によって変動するかと思います)" required></textarea><br>
                <label class="question">7.目標達成の期日(必須)</label><br>
                <input type="text" name="deadline" required><br><br>
                <hr class="kugirisen1">
                <hr class="kugirisen2">
            </div>
            <div class="kakikomi_button">
                <input type="submit" value="書き込む">
            </div>
        </form>
    </main>

    <?php include_once __DIR__ . '/_footer.php' ?>

</body>

</html>
