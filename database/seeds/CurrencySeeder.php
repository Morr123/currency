<?php

use Illuminate\Database\Seeder;

use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = new SimpleXMLElement(file_get_contents('http://www.cbr.ru/scripts/XML_valFull.asp'));

		foreach($data->Item as $item){
			Currency::updateOrCreate([
				'alphabetic_code' => $item->ISO_Char_Code,
			], [
				'name' => $item->Name,
				'english_name' => $item->EngName,
				'digit_code' => $item->ISO_Num_Code,
			]);
		}
		
		Artisan::call('fill:rate');
    }
}
