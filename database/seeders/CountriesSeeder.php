<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webpatser\Countries\Countries;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instancia a classe Countries
        $countriesInstance = new Countries();

        // Obtém os dados dos países do pacote
        $countries = $countriesInstance->getList();

        // Itera sobre os dados e insere na tabela
        foreach ($countries as $country) {
            // Verifique se os valores necessários estão presentes
            if (!empty($country['iso_3166_2']) && !empty($country['iso_3166_3']) && !empty($country['name'])) {
                DB::table('countries')->insert([
                    'iso_3166_2' => $country['iso_3166_2'],
                    'iso_3166_3' => $country['iso_3166_3'],
                    'name' => $country['name'],
                    'official_name' => $country['full_name'] ?? null,  // Usa 'full_name' como 'official_name'
                    'common_name' => $country['name'] ?? null,         // Usa 'name' como 'common_name' se necessário
                    'flag' => $country['iso_3166_2'] . '.png', // Adiciona o código ISO 3166-2 como nome da bandeira
                ]);
            } else {
                // Registre uma mensagem de log ou erro para depuração
                \Log::error('Dados incompletos para país: ', $country);
            }
        }
    }
}
