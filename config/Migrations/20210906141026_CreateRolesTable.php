<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateRolesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('roles', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('code', 'string')
            ->addColumn('title', 'string')
            ->addColumn('description', 'string', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex('code', [
                'unique' => true,
                'name' => 'uniq_code'
            ])
            ->create();
    }
}
