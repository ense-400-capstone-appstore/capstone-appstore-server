<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __('voyager::seeders.menu_items.dashboard'),
            'url' => '',
            'route' => 'voyager.dashboard',
        ]);
        $menuItem->fill([
            'target' => '_self',
            'icon_class' => 'voyager-home',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ])->save();


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __('voyager::seeders.menu_items.users'),
            'url' => '',
            'route' => 'voyager.users.index',
        ]);
        $menuItem->fill([
            'target' => '_self',
            'icon_class' => 'voyager-person',
            'color' => null,
            'parent_id' => null,
            'order' => 3,
        ])->save();


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Android Apps',
            'url' => '',
            'route' => 'voyager.android_apps.index',
        ]);
        $menuItem->fill([
            'target' => '_self',
            'icon_class' => 'voyager-basket',
            'color' => null,
            'parent_id' => null,
            'order' => 3,
        ])->save();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Categories',
            'url' => '',
            'route' => 'voyager.categories.index',
        ]);
        $menuItem->fill([
            'target' => '_self',
            'icon_class' => 'voyager-categories',
            'color' => null,
            'parent_id' => null,
            'order' => 4,
        ])->save();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Groups',
            'url' => '',
            'route' => 'voyager.groups.index',
        ]);
        $menuItem->fill([
            'target' => '_self',
            'icon_class' => 'voyager-people',
            'color' => null,
            'parent_id' => null,
            'order' => 5,
        ])->save();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __('voyager::seeders.menu_items.settings'),
            'url' => '',
            'route' => 'voyager.settings.index',
        ]);
        $menuItem->fill([
            'target' => '_self',
            'icon_class' => 'voyager-settings',
            'color' => null,
            'parent_id' => null,
            'order' => 14,
        ])->save();
    }
}
