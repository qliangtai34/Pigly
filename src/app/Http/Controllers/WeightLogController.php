<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightRegisterRequest;

class WeightLogController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $weightlogs = WeightLog::where('user_id', $user->id)->orderBy('date', 'desc')->paginate(8);
        $latestweightlog = WeightLog::where('user_id', $user->id)->latest('date')->first();
        $weighttarget = WeightTarget::where('user_id', $user->id)->latest()->first();

        return view('index', compact('weightlogs', 'latestweightlog', 'weighttarget'));
    }

    public function add()
    {
        return view('add');
    }

    public function create(WeightLogRequest $request)
    {
        $form = $request->all();
        $form['user_id'] = Auth::id();

        if (!$request->filled('date')) {
            $form['date'] = Carbon::now()->toDateString();
        }

        WeightLog::create($form);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $weightlogs = WeightLog::where('id', $request->weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('update', compact('weightlogs'));
    }

    public function update(WeightLogRequest $request)
    {
        $weightlog = WeightLog::where('id', $request->weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $form = $request->all();
        unset($form['_token']);
        $weightlog->update($form);

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $weightlog = WeightLog::where('id', $request->weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $weightlog->delete();

        return redirect('/')->with('message', '記録を削除しました');
    }

    public function search(Request $request)
    {
        $query = WeightLog::where('user_id', Auth::id());

        if (!empty($request->keyword)) {
            $query->where('date', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('date', [
                $request->input('from'),
                $request->input('to')
            ]);
        }

        $weightlogs = $query->orderBy('date', 'desc')->get();
        $latestweightlog = WeightLog::where('user_id', Auth::id())->latest()->first();
        $weighttarget = WeightTarget::where('user_id', Auth::id())->latest()->first();

        return view('index', compact('weightlogs', 'latestweightlog', 'weighttarget'));
    }

    public function weighttarget(Request $request)
    {
        $weighttarget = WeightTarget::where('user_id', Auth::id())->first();
        return view('weighttarget', compact('weighttarget'));
    }

    public function weighttargetupdate(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $weighttarget = WeightTarget::where('id', $request->id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $weighttarget->update($form);
        return redirect('/');
    }

    public function weightregister(WeightRegisterRequest $request)
    {
        $form = $request->all();
        $form['user_id'] = Auth::id();

        if (!$request->filled('date')) {
            $form['date'] = Carbon::now()->toDateString();
        }

        WeightLog::create($form);
        WeightTarget::create($form);

        return redirect('/');
    }
}
