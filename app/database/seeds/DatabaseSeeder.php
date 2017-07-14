<?php

class DatabaseSeeder extends Seeder {

     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('TabelaUsuarioSeeder');
    }

}

class TabelaUsuarioSeeder extends Seeder {

    public function run()
    {
        $usuarios = Usuario::get();

        if($usuarios->count() == 0) {
            Usuario::create(array(
                'email' => 'teste@teste.com',
                'senha' => Hash::make('admin'),
                'nome'  => 'admin',
                'tipo'  => 'admin',
                'acesso'=> '0'
            ));
        }
    }

}