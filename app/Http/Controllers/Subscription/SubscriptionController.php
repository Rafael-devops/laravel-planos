<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __contruct(){

        $this->middleware(['auth']);

    }

    public function index(){

        if(auth()->user()->subscribed('defalut'))
            return redirect()->route('subscriptions.premium');
        return view('subscriptions.index', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);

    }

    public function store(Request $request){

        $request->user()
        ->newSubscriptions('default', 'price_1K8NIgFBCPPC0fzMMokLjCkA')
        ->create($request->token);

        return redirect()->route('subscriptions.premium');

    }
    
    public function premium(){

        if(!auth()->user()->subscribed('defalut'))
            return redirect()->route('subscriptions.checkout');

        return view('subscriptions.premium');

    }
}
