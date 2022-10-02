<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if(!$result) {
    $_SESSION['login_err'] = 'ユーザを登録してログインしてください！';
    header('Location: signup_form.php');
    return;
}

$login_user = $_SESSION['login_user'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mypage.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <meta name="viewport" connect="width=device-width,initial-scale=1.0">
    
    <title>マイページ</title>

    <style type="text/css">
            textarea{width:100%;height: 57vh;}
        </style>

</head>
<body>
<header>
    <div class="header-left">
            <h2>マイページ</h2>
        </div>

        <div class = "information">
            <p>ログインユーザ：<?php echo h($login_user['name']) ?></p>
            <p>メールアドレス：<?php echo h($login_user['email']) ?></p>
        </div>

    <div class="header-right">
            <form action="mypage.php" method="get">
            <input type="search" name="search" placeholder="検索キーワードを入力してください”>
            <input type="submit" name="submit" value="検索"></form>
        
            <form action="logout.php" method="POST">
            <input type="submit" name="logout" value="ログアウト"></form>
    </div>
</header>

<main> 

<!-- ここから先はコピペ -->

    <div id="kisekae-area">
        <img class="base-img" src="https://incloop.com/wp-content/uploads/2020/07/base.png">
    </div>
    
        <div class="memo">
            <p>＜価値観メモ＞</p>
            <p>
                <input type="button" value="保存" onclick=save(); ></input>
                <input type="button" value="読込" onclick=load(); ></input>
            </p>

            <form name="form1">
                <textarea name="Memo"></textarea>
            </form>
            
                <script type="text/javascript">
                    // 読込
                    function load() {
                        var MemoData = "";
                        if(!localStorage.getItem('MemoData')) {
                            MemoData = "メモは登録されていません。";
                        } else {
                            MemoData = localStorage.getItem('MemoData');
                        }
                        document.form1.Memo.value = MemoData;
                    }
                    // 保存
                    function save() {
                        var MemoData = document.form1.Memo.value;
                        localStorage.setItem('MemoData', MemoData);
                    }
               </script>
        </div>
    
    
  <div class="box">
    <div id="select-img-area">
        <p class="select-img">
            <!-- プライベート（物）大 -->
            <!-- カットした画像（〇〇-cut） -->
            <img src="../photo/apart-cut.jpg">
            <!-- 元の画像 -->
            <img src="../photo/apart.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/一戸建て-cut.jpg">
            <img src="../photo/一戸建て.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/マンション-cut.jpg">
            <img src="../photo/マンション.jpg">
        </p>
        <!-- プライベート（人）小 -->
        <p class="select-img">
            <img src="../photo/犬-cut.jpg">
            <img src="../photo/犬.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/猫-cut.jpg">
            <img src="../photo/猫.jpg">
        </p>
         <!-- プライベート（人）中 -->
        <p class="select-img">
            <img src="../photo/女の子-cut.jpg">
            <img src="../photo/女の子.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/男の子-cut.jpg">
            <img src="../photo/男の子.jpg">
        </p>
        <!-- プライベート（人）大 -->
        <p class="select-img">
            <img src="../photo/独身女性-cut.jpg">
            <img src="../photo/独身女性.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/独身男性-cut.jpg">
            <img src="../photo/独身男性.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/夫婦-cut.jpg">
            <img src="../photo/夫婦.jpg">
        </p>
        <!-- プライベート（物）小 -->
        <p class="select-img">
            <img src="../photo/車-cut.jpg">
            <img src="../photo/車.jpg">
        </p>
        <!-- 背景 -->
        <p class="select-img">
            <img src="../photo/田舎-cut.jpg">
            <img src="../photo/田舎.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/田舎-cut.jpg">
            <img src="../photo/田舎.jpg">
        </p>
        <!-- ワーク（物） -->
        <p class="select-img">
            <img src="../photo/インフラ系（背景）-cut.jpg">
            <img src="../photo/インフラ系（背景）.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/宿泊業（背景）-cut.jpg">
            <img src="../photo/宿泊業（背景）.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/小売業-cut.jpg">
            <img src="../photo/小売業.jpg">
        </p>
        <!-- ワーク（人） -->
        <p class="select-img">
            <img src="../photo/インフラ系-cut.jpg">
            <img src="../photo/インフラ系.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/医療-cut.jpg">
            <img src="../photo/医療.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/飲食業-cut.jpg">
            <img src="../photo/飲食業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/運輸業-cut.jpg">
            <img src="../photo/運輸業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/卸売業-cut.jpg">
            <img src="../photo/卸売業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/漁業-cut.jpg">
            <img src="../photo/漁業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/教育業-cut.jpg">
            <img src="../photo/教育業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/金融業-cut.jpg">
            <img src="../photo/金融業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/建設業-cut.jpg">
            <img src="../photo/建設業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/公務員-cut.jpg">
            <img src="../photo/公務員.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/採石採取業-cut.jpg">
            <img src="../photo/採石採取業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/宿泊業-cut.jpg">
            <img src="../photo/宿泊業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/農家-cut.jpg">
            <img src="../photo/農家.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/不動産業-cut.jpg">
            <img src="../photo/不動産業.jpg">
        </p>
        <p class="select-img">
            <img src="../photo/保険業-cut.jpg">
            <img src="../photo/保険業.jpg">
        </p>
    </div>
</div>

    <script>
                <!--
        jQuery(function($) {
            // 画像エリアクリックイベント
            $('.select-img').on('click', function(){
            $(this).toggleClass('selected');
            change_img();
            });
        
            // 画像変更処理
            function change_img(){
            var s_html = '';
            var i_z_index = 1;
            $('.select-img.selected').each(function(index, element){
                s_html += '<img src="' + $(element).find('img').eq(1).attr('src') + '" style="z-index:' + i_z_index + '">';
                i_z_index++;
            });
            // 要素削除
            $('#kisekae-area img').each(function(index, element){
                if(!$(this).hasClass('base-img')){
                $(this).remove();
                }
            });
            // 要素追加
            $('#kisekae-area').append(s_html);
            }
        });
        -->
</script>



</main>

</body>
</html>