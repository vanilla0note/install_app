<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Note;
use App\Models\Message;

class ReplyController extends Controller
{
    //管理員回覆
    public function storeReply(Request $request, $messageId)
    {
        //測試取得回傳資料
        //dd($request->all());

        //01. 驗證資料
        $request->validate(['reply' => 'required']);


        //02. 寫入回覆
        // 找出是否已有回覆
        $reply = Reply::where('message_id', $messageId)->first();

        if ($reply) {
            // 若回覆已存在，則更新
            $reply->update([
                'content' => $request->reply
                ]);
        }
        else{
            // 若沒有回覆，則建立新回覆
            Reply::create([
                'message_id' => $messageId,
                'content' => $request->reply
                ]);
        }


        //03. 返回dashboard頁面並顯示成功訊息
        //return back()->with('success', '回覆成功');
        return redirect()->route('admin.dashboard')->with('success', '回覆成功');
    }

    //管理員備註筆記
    public function storeNote(Request $request, $messageId)
    {
        //測試取得回傳資料
        //dd($request->all());

        //01. 驗證資料
        $request->validate(['note' => 'required']);


        //02. 寫入備註
        // 找出是否已有備註
        $note = Note::where('message_id', $messageId)->first();

        if ($note) {
            // 若回覆已存在，則更新
            $note->update([
                'content' => $request->note
                ]);
        }
        else{
            // 若沒有回覆，則建立新回覆
            Note::create([
                'message_id' => $messageId,
                'content' => $request->note
                ]);
        }


        //03. 返回dashboard頁面並顯示成功訊息
        return redirect()->route('admin.dashboard')->with('success', '備註筆記成功');

    }

    //更新單號狀態
    public function storeUpdateState(Request $request, $messageId)
    {
        //測試取得回傳資料
        //dd($request->all());

        //01. 驗證資料 (確保 state 為 0, 1, 2)
        $request->validate([
            'state' => 'required|in:0,1,2',
        ]);


        //02. 找到 Message 並更新 state
        $message = Message::findOrFail($messageId);
        $message->state = $request->state;
        $message->save();


        //03. 返回dashboard頁面並顯示成功訊息
        return redirect()->route('admin.dashboard')->with('success', '狀態更新成功');
    }
}
