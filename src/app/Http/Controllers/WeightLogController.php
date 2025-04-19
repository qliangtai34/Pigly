<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Carbon\Carbon;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightRegisterRequest;

class WeightLogController extends Controller
{
    public function index()
    {
        $weightlogs = WeightLog::all();
        $latestweightlog = WeightLog::latest()->first();
        $weighttarget = WeightTarget::latest()->first();
        return view('index', compact('weightlogs', 'latestweightlog', 'weighttarget'));
    }

    public function add()
    {
       return view('add');
    }

    public function create(WeightLogRequest $request)
    {
        $form = $request->all();

        if (!$request->filled('date')) 
        {
            $form['date'] = Carbon::now()->toDateString();
        }

        WeightLog::create($form);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $weightlogs = WeightLog::find($request->weightLogId);
        return view('update', compact('weightlogs'));
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        WeightLog::find($request->weightLogId)->update($form);
        return redirect('/');
    }

    public function search(Request $request)
{
    $query = WeightLog::KeywordSearch($request->keyword);

    // from / to による日付範囲検索（date カラム前提）
    if ($request->filled('from') && $request->filled('to')) {
        $query->whereBetween('date', [
            $request->input('from'),
            $request->input('to')
        ]);
    }

    $weightlogs = $query->orderBy('date', 'desc')->get();
    $latestweightlog = WeightLog::latest()->first();

    return view('index', compact('weightlogs', 'latestweightlog'));
}

    public function weighttarget(Request $request)
    {
        $weighttarget = WeightTarget::first();
        return view('weighttarget', compact('weighttarget'));
    }
    
    public function weighttargetupdate(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        WeightTarget::find($request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
    WeightLog::find($request->weightLogId)->delete();
    return redirect('/')->with('message', 'Todoを削除しました');
    }


    public function weightregister(WeightRegisterRequest $request)
    {
        $form = $request->all();
        if (!$request->filled('date')) 
        {
            $form['date'] = Carbon::now()->toDateString();
        }
        WeightLog::create($form);
        WeightTarget::create($form);
        return redirect('/');
    } 


}
