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
                'display_name' => 'Gallus Anonimus'
            ])->save();
    }
}
