<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言管理 - 詳細內容</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">留言詳細內容</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $message->careus_name }}</h5>
            <p class="card-text">{{ $message->content }}</p>
            <p><strong>留言時間：</strong>{{ $message->created_at }}</p>

            <!-- 顯示管理員回覆 -->
            @if($message->replies->count())
                <hr>
                <h5>管理員回覆</h5>
                <p>{{ $message->replies->last()->content }}</p>
            @endif

            <hr>

            <!-- 回覆表單 -->
            <h5>回覆留言</h5>
            <form action="{{ url('admin/message/'.$message->id.'/reply') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">送出回覆</button>
            </form>

            <hr>

            <!-- 刪除留言 -->
            <form action="{{ route('admin.message.delete', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('確定刪除留言？')">刪除留言</button>
            </form>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">返回留言列表</a>
        </div>
    </div>
</div>
</body>
</html>
