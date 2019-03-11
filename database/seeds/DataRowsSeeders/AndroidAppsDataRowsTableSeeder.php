<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class AndroidAppsDataRowsTableSeeder extends BaseDataRowsTableSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = DataType::where('slug', 'android_apps')->firstOrFail();

        $dataRow = $this->dataRow($dataType, 'id');
        $dataRow->fill([
            'type' => 'number',
            'display_name' => __('voyager::seeders.data_rows.id'),
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 1,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'name');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => __('voyager::seeders.data_rows.name'),
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 2,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'description');
        $dataRow->fill([
            'type' => 'markdown_editor',
            'display_name' => 'Description',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 3,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'version');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Version',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => '1.0.0',
            ],
            'order' => 4,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'price');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Price',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => '0',
            ],
            'order' => 5,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'package_name');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Package Name',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 6,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'android_app_belongsto_user_relationship');
        $dataRow->fill([
            'type' => 'relationship',
            'display_name' => 'Creator',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\User',
                'table' => 'users',
                'type' => 'belongsTo',
                'column' => 'creator_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'users',
                'pivot' => 0,
            ],
            'order' => 7,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'android_app_belongstomany_category_relationship');
        $dataRow->fill([
            'type' => 'relationship',
            'display_name' => 'Categories',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Category',
                'table' => 'categories',
                'type' => 'belongsToMany',
                'column' => 'id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'category_android_app',
                'pivot' => 1,
            ],
            'order' => 7,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'avatar');
        $dataRow->fill([
            'type' => 'image',
            'display_name' => __('voyager::seeders.data_rows.avatar'),
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 8,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'created_at');
        $dataRow->fill([
            'type' => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.created_at'),
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 9,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'updated_at');
        $dataRow->fill([
            'type' => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.updated_at'),
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 10,
        ])->save();
    }
}
