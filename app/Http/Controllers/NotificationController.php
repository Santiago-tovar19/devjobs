<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;

        auth()->user()->unreadNotifications->markAsRead();
        return view('notificaciones.index',[
            'notificaciones' => $notificaciones
        ]);
    }
}
