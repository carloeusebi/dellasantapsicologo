<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PushSubscriptionsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'endpoint' => 'required',
            'keys.auth' => 'required',
            'keys.p256dh' => 'required',
        ]);

        $endpoint = $validated['endpoint'];
        $token = $validated['keys']['auth'];
        $key = $validated['keys']['p256dh'];

        Auth::user()->updatePushSubscription($endpoint, $key, $token);

        return response()->noContent();
    }
}
