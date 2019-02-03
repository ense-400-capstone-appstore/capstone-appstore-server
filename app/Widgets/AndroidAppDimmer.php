<?php
namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\AndroidApp;

class AndroidAppDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = AndroidApp::count();
        $string = trans_choice('voyager::dimmer.user', $count);
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-basket',
            'title' => "{$count} Android Apps",
            'text' => "You have {$count} Android Apps in your database.",
            'button' => [
                'text' => 'View all Android Apps',
                'link' => route('voyager.android_apps.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }
    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', AndroidApp::class);
    }
}
