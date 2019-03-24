<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class UsersDataRowsTableSeeder extends BaseDataRowsTableSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = DataType::where('slug', 'users')->firstOrFail();

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

        $dataRow = $this->dataRow($dataType, 'email');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => __('voyager::seeders.data_rows.email'),
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 3,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'password');
        $dataRow->fill([
            'type' => 'password',
            'display_name' => __('voyager::seeders.data_rows.password'),
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => '',
            'order' => 4,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'remember_token');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => __('voyager::seeders.data_rows.remember_token'),
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 5,
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
            'order' => 6,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'user_belongsto_role_relationship');
        $dataRow->fill([
            'type' => 'relationship',
            'display_name' => 'Role',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'TCG\\Voyager\\Models\\Role',
                'table' => 'roles',
                'type' => 'belongsTo',
                'column' => 'role_id',
                'key' => 'id',
                'label' => 'display_name',
                'pivot_table' => 'roles',
                'pivot' => 0,
            ],
            'order' => 7,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'user_belongstomany_role_relationship');
        $dataRow->fill([
            'type' => 'hidden',
            'display_name' => 'Roles',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 8,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'user_belongstomany_group_relationship');
        $dataRow->fill([
            'type'         => 'relationship',
            'display_name' => 'Groups',
            'required'     => 0,
            'browse'       => 0,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 0,
            'details'      => [
                'model'       => 'App\\Group',
                'table'       => 'groups',
                'type'        => 'belongsToMany',
                'column'      => 'id',
                'key'         => 'id',
                'label'       => 'name',
                'pivot_table' => 'group_user',
                'pivot'       => '1',
                'taggable'    => '0',
            ],
            'order'        => 9,
        ])->save();


        $dataRow = $this->dataRow($dataType, 'user_belongstomany_android_app_relationship');
        $dataRow->fill([
            'type'         => 'relationship',
            'display_name' => 'Android Apps',
            'required'     => 0,
            'browse'       => 0,
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
                'pivot_table' => 'user_android_app',
                'pivot'       => '1',
                'taggable'    => '0',
            ],
            'order'        => 10,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'locale');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Locale',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 1,
            'delete' => 0,
            'details' => '',
            'order' => 11,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'settings');
        $dataRow->fill([
            'type' => 'hidden',
            'display_name' => 'Settings',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 12,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'role_id');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Role',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 13,
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
            'order' => 14,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'updated_at');
        $dataRow->fill([
            'type' => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.updated_at'),
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 15,
        ])->save();
    }
}
