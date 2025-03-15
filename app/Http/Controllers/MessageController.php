<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('replies')->latest()->get();
        return view('frontdesk.index', compact('messages'));

        //$messages = Message::orderBy('created_at', 'desc')->paginate(10);
        //return view('frontdesk.index', compact('messages'));
    }

    public function store(Request $request)
    {
        //欄位驗證
        //$request->validate([]);

        //時間設定
        $date = date("Y-m-d");

        //預計結案日期
        if (date("w") == 3)
            $deadline = date("Y-m-d", time() + 432000);
        else if (date("w") == 4)
            $deadline = date("Y-m-d", time() + 518400);
        else if (date("w") == 5)
            $deadline = date("Y-m-d", time() + 432000);
        else
            $deadline = date("Y-m-d", time() + 259200);


        //合併額外的欄位
        $request->merge([
            'date'     => $date,
            'date2'    => '',
            'state'    => '0',
            'reply'    => '',
            'staff'    => '',
            'note'     => '',
            'deadline' => $deadline
        ]);
        // 使用 create() 儲存資料
        Message::create($request->all());


        //dd($request->all());

        //return redirect()->route('frontdesk.index')->with('success', '留言成功');
        return redirect('/dialog');
    }
}

