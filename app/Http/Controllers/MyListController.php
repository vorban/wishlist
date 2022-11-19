<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class MyListController extends Controller
{
    public function show(Request $request)
    {
        return view('pages.my-list.page', ['user' => $request->user()]);
    }

    public function add(Request $request)
    {
        return view('pages.my-list.add', ['user' => $request->user()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'price' => 'required|numeric',
            'description' => 'string|nullable',
        ]);

        $data['user_id'] = $request->user()->id;
        $data['buyer_id'] = null;
        $data['description'] = $data['description'] ?? '';

        Item::create($data);

        return redirect()->route('my-list.show');
    }

    public function delete(Request $request, $id)
    {
        Item::query()->where('id', $id)->delete();

        return redirect()->route('my-list.show');
    }
}
