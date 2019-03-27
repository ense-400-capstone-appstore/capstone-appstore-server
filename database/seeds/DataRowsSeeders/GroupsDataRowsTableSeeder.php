<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class GroupsDataRowsTableSeeder extends BaseDataRowsTableSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = DataType::where('slug', 'groups')->firstOrFail();

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

        $dataRow = $this->dataRow($dataType, 'private');
        $dataRow->fill([
            'type' => 'checkbox',
            'display_name' => 'Private (accessible by invite only)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 3,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'group_belongsto_user_relationship');
        $dataRow->fill([
            'type' => 'relationship',
            'display_name' => 'Owner',
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
                'column' => 'owner_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'users',
                'pivot' => 0,
            ],
            'order' => 4,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'owner_id');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Owner',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 5,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'group_belongstomany_user_relationship');
        $dataRow->fill([
            'type'         => 'relationship',
            'display_name' => 'Users',
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 0,
            'details'      => [
                'model'       => 'App\\User',
                'table'       => 'users',
                'type'        => 'belongsToMany',
                'column'      => 'id',
                'key'         => 'id',
                'label'       => 'name',
                'pivot_table' => 'group_user',
                'pivot'       => '1',
                'taggable'    => '0',
            ],
            'order'        => 6,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'group_belongstomany_android_app_relationship');
        $dataRow->fill([
            'type'         => 'relationship',
            'display_name' => 'Android Apps',
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 0,
            'details'      => [
                'model'       => 'App\\AndroidApp',
                'table'       => 'android_apps',
                'type'        => 'belongsToMany',
                'column'      => 'id',
                'key'         => 'id',
                'label'       => 'name',
                'pivot_table' => 'group_android_app',
                'pivot'       => '1',
                'taggable'    => '0',
            ],
            'order'        => 7,
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
            'order' => 8,
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
            'order' => 9,
        ])->save();
    }
}
