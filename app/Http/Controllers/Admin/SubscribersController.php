<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subscriber $subscriber)
    {
        return view('admin.subscribers.all', ['subscribers' => $subscriber->paginate(20)]);
    }
}
