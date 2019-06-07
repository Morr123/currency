<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use DB;

class FillRate extends Command
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:rate';
	
	/**
     * @throws \Exception
     * @throws \Throwable
     */
    public function handle()
    {
		$currencies = Currency::get();
		$data = new \SimpleXMLElement(file_get_contents('http://www.cbr.ru/scripts/XML_daily.asp'));
		
		DB::transaction(function () use($currencies, $data){
			foreach($data->Valute as $item){
				if($course = $currencies->where('alphabetic_code', $item->CharCode)->first())
					$course->update(['rate'=>(float) $item->Value]);
			}
		});
		
    }
}
