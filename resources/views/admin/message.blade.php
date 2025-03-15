<!DOCTYPE HTML>
<html>
<head>

    <meta charset="UTF-8">
    <title>喜憨兒基金會 雲端服務申請平台（後台管理）</title>

    <script src='../../../jquery/jquery-1.12.4.min.js'></script>
    <script src="../../../jquery/jquery-ui-1.12.1.js"></script>
    <script src="../../../jquery/jquery.blockUI.js"></script>
    <link rel="stylesheet" href="../../../jquery/jquery-ui-1.12.1.css">


    <link rel="stylesheet" href="../../../css/admin/bread.css">
    <link rel="stylesheet" href="../../../css/admin/message.css">

</head>

<body>
    <header id="page-header">
        <h1>喜憨兒基金會 雲端申請服務平台（軟體安裝處理）（後台管理）</h1>
    </header>

    <div id="page-main">

        <div id="bread">
            <a href="{{ route('admin.dashboard') }}" target="_parent">軟體安裝處理</a> >
            <a href="{{ route('admin.dashboard') }}" target="_parent">申請單處理</a> >
            <tt>{{ $message->id }}</tt>
        </div>

        <div id="result">
            <div id="result_title_all">申請人資料</div>

            <div class="result_title">申請日期</div>
            <div class="result_title">申請單區域</div>
            <div class="result_title">員工帳號</div>
            <div class="result_title">申請人大名</div>
            <div class="result_title">聯絡電話</div>
            <div class="result_title">公司信箱</div>

            <div class='result_txt'>{{ $message->date }}</div>
            @php
            $dep_areaText = [
                'Taipei'    => '台北',
                'Taoyuan'   => '桃園',
                'Hsinchu'   => '新竹',
                'Tainan'    => '台南',
                'Kaohsiung' => '高雄',
                'default'   => '未能辨識'
            ];
            @endphp
            <div class='result_txt'>{{ $dep_areaText[$message->dep_area] ?? $dep_areaText['default'] }}</div>
            <div class='result_txt'>{{ $message->careus_id }}</div>
            <div class='result_txt'>{{ $message->careus_name }}</div>
            <div class='result_txt'>{{ $message->careus_tel }}</div>
            <div class='result_txt'>{{ $message->careus_mail }}</div>

            <div class="space">&nbsp;</div>

            <div id="result_title_all2">申請單 執行處理</div>
            <div class="result_title">軟體安裝項目</div>
            <div class="result_title3">申請原因說明</div>
            <div class="result_title3">回信給申請人內容</div>

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
            <div class='result_txt' style='height:120px;line-height: 120px;'>{{ $problemText[$message->problem] ?? $problemText['default'] }}</div>

            <div class='result_txt3'>
                <textarea readonly style="border: 0px white;outline: none;">{{ $message->remark }}</textarea>
            </div>

            <div class='result_txt3'>
                <form action="{{ route('message.reply', $message->id) }}" method="POST" name="myForm_replies" id="myForm_replies">
                    @csrf
                    @forelse ($message->replies as $reply)
                    <textarea id="reply" name="reply">{{ $reply->content }}</textarea>
                    @empty
                    <textarea id="reply" name="reply"></textarea>
                    @endforelse
                </form>
                
            </div>
            <div class="result_title2">最後處理日期</div>
            <div class="result_title3">處理筆記(內部紀錄)</div>
            <div class="result_title2" style="width:196px;">處理人員</div>
            <div class="result_title2" style="width:196px;">單號狀態</div>

            <div class='result_txt2'>
                {{ empty($message->date2) ? '未有處理紀錄' : $message->date2 }}
            </div>

            <div class='result_txt3'>
                <form action="{{ route('message.note', $message->id) }}" method="POST" name="myForm_notes" id="myForm_notes">
                    @csrf
                    @forelse ($message->notes as $note)
                    <textarea id="note" name="note">{{ $note->content }}</textarea>
                    @empty
                    <textarea id="note" name="note"></textarea>
                    @endforelse
                </form>                
            </div>

            <div class='result_txt2' style="width:196px;line-height:120px;">&nbsp;</div>

            <div class='result_txt2' style="width:196px;">
                <form action="{{ route('message.updateState', $message->id) }}" method="POST" name="myForm_state" id="myForm_state">
                    @csrf
                    @method('PUT')<!-- 使用 PUT 進行更新 -->
                    <select name="state" id="state">
                        <option value="0" {{ $message->state == 0 ? 'selected' : '' }}>新建立</option>
                        <option value="1" {{ $message->state == 1 ? 'selected' : '' }}>處理中</option>
                        <option value="2" {{ $message->state == 2 ? 'selected' : '' }}>已結案</option>
                    </select>
                </form>
            </div>


            <div class="result_title3" style="width:555px;background-color:#FFF;">&nbsp;</div>
            <div class="result_title3">申請單執行項目</div>
            <div class="result_txt3" style="width:555px;background-color:#FFF;">&nbsp;</div>

            <div class='result_txt3' style="height:160px;line-height:20px;">
                <div style="float:left;padding:15px 0 0 30px"><input type="checkbox" name="CB_mail" value="true" checked /> 發送郵件通知申請人 <br /></div>
                <div style="float:left;padding:15px 0 0 80px"><div class='btn' onclick='order_edit()'>儲存變更</div></div>

                <form action="{{ route('admin.message.delete', $message->id) }}" method="POST" name="myForm_del">
                    @csrf
                    @method('DELETE')
                    <div style="float:left;padding:15px 0 0 80px"><div class='btn' onclick="order_del()">刪除本張申請單</div></div>
                </form>
            </div>

            <script src="../../../javascript/admin/message.js"></script>
        </div>


        
    </div>





</body>

</html>
