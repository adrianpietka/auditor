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
            ->addColumn('displayName', 'string', ['limit' => 100])
            ->save();
    }

    private function createProjectTable()
    {
        $this->table('project')
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('ownerId', 'integer', ['null' => true])
            ->addColumn('added', 'datetime')
            ->addForeignKey('ownerId', 'user', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
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
        $this->table('file')
            ->addColumn('projectId', 'integer')
            ->addColumn('contentId', 'integer')
            ->addColumn('path', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR])
            ->addColumn('added', 'datetime')
            ->addForeignKey('projectId', 'project', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('contentId', 'project', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }

    private function createCommentTable()
    {
        $this->table('comment')
            ->addColumn('fileId', 'integer')
            ->addColumn('authorId', 'integer', ['null' => true])
            ->addColumn('content', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR])
            ->addColumn('added', 'datetime')
            ->addForeignKey('fileId', 'file', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('userId', 'user', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->save();
    }
}
