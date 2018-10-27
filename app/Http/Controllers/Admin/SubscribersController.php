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

    public function edit($id, Subscriber $subscriber)
    {
        $subscriber = $subscriber->findOrFail($id);

        return view('admin.subscribers.edit', compact('subscriber'));
    }

    public function update($id, Subscriber $subscriber, Request $request)
    {
        $subscriber = $subscriber->findOrFail($id);
        $rules = ['name' => 'required|min:2|max:255|string'];
        if ($request->email != $subscriber->email) {
            $rules['email'] = 'required|email|unique:subscribers';
        }
        $request->validate($rules);
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->is_subscribe = +$request->is_subscribe;
        $subscriber->save();

        return back()->with('success', 'successfully updated');
    }

    public function delete($id, Subscriber $subscriber)
    {
        $subscriber = $subscriber->findOrFail($id);
        $subscriber->delete();

        return back()->with(['success' => 'Subscriber was deleted']);
    }
}
