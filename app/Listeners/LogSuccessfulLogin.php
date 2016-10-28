<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        //IP
        $ip = $_SERVER['REMOTE_ADDR'];

        // Country
        $region_data = json_decode(file_get_contents("http://ipinfo.io/" . $ip . "/"));
        if (!empty($region_data->country)) {
            $country = $region_data->country;
        } else {
            $country = 'Not defined';
        }

        // Cookies
        $cookie = json_encode(Request::cookie());
        if (empty($cookie)) {
            $cookie = 'Not defined';
        }

        // Browser
        $user_agent = Request::header('User-Agent');
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
        else $browser = "Not defined";

        // Insert Data to DB
        DB::table('users_details')->insert([
            'ip' => $ip,
            'user_id' => Auth::user()->id,
            'browser' => $browser,
            'country' => $country,
            'cookies' => $cookie,
            'last_login' => Carbon::now()
        ]);
    }
}
