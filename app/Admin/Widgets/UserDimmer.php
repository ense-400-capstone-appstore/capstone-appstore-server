<?php
namespace App\Admin\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\User;

class UserDimmer extends BaseDimmer
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
        $count = User::count();
        $string = $count == 1 ? 'User' : 'Users';
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-people',
            'title' => "{$count} {$string}",
            'text' => "You have {$count} {$string} in your database.",
            'button' => [
                'text' => 'View all Users',
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }
    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', User::class);
    }
}
