<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //CADASTRAR PREVIAMENTE O USUÁRIO COM EMAIL: email1@email.com
    public function test_user_database_data()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'email1@email.com',
        ]);
    }

    //CADASTRAR PREVIAMENTE O USUÁRIO COM NOME: cliente1
    public function test_cliente_database_data()
    {
        $this->assertDatabaseHas('clientes', [
            'nome' => 'cliente1',
        ]);
    }
}
