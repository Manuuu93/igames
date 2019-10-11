<?php

use Phinx\Migration\AbstractMigration;

class CreatePlayersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('players');
        $table->addColumn('name', 'string')
            ->addColumn('birthday', 'datetime')
            ->addColumn('team_id', 'integer')
            ->addForeignKey(['team_id'],
                'teams',
                'id',
                ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION', 'constraint' => 'player_team_id']
            )
            ->save();
    }

    public function down()
    {
        $table = $this->table('players');
        $table->dropForeignKey('team_id')->drop()->save();
    }
}
