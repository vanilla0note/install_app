<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>喜憨兒基金會 雲端服務申請平台（後台管理）</title>

    <script src='../jquery/jquery-1.12.4.min.js'></script>
    <script src='../jquery/jquery-ui-1.12.1.js'></script>
    <script src='../jquery/jquery.blockUI.js'></script>
    <link rel='stylesheet' href='../jquery/jquery-ui-1.12.1.css'>

    <link rel="stylesheet" href="../css/admin/login.css">

</head>

<body>

    <div id="page-main">

        <form action="{{ route('admin.auth') }}" method="post" name="myForm1">
            @csrf
            <div id="login_title">
                <div class="login_title1">喜憨兒基金會 雲端服務申請平台（後台管理）</div>
            </div>

            <div id="login_content">
                <div class="login_con1">
                    <div>帳號<input type="text" name="email" value="admin" required ></div>
                </div>

                <div class="login_con1">
                    <div>密碼<input type="password" name="password" value="admin" required ></div>

                </div>

                <center>
                    <button class="ui-button ui-corner-all login_con2" onclick="login_run()">
                        登入
                    </button>                    
                </center>
            </div>

        </form>

        <script src="../javascript/admin/login.js"></script>

    </div>

</body>

</html>
