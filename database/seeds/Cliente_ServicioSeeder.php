<?php

use Illuminate\Database\Seeder;

class Cliente_ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\cliente_servicio::class, 10)->create();
    }
}
