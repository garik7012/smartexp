<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscribersController extends Controller
{
    /**
     * subscribe form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * create and subscribe
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * show subscriber's cabinet
     * @param string $id
     * @param string $key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function management($id = '', $key = '')
    {
        $subscriber = Subscriber::where('url_key', $key)
            ->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-3 months')))
            ->findOrFail($id);
        $subscriber->file_link = str_random();
        $subscriber->save();

        return view('subscriber.cabinet', compact('subscriber'));
    }

    /**
     * change subscribe status
     * @param $id
     * @param $key
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribeToggle($id, $key)
    {
        $subscriber = Subscriber::where('url_key', $key)->findOrFail($id);
        $subscriber->is_subscribe = !$subscriber->is_subscribe;
        $subscriber->save();

        return back()->with(['success' => true]);
    }

    /**
     * get File
     * @param $id
     * @param $link
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function getFile($id, $link)
    {
        $subscriber = Subscriber::where('file_link', $link)->findOrFail($id);
        $subscriber->file_link = '';
        $subscriber->save();

        return response()->download(storage_path('app/any.txt'));
    }
}
