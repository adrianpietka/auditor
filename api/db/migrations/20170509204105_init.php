<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Init extends AbstractMigration
{
    public function change()
    {
        $this->createUserTable();
        $this->createProjectTable();
        $this->createFileContentTable();
        $this->createFileTable();
        $this->createCommentTable();
    }

    private function createUserTable()
    {
        $this->table('user')
            ->addColumn('login', 'string', ['limit' => 100])
            ->addColumn('display_name', 'string', ['limit' => 100])
            ->save();
    }

    private function createProjectTable()
    {
        $table = $this->table('project');

        $table->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('owner_id', 'integer', ['null' => true])
            ->addColumn('added', 'datetime')
            ->save();

        $table->addForeignKey('owner_id', 'user', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->save();
    }

    private function createFileContentTable()
    {
        $this->table('file_content')
            ->addColumn('content', 'text', ['limit' => MysqlAdapter::TEXT_LONG])
            ->save();
    }

    private function createFileTable()
    {
        $table = $this->table('file');

        $table->addColumn('project_id', 'integer')
            ->addColumn('content_id', 'integer')
            ->addColumn('path', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR])
            ->addColumn('added', 'datetime')
            ->save();

        $table->addForeignKey('project_id', 'project', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('content_id', 'project', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }

    private function createCommentTable()
    {
        $table = $this->table('comment');

        $table->addColumn('file_id', 'integer')
            ->addColumn('author_id', 'integer', ['null' => true])
            ->addColumn('content', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR])
            ->addColumn('added', 'datetime')
            ->save();

        $table->addForeignKey('file_id', 'file', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('author_id', 'user', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->save();
    }
}
