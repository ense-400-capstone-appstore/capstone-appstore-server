<?php
namespace App\Admin\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer as VoyagerBaseDimmer;

class BaseDimmer extends VoyagerBaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * The Laravel model.
     *
     * @var mixed
     */
    protected $model = null;

    /**
     * The singular display name for the model.
     *
     * @var string
     */
    protected $singular_display_name = 'Model';

    /**
     * The plural display name for the model.
     *
     * @var string
     */
    protected $plural_display_name = 'Models';

    /**
     * The name of the database table for this Laravel model
     *
     * @var string
     */
    protected $database_table_name = 'models';

    /**
     * The background image name for this widget
     *
     * @var string
     */
    protected $widget_background_name = '01.jpg';

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = $this->model::count();
        $string = $count == 1
            ? $this->singular_display_name
            : $this->plural_display_name;

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-basket',
            'title' => "{$count} {$string}",
            'text' => "You have {$count} {$string} in your database.",
            'button' => [
                'text' => "View all {$this->plural_display_name}",
                'link' => route("voyager.{$this->database_table_name}.index"),
            ],
            'image' => voyager_asset("images/widget-backgrounds/{$this->widget_background_name}"),
        ]));
    }
    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', $this->model);
    }
}
