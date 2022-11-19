<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserForSelect;
use App\Models\Item;
use App\Models\User;
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

    public function access(Request $request)
    {
        return view('pages.my-list.access', ['user' => $request->user()]);
    }

    public function setAccess(Request $request)
    {
        ['users' => $ids] = $request->validate([
            'users' => 'required|array',
        ]);

        /** @var User */
        $user = $request->user();
        $user->allowing()->attach($ids);

        return redirect()->back();
    }

    public function revoke(Request $request, $id)
    {
        /** @var User */
        $user = $request->user();
        $user->allowing()->detach($id);

        return redirect()->back();
    }

    public function users(Request $request)
    {
        ['search' => $search] = $request->validate(['search' => 'sometimes|string|nullable']);
        $search = $search ?? '';

        /** @var User */
        $user = $request->user();

        $users = User::query()
            ->where(function ($query) use ($search) {
                $query->where('email', 'like', sprintf('%%%s%%', $search))
                    ->orWhere('name', 'like', sprintf('%%%s%%', $search));
            })
            ->where('id', '!=', $request->user()->id)
            ->whereNotIn('id', $user->allowing()->pluck('allowed_id'))
            ->limit(10)
            ->orderBy('name')
            ->get();

        return UserForSelect::collection($users);
    }
}
