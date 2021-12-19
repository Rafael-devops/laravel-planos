<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function __contruct(){

        $this->middleware(['auth']);

    }

    public function index(){

        return view('subscriptions.index');

    }

    public function store(Request $request){

        $request->user()
        ->newSubscriptions('default', 'price_1K8NIgFBCPPC0fzMMokLjCkA')
        ->create($request->token);

        return redirect()->route('subscriptions.premium');

    }
    
    public function premium(){

        return view('subscriptions.premium');

    }
}
