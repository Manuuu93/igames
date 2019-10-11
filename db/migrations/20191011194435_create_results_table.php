<?php

use Phinx\Migration\AbstractMigration;

class CreateResultsTable extends AbstractMigration
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
        $table = $this->table('results');
        $table->addColumn('champ_id', 'integer')
            ->addColumn('team_id', 'integer')
            ->addColumn('points', 'integer')
            ->addForeignKey(['champ_id'],
                'championships',
                'id',
                ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION', 'constraint' => 'result_champ_id']
            )
            ->addForeignKey(['team_id'],
                'teams',
                'id',
                ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION', 'constraint' => 'result_team_id']
            )
            ->create();
    }

    public function down()
    {
        $table = $this->table('results');
        $table->dropForeignKey('team_id')->dropForeignKey('champ_id')->drop()->save();
    }
}
