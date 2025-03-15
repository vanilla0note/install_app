<!DOCTYPE HTML>
<html>
<head>

    <meta charset="UTF-8">
    <title>喜憨兒基金會 雲端服務申請平台（後台管理）</title>


    <script src='../jquery/jquery-1.12.4.min.js'></script>
    <script src='../jquery/jquery-ui-1.12.1.js'></script>
    <script src='../jquery/jquery.blockUI.js'></script>
    <link rel='stylesheet' href='../jquery/jquery-ui-1.12.1.css' />

    <link rel="stylesheet" href="../css/admin/bread.css" />

    <link rel="stylesheet" href="../css/admin/dashboard.css" />

</head>


<body>

    <header id="page-header">
        <h1>喜憨兒基金會 雲端申請服務平台（軟體安裝處理）（後台管理）</h1>
    </header>

    <div id="page-main">

        <div class='result_title'>單號</div>
        <div class='result_title2'>申請日期</div>
        <div class='result_title2'>員工代號</div>
        <div class='result_title2'>申請人姓名</div>
        <div class='result_title2'>申請項目</div>
        <div class='result_title2'>申請單狀態</div>
        <div class='result_title2'>結案人員</div>
        <div class='result_title2'>動作</div>

        <!-- 顯示搜尋結果：申請單內容 -->
        @foreach ($messages as $message)
        <div class='result_txt'>{{ $message->id }}</div>
        <div class='result_txt2'>{{ $message->date }}</div>
        <div class='result_txt2'>{{ $message->careus_id }}</div>
        <div class='result_txt2'>{{ $message->careus_name }}</div>

        @php
        $problemText = [
            'p-office' => '文書軟體',
            'p-adobe' => '美術編輯',
            'p-movie' => '影音播放',
            'p-director' => '影音編輯',
            'p-other' => '其他軟體',
            'default' => '未能辨識'
        ];
        @endphp
        <div class='result_txt2'>{{ $problemText[$message->problem] ?? $problemText['default'] }}</div>

        @php
        $stateText = [
            '0' => "新建立",
            '1' => '處理中',
            '2' => '已完成',
            'default' => '不明狀態'
        ];
        $stateStyle = [
            '0' => "color:#FF0000;font-weight:bold;",
            '1' => 'color:#67b3ed;font-weight:bold;',
            '2' => 'color:#9e9fa0;',
            'default' => ''
        ];
        @endphp
        <div class='result_txt2' style="{{ $stateStyle[$message->state] ?? $statusStyle['default'] }}">
            {{ $stateText[$message->state] ?? $statusText['default'] }}
        </div>

        <div class='result_txt2'>{{ $message->staff }}</div>
        <div class='result_txt2'><a href="{{ route('admin.message.reply', $message->id) }}" class="btn">處理</a></div>


        @endforeach
        <!------------------------------>

    </div>


    <!-- 顯示分頁按鈕 -->
    <div> {{ $messages->links() }}</div>

</body>


</html>


