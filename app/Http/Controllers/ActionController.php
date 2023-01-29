<?php

namespace App\Http\Controllers;

use App\Models\ActionButton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

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

    public function update(Request $request)
    {
        $request->validate([
            'action_name' => 'required',
            'action_path' => 'required',
            'id' => 'required'
        ]);
        $btn = ActionButton::find($request->id);
        $data = $request->except('_token', 'id');
        if ($request->hasFile('img')) {

            if (!is_null($btn->img)) {
                $img = storage_path('app/' . $btn->img);
                if (file_exists($img)) {
                    unlink($img);
                }
            }
            $data['img'] = $request->file('img')->store('public/action_buton');
        }
        ActionButton::where('id', $request->id)->update($data);
        return Redirect()->back()->with('success', 'Action Button Updated Successfully !');
    }

    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $btn = ActionButton::find($request->id);

            $data = [
                'html' => View::make('components.editform', [
                    'action_name' => $btn->action_name,
                    'action_path' => $btn->action_path,
                    'id' => $btn->id
                ])->render()
            ];
            return response()->json($data);
        }
    }


    public function delete(Request $request)
    {
        if ($request->ajax()) {
            ActionButton::find($request->id)->delete();
            return response()->json([
                'msg' => 1
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
