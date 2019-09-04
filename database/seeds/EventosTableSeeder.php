<?php

use Illuminate\Database\Seeder;
use App\Models\Eventos;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eventos::create([
            'title' => 'Dia das Mães',
            'body'  => 'Dia das mães, muito show',
        ]);

    }
}
