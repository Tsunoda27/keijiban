<?php
$msg = '';
$err_msg = '';
$num1 = '';
$num2 = '';
$num3 = '';
$num4 = '';
$num5 = '';
$num6 = '';
$num7 = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];
    $num5 = $_POST['num5'];
    $num6 = $_POST['num6'];
    $num7 = $_POST['num7'];
    if ((empty($num1)) || empty($num2) || empty($num3) || empty($num4) || empty($num5) || empty($num6) || empty($num7)) {
        $err_msg = '全ての項目を入力してください';
    } else {
        $msg = "入力お疲れ様でした!!" . PHP_EOL . "あなたの目標を応援しています!!";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/_head.php' ?>

<body>
    <?php include_once __DIR__ . '/_header.php'?>

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
                        <input type="text" name="num1" class="answer_short" required><br><br>
                        <label class="question">2.私の生きる目的(必須)</label><br>
                        <textarea name="num2" class="answer" placeholder="あなたがどんな人生を歩みたいか、その目的を考えて記入してみましょう" required></textarea><br>
                        <label class="question">3.目的を達成するための目標(必須)</label><br>
                        <textarea name="num3" class="answer" placeholder="上記の目的を達成するために、どのような目標(旗)があるか検討し、整理してみましょう(複数可)" required></textarea><br>
                        <label class="question">4.目標を達成するためのアクション(必須)</label><br>
                        <textarea name="num4" class="answer" placeholder="上記の目標を達成するためにどのようなアクション(行動)が必要か整理してみましょう(複数可)" required></textarea><br>
                        <label class="question">5.目的達成における不安要素(必須)</label><br>
                        <textarea name="num5" class="answer" placeholder="上記の行動を実現するために、不安なことや懸念事項を記入してみましょう(恐れずに言語化してみるときっと状況が整理できると思います)" required></textarea><br>
                        <label class="question">6.私の性格特性(必須)</label><br>
                        <textarea name="num6" class="answer" placeholder="今の自分はどのような性格だと感じるか、自分を客観視して整理してみましょう(同じ人でも置かれた環境や心身の状況によって変動するかと思います)" required></textarea><br>
                        <label class="question">7.目標達成の期日(必須)</label><br>
                        <input type="text" name="num7" required><br><br>
                    </div>
                    <div class="kakikomi_button">
                        <input type="submit" value="書き込む">
                    </div>
        </form>
    </main>

<?php include_once __DIR__ . '/_footer.php'?>

</body>

</html>
