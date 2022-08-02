<header id="header" class="wrapper">
    <h1 class="site-title"><a href="index.php"><img src="img/logo.png" alt="私とみんなの目標掲示板"></a></h1>
    <nav>
        <ul>
            <li><a href="index.php#about">コンセプト</a></li>
            <li><a href="index.php#service">サービス</a></li>
            <li><a href="keijiban.php">掲示板</a></li>
            <li><a href="login.php">ログイン</a></li>
            <li><a href="form2.php">問い合わせ</a></li>
        </ul>
    </nav>
    <div class="right_content">
        <div class="login_info">
            <?php if (!empty($current_user)) : ?>
                <p>
                    <?= $current_user['name'] ?>さん
                </p>
                <a class="header_logout_button" href="logout.php" class="nav-link">ログアウト</a>
                <!-- ?php else : ? -->
                <!-- <a class="header_login_button" href="login.php" class="nav-link">ログイン</a> -->
            <?php endif; ?>
        </div>
    </div>
</header>
