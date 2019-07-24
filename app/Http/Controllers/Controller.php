<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Setting;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $title = Setting::where('constant', 'title')->pluck('value')->toArray();
        $title_value = $title[0];

        $facebook = Setting::where('constant', 'facebook')->pluck('value')->toArray();
        $facebook_value = $facebook[0];

        $twitter = Setting::where('constant', 'twitter')->pluck('value')->toArray();
        $twitter_value = $twitter[0];

        $instagram = Setting::where('constant', 'instgram')->pluck('value')->toArray();
        $instagram_value = $instagram[0];

        $countPosts = Setting::where('constant', 'countPosts')->pluck('value')->toArray();
        $countPosts_value = $countPosts[0];

        $countComments = Setting::where('constant', 'countComments')->pluck('value')->toArray();
        $countComments_value = $countComments[0];

        $siteTitle = Setting::where('constant', 'siteTitle')->pluck('value')->toArray();
        $siteTitle_value = $siteTitle[0];


        $data = [
            'title_value' => $title_value,
            'facebook' => $facebook_value,
            'twitter' => $twitter_value,
            'instagram' => $instagram_value,
            'countPosts'  => $countPosts_value,
            'countComments'=> $countComments_value,
            'siteTitle'=> $siteTitle_value
        ];
        View::share('data', $data);
    }
}
