<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_count = 10;
        $memos = Memo::paginate($page_count);
        return view('dashboard', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('memo.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $memo = new Memo;
        $memo->fill($request->all())->save();
        return redirect(route('dashboard'))->with('message', 'メモが登録されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Memo $memo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memo $memo)
    {
        $user = auth()->user();
        return view('memo.create', compact('user', 'memo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Memo $memo)
    {
        $memo->fill($request->all())->save();
        return redirect(route('dashboard'))->with('message', 'メモが更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();
        return redirect(route('dashboard'))->with('message', 'メモが削除されました。');
    }
}
