<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $userDataType = DataType::where('slug', 'users')->firstOrFail();
        $menuDataType = DataType::where('slug', 'menus')->firstOrFail();
        $roleDataType = DataType::where('slug', 'roles')->firstOrFail();
        $androidAppDataType = DataType::where('slug', 'android_apps')->firstOrFail();

        $dataRow = $this->dataRow($userDataType, 'id');
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

        $dataRow = $this->dataRow($userDataType, 'name');
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

        $dataRow = $this->dataRow($userDataType, 'email');
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

        $dataRow = $this->dataRow($userDataType, 'password');
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

        $dataRow = $this->dataRow($userDataType, 'remember_token');
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

        $dataRow = $this->dataRow($userDataType, 'created_at');
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
            'order' => 6,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'updated_at');
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
            'order' => 7,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'avatar');
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

        $dataRow = $this->dataRow($userDataType, 'user_belongsto_role_relationship');
        $dataRow->fill([
            'type' => 'relationship',
            'display_name' => __('voyager::seeders.data_rows.role'),
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
            'order' => 10,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'locale');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => 'Locale',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => '',
            'order' => 12,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'settings');
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
            'order' => 13,
        ])->save();

        $dataRow = $this->dataRow($menuDataType, 'id');
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

        $dataRow = $this->dataRow($menuDataType, 'name');
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

        $dataRow = $this->dataRow($menuDataType, 'created_at');
        $dataRow->fill([
            'type' => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.created_at'),
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 3,
        ])->save();

        $dataRow = $this->dataRow($menuDataType, 'updated_at');
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
            'order' => 4,
        ])->save();

        $dataRow = $this->dataRow($roleDataType, 'id');
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

        $dataRow = $this->dataRow($roleDataType, 'name');
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

        $dataRow = $this->dataRow($roleDataType, 'created_at');
        $dataRow->fill([
            'type' => 'timestamp',
            'display_name' => __('voyager::seeders.data_rows.created_at'),
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '',
            'order' => 3,
        ])->save();

        $dataRow = $this->dataRow($roleDataType, 'updated_at');
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
            'order' => 4,
        ])->save();

        $dataRow = $this->dataRow($roleDataType, 'display_name');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => __('voyager::seeders.data_rows.display_name'),
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 5,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'role_id');
        $dataRow->fill([
            'type' => 'text',
            'display_name' => __('voyager::seeders.data_rows.role'),
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 9,
        ])->save();

        $dataRow = $this->dataRow($androidAppDataType, 'id');
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

        $dataRow = $this->dataRow($androidAppDataType, 'name');
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

        $dataRow = $this->dataRow($androidAppDataType, 'description');
        $dataRow->fill([
            'type' => 'markdown_editor',
            'display_name' => 'Description',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 3,
        ])->save();

        $dataRow = $this->dataRow($androidAppDataType, 'price');
        $dataRow->fill([
            'type' => 'number',
            'display_name' => 'Price',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 4,
        ])->save();

        $dataRow = $this->dataRow($androidAppDataType, 'avatar');
        $dataRow->fill([
            'type' => 'image',
            'display_name' => __('voyager::seeders.data_rows.created_at'),
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 5,
        ])->save();

        $dataRow = $this->dataRow($androidAppDataType, 'created_at');
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
            'order' => 6,
        ])->save();

        $dataRow = $this->dataRow($androidAppDataType, 'updated_at');
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
            'order' => 7,
        ])->save();
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }
}
