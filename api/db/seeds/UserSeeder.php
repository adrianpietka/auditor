<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function run()
    {
        $this->addAnonymous();
    }

    private function addAnonymous()
    {
        $this->table('user')
            ->insert([
                'id' => 1,
                'login' => 'anonymous',
                'displayName' => 'Gallus Anonimus'
            ])->save();
    }
}
