<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PushController extends Controller
{
    public function __invoke(Request $request)
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
    }
}
