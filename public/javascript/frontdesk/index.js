//problem radio 選項
var p = ['#radio-problem1',
         '#radio-problem2', 
         '#radio-problem3', 
         '#radio-problem4', 
         '#radio-problem5'];


$(document).ready(function () {

    $("input[type='radio']").checkboxradio({
        icon: false
    });

    $("input[type='checkbox']").checkboxradio();

});


function form_run() {

    // 執行需填寫欄位檢查
    $("#content_profile_fieldset").css('border', '2px solid #999');
    $("#content_problem_fieldset").css('border', '2px solid #999');


    if (!$("input[name='dep_area']:checked").val()) {
        $("#content_profile_fieldset").css('border', '3px solid red');

        $("#dialog").remove();
        $("body").append(
            "<div id='dialog' title='喜憨兒基金會　雲端申請服務平台'>" +
            "<div id='container' style='width:320px; height:80px; margin:30px auto 0 ;font-size:20px;'>請選擇申請區域！</div>" +
            "</div >");
        $("#dialog").dialog({
            modal: false,
            width: 400,
            height: 250,
            buttons: {
                "關閉視窗": function () {
                    $(this).dialog("close");
                }
            }
        });

    }
    else if ($("#careus_name").val() == "" || $("#careus_id").val() == "" || $("#careus_tel").val() == "" || $("#careus_mail").val() == "" || $("#remark").val() == "") {
        $("#content_profile_fieldset").css('border', '3px solid red');

        $("#dialog").remove();
        $("body").append(
            "<div id='dialog' title='喜憨兒基金會　雲端申請服務平台'>" +
            "<div id='container' style='width:320px; height:80px; margin:30px auto 0 ;font-size:20px;'>請將申請人資料填寫完整！</div>" +
            "</div >");
        $("#dialog").dialog({
            modal: false,
            width: 400,
            height: 250,
            buttons: {
                "關閉視窗": function () {
                    $(this).dialog("close");
                }
            }
        });
    }
    else if (!$("input[name='problem']:checked").val()) {
        $("#content_problem_fieldset").css('border', '3px solid red');

        $("#dialog").remove();
        $("body").append(
            "<div id='dialog' title='喜憨兒基金會　雲端申請服務平台'>" +
            "<div id='container' style='width:320px; height:80px; margin:30px auto 0 ;font-size:20px;'>請選擇申請安裝的軟體！</div>" +
            "</div >");
        $("#dialog").dialog({
            modal: false,
            width: 400,
            height: 250,
            buttons: {
                "關閉視窗": function () {
                    $(this).dialog("close");
                }
            }
        });
    }
    else {

        $.blockUI({
            message: '申請單送出中，請稍候！',
            css: {
                border: 'none',
                padding: '15px',
                'text-align': 'center',
                'font-size': '25px',
                'font-family': 'Microsoft JhengHei',

                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'


            }
        });

        //setTimeout($.unblockUI, 3000);

        //myForm1.action = "install_execution.php";
        myForm1.submit();

    }
}
