<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    /**
     * Show all subscribers.
     *
     * @param Subscriber $subscriber
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Subscriber $subscriber)
    {
        return view('admin.subscribers.all', ['subscribers' => $subscriber->paginate(20)]);
    }

    public function create()
    {
        return view('admin.subscribers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
            'name' => 'required|min:2|max:255|string'
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->name = $request->name;
        $subscriber->is_subscribe = +$request->is_subscribe;
        $subscriber->url_key = str_random();
        $subscriber->save();

        return redirect()->route('admin.subscribers.all')->with('success', 'successfully created');
    }
}
