<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subscriber;
use App\Mail\subscribedOk;

class SubscriptionController extends Controller {

    public function subscribe(Request $request) {

        if ($request->input('email') == null) {
            return redirect('/');
        }

        $email = $request->input('email');

        $subscriber = subscriber::withTrashed()->where('email', '=', $email)->firstOr(function () {
            return null;
        });

        if ($subscriber !== null) {

            $subscriber->restore();
            //$this->sendNotification($email);
            return "SF000";
        } else {

            $data['email'] = $email;
            $newSubscriber = new subscriber($data);

            if ($newSubscriber->save()) {
                //$this->sendNotification($email);
                return "SF000";
            }
        }

        return "SF255";
    }

    public function unsubscribe(Request $request) {

        if ($request->method() === 'GET') {
            return view('unsubscribe');
        }

        $email = $request->input('email');

        $subscriber = subscriber::where('email', '=', $email)->firstOr(function () {
            return null;
        });
        if ($subscriber !== null) {
            if ($subscriber->delete()) {
                return "SF002";
            }
        } else {
            return "SF254";
        }

        return "SF255";
    }
    
    private function sendNotification($email) {
        
        Mail::to($email)->send(new subscribedOk());
        
    }

}
