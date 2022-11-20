<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function show(Request $request)
    {
        return view('pages.list', ['user' => $request->user()]);
    }

    public function buy(Request $request, $id)
    {
        /** @var User */
        $user = $request->user();

        $item = Item::query()->find($id);
        if ($item->buyer_id) {
            return redirect()->back()->with('status', 'Already bought');
        }
        $item->buyer_id = $user->id;
        $item->save();

        return redirect()->back();
    }
}
