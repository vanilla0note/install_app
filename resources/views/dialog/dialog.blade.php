<?php
    if( isset($_GET["msg"]) ) $msg = $_GET["msg"];
    else                      $msg = "102" ;

    if( isset($_GET["data"]) ) $data = $_GET["data"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title>喜憨兒基金會 雲端申請服務平台</title>
    <script src='jquery/jquery-1.12.4.min.js'></script>
    <script src="jquery/jquery-ui-1.12.1.min.js"></script>
    <script src="jquery/jquery.blockUI.js"></script>
    <link rel="stylesheet" href="jquery/jquery-ui-1.12.1.css">

    <link rel="stylesheet" href="css/dialog/dialog.css">


</head>
<body>
    <div id="dialog" title="喜憨兒基金會　雲端申請服務平台"><p> 
                                                 <?php
        switch($msg){

            //服務申請單 申請
            case "101" : echo "申請單已經送出完成，您會收到一封申請單確認信<br/><br/>接下來會安排時間處理，不需再打電話詢問喔！<br/><br/>"; $url='http://www.google.com'; $width=600; break;
            case "102" : echo "申請單已經送出完成！<br/><br/>您會收到一封申請單確認信！<br/><br/>"; $url='http://www.google.com'; $width=400; break;
            case "103" : echo "訂購單已經送出完成！<br/><br/>您會收到一封訂購單確認信！"; $url='http://www.google.com'; $width=400; break;



            //後台處理
            case "701" : echo "紀錄更新完成！"; $url='/backend/panel_default.php'; $width=400; break;
            case "702" : echo "商品建立完成！"; $url='/backend/panel_default.php'; $width=400; break;
            case "703" : echo "查無資料，請重新確認搜尋的條件！"; $url='/backend/panel_default.php'; $width=400; break;
            case "791" : echo "沒有輸入國際條碼編號，不可以上傳條碼檔案！"; $url='/backend/panel_default.php'; $width=550; break;
            case "792" : echo "沒有國際條碼檔案！無法寄信！"; $url='/backend/panel_default.php'; $width=550; break;
            case "799" : echo "輸入的資料不符合規則！";   $url = "/";   $width=400; break;

            //系統
            case "901" : echo "帳號或密碼錯誤！請確認帳號或密碼！<br/><br/>
                               若是密碼連續三次輸入錯誤，帳號將會被鎖定 30 分鐘！";
                               $url = "/";   $width=600; break;

            case "902" : echo "此帳號已經停用！";           $url = "/";   $width=400; break;
            case "903" : echo "請回到首頁重新登入！";   $url = "/";   $width=400; break;
            case "904" : echo "請正確輸入帳號或密碼！";   $url = "/";   $width=400; break;

            case "998" : echo "後台帳號密碼輸入錯誤！";  $url = "/backend";   $width=400; break;

            default:
            case "999" : echo "系統發生錯誤！請洽資訊組！"; $url = "/";   $width=400; break;
        }

                                                 ?>

    </p></div>

    <script>
        $(function () {
            $("#dialog").dialog({
                modal: true,
                width: <?php echo $width ?> ,
                buttons: {
                    "確認": function () {
                        $(this).dialog("close");
                        window.location.href = '<?php echo $url ?>';
                    }
                }
            });
        });
    </script>

</body>
</html>
