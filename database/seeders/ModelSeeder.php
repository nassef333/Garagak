<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carData = [
            ['brand' => 'BMW', 'series' => '1 Series', 'models' => $this->generateModels(10, 'Model 1')],
            ['brand' => 'BMW', 'series' => '2 Series', 'models' => $this->generateModels(10, 'Model 2')],
            ['brand' => 'Mercedes-Benz', 'series' => 'A-Class', 'models' => $this->generateModels(10, 'Model A')],
            ['brand' => 'Mercedes-Benz', 'series' => 'C-Class', 'models' => $this->generateModels(10, 'Model C')],
            ['brand' => 'Audi', 'series' => 'A3', 'models' => $this->generateModels(10, 'Model A3')],
            ['brand' => 'Audi', 'series' => 'A4', 'models' => $this->generateModels(10, 'Model A4')],
            ['brand' => 'Toyota', 'series' => 'Camry', 'models' => $this->generateModels(10, 'Model Camry')],
            ['brand' => 'Toyota', 'series' => 'Rav4', 'models' => $this->generateModels(10, 'Model Rav4')],
            ['brand' => 'Honda', 'series' => 'Civic', 'models' => $this->generateModels(10, 'Model Civic')],
            ['brand' => 'Honda', 'series' => 'Pilot', 'models' => $this->generateModels(10, 'Model Pilot')],
            ['brand' => 'Ford', 'series' => 'Fusion', 'models' => $this->generateModels(10, 'Model Fusion')],
            ['brand' => 'Ford', 'series' => 'Explorer', 'models' => $this->generateModels(10, 'Model Explorer')],
            ['brand' => 'Chevrolet', 'series' => 'Malibu', 'models' => $this->generateModels(10, 'Model Malibu')],
            ['brand' => 'Chevrolet', 'series' => 'Silverado', 'models' => $this->generateModels(10, 'Model Silverado')],
            ['brand' => 'Nissan', 'series' => 'Altima', 'models' => $this->generateModels(10, 'Model Altima')],
            ['brand' => 'Nissan', 'series' => 'Rogue', 'models' => $this->generateModels(10, 'Model Rogue')],
            ['brand' => 'Tesla', 'series' => 'Model S', 'models' => $this->generateModels(10, 'Model S')],
            ['brand' => 'Tesla', 'series' => 'Model 3', 'models' => $this->generateModels(10, 'Model 3')],
            ['brand' => 'Lexus', 'series' => 'ES', 'models' => $this->generateModels(10, 'Model ES')],
            ['brand' => 'Lexus', 'series' => 'RX', 'models' => $this->generateModels(10, 'Model RX')],

        ];

        foreach ($carData as $carInfo) {
            $brandId = DB::table('brands')->where('name', $carInfo['brand'])->value('id');
            $seriesId = DB::table('car_series')
                ->where('name', $carInfo['series'])
                ->where('brand_id', $brandId)
                ->value('id');

            foreach ($carInfo['models'] as $modelName) {
                DB::table('cars')->insert([
                    'name' => $modelName,
                    'car_series_id' => $seriesId,
                ]);
            }
        }
    }

    /**
     * Generate model names with incremental suffixes.
     *
     * @param int $count
     * @param string $baseName
     * @return array
     */
    private function generateModels($count, $baseName)
    {
        $models = [];

        for ($i = 1; $i <= $count; $i++) {
            $models[] = $baseName . ' ' . $i;
        }

        return $models;
    }
}
