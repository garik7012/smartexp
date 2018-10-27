<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscribersController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
            'name' => 'required|min:2|max:255|string'
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->name = $request->name;
        $subscriber->url_key = str_random();
        $subscriber->save();

        return view('subscriber.successful', compact('subscriber'));
    }

    public function management($id = '', $key = '')
    {
        $subscriber = Subscriber::where('url_key', $key)
            ->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-3 months')))
            ->findOrFail($id);

        return view('subscriber.cabinet', compact('subscriber'));
    }

    public function subscribeToggle($id, $key)
    {
        $subscriber = Subscriber::where('url_key', $key)->findOrFail($id);
        $subscriber->is_subscribe = !$subscriber->is_subscribe;
        $subscriber->save();

        return back()->with(['success' => true]);
    }
}
