<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use App\Functions\Helpers;

class TrainsCsvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lettura CSV
        $trains = Helpers::getCsvContent(__DIR__ . '/trains.csv');
        // Creazione dati tabella
        foreach( $trains as $index => $train ) {
            if( $index !== 0 ) {
                $new_train = new Train();
                // compilare i campi della tabella
                $new_train->company = $train[0];
                $new_train->departure_station = $train[1];
                $new_train->arrival_station = $train[2];
                $new_train->departure_time = $train[3];
                $new_train->arrival_time = $train[4];
                $new_train->code = $train[5];
                $new_train->wagon = $train[6];
                $new_train->is_in_time = $train[7];
                $new_train->is_cancelled = $train[8];
                // salvataggio a DB
                $new_train->save();
            }
        }
    }
}
