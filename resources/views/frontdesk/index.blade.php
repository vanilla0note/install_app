<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8" />
    <title>喜憨兒基金會 雲端申請服務平台</title>

    <script src='jquery/jquery-1.12.4.min.js'></script>
    <script src="jquery/jquery-ui-1.12.1.js"></script>
    <script src="jquery/jquery.blockUI.js"></script>
    <link rel="stylesheet" href="jquery/jquery-ui-1.12.1.css" />

    <link rel="stylesheet" href="css/frontdesk/index.css" />

</head>
<body>

    <form action="{{ route('frontdesk.store') }}" method="POST" name="myForm1">
        @csrf

        <div id="caption">

            <div id="caption_header01">
                喜憨兒基金會&nbsp;&nbsp;&nbsp;&nbsp;雲端申請服務平台&nbsp;&nbsp;&nbsp;&nbsp;軟體安裝申請
                <hr style="border-top: 1px solid #b5b8b5;margin-top:0px;" />&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

            <div id="caption_header02">
                1. <b>非工作職務所需</b>、<b>非合法取得軟體</b>，無法安裝申請<br />
            </div>

        </div>

        <div id="content">

            <div id="content_profile">

                <fieldset id="content_profile_fieldset">

                    <legend>&nbsp;SETP 1.  申請人資料&nbsp;</legend>

                    <div id="content_profile_from">
                        申請區域：
                        <label for="dep_area_Taipei">台北</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="dep_area" id="dep_area_Taipei" value="Taipei" />

                        <label for="dep_area_Taoyuan">桃園</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="dep_area" id="dep_area_Taoyuan" value="Taoyuan" />

                        <label for="dep_area_Hsinchu">新竹</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="dep_area" id="dep_area_Hsinchu" value="Hsinchu" />

                        <label for="dep_area_Tainan">台南</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="dep_area" id="dep_area_Tainan" value="Tainan" />

                        <label for="dep_area_Kaohsiung">高雄</label>
                        <input type="radio" name="dep_area" id="dep_area_Kaohsiung" value="Kaohsiung" /><br />


                        申請人名：<input id="careus_name" name="careus_name" type="text" value="王大明" /><br />
                        員工帳號：<input id="careus_id" name="careus_id" type="text" onblur="this.value=this.value.toUpperCase()" maxlength="6" value="T08999" /><br />
                        連絡電話：<input id="careus_tel" name="careus_tel" type="text" placeholder=" 輸入公司連絡電話，請勿輸入中文字" value="02-23456789" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" /><br />
                        公司信箱：<input id="careus_mail" name="careus_mail" type="text" placeholder=" 輸入公司信箱的帳號" onblur="this.value=this.value.toLowerCase()" value="admin@admin.com" onkeyup="value=value.replace(/[\W]/g,'')" /> <br />
                        申請原因說明：<br />
                        <textarea id="" name="remark" placeholder=" 請簡述說明申請的原因">因工作需求，需要使用美術編輯軟體</textarea><br />

                    </div>

                </fieldset>

            </div>

            <div id="content_problem">

                <fieldset id="content_problem_fieldset">

                    <legend>&nbsp;SETP 2.  申請安裝軟體項目&nbsp;</legend>

                    <label for="radio-problem1">文書軟體（家系圖…）</label>&nbsp;&nbsp;
                    <input type="radio" name="problem" id="radio-problem1" value="p-office" />

                    <label for="radio-problem2">美術編輯軟體</label>&nbsp;&nbsp;
                    <input type="radio" name="problem" id="radio-problem2" value="p-adobe" />

                    <label for="radio-problem3">影音播放軟體</label>&nbsp;&nbsp;
                    <input type="radio" name="problem" id="radio-problem3" value="p-movie" />

                    <label for="radio-problem4">影音編輯軟體</label>&nbsp;&nbsp;
                    <input type="radio" name="problem" id="radio-problem4" value="p-director" />

                    <label for="radio-problem5">其它軟體</label>
                    <input type="radio" name="problem" id="radio-problem5" value="p-other" />

                </fieldset>

            </div>

        </div>

        <center>
            <div class="ui-button ui-corner-all form_con" onclick="form_run()">送出申請</div>
        </center>

    </form>

    <script src="javascript/frontdesk/index.js"></script>

</body>
</html>
