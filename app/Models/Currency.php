<?php

namespace App\Models;

class Currency extends Model
{
	public $table = 'currency';
	
	protected $fillable = [
        'name', 
		'english_name', 
		'alphabetic_code',
		'digit_code',
		'rate'
    ];
}
