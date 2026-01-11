<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BecomeSellerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         $user = $request->user();

        if ($user->isSeller()) {
            abort(403);
        }

        $user->update([
            'role' => 'seller',
        ]);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Kamu sekarang menjadi seller.');
    }
}
