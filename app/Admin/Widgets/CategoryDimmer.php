<?php
namespace App\Admin\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Admin\Widgets\BaseDimmer;
use App\Category;

class CategoryDimmer extends BaseDimmer
{
    /**
     * The Laravel model.
     *
     * @var mixed
     */
    protected $model = Category::class;

    /**
     * The Voyager icon to use for the widget.
     *
     * @var string
     */
    protected $icon = 'voyager-categories';

    /**
     * The singular display name for the model.
     *
     * @var string
     */
    protected $singular_display_name = 'Category';

    /**
     * The plural display name for the model.
     *
     * @var string
     */
    protected $plural_display_name = 'Categories';

    /**
     * The name of the database table for this Laravel model
     *
     * @var string
     */
    protected $database_table_name = 'categories';

    /**
     * The background image ID for this widget
     *
     * @var string
     */
    protected $widget_background_name = '03.jpg';
}
