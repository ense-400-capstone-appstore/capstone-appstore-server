<?php
namespace App\Admin\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Admin\Widgets\BaseDimmer;
use App\AndroidApp;

class AndroidAppDimmer extends BaseDimmer
{
    /**
     * The Laravel model.
     *
     * @var mixed
     */
    protected $model = AndroidApp::class;

    /**
     * The singular display name for the model.
     *
     * @var string
     */
    protected $singular_display_name = 'Android App';

    /**
     * The plural display name for the model.
     *
     * @var string
     */
    protected $plural_display_name = 'Android Apps';

    /**
     * The name of the database table for this Laravel model
     *
     * @var string
     */
    protected $database_table_name = 'android_apps';

    /**
     * The background image ID for this widget
     *
     * @var string
     */
    protected $widget_background_name = '02.jpg';
}
