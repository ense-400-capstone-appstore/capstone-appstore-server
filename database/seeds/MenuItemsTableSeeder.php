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
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __('voyager::seeders.menu_items.users'),
            'url' => '',
            'route' => 'voyager.users.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => null,
                'parent_id' => null,
                'order' => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Android Apps',
            'url' => '',
            'route' => 'voyager.android_apps.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-basket',
                'color' => null,
                'parent_id' => null,
                'order' => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __('voyager::seeders.menu_items.settings'),
            'url' => '',
            'route' => 'voyager.settings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => null,
                'parent_id' => null,
                'order' => 14,
            ])->save();
        }
    }
}
