<?php

namespace App\Http\Controllers;

use App\Models\ActionButton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ActionController extends Controller
{
    public function index()
    {
        $action_buttons = ActionButton::all();
        return view('dashboard.index', compact('action_buttons'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'action_name' => 'required',
            'action_path' => 'required',
        ]);
        $data = $request->except('_token');


        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('public/action_buton');
        }

        $create = ActionButton::create($data);
        if ($create) {
            return Redirect()->back()->with('success', 'New Action Button Addedd Successfully !');
        }
        return Redirect()->back()->with('error', 'Something is wrong');
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            ActionButton::find($request->id)->delete();
            return response()->json([
                'msg'=>1
            ]);
        }
    }

    public function open(Request $request)
    {
        if ($request->ajax()) {
            system("python D:\Neeraj\Toolx\public\assets\python\open.py $request->path");
        }
    }
}
