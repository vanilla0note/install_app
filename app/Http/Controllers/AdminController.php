<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['login' => '帳號或密碼錯誤']);
    }

    public function dashboard()
    {
        //$messages = Message::latest()->get();
        //return view('admin.dashboard', compact('messages'));

        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.dashboard', compact('messages'));
    }

    public function showMessage($id)
    {
        $message = Message::with('replies')->findOrFail($id);
        $message = Message::with('notes')->findOrFail($id);
        return view('admin.message', compact('message'));
    }

    public function delete($id)
    {
        Message::destroy($id);
        return redirect()->route('admin.dashboard')->with('success', '留言已刪除');
    }

}
