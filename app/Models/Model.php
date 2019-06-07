<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Intervention\Image\Facades\Image;
use File;

abstract class Model extends BaseModel
{
	protected function getNewImagePrefixName(){
		return $this->id;
	}
	
    public static function getUniqueHash($field, $count = 32)
    {
		$hash = str_random($count);
		$item = static::where($field, $hash)->first();
		if ($item) {
			return self::getUniqueHash($field, $count);
		} else {
			return $hash;
		}
    }
	
	public function saveImage($content, $blur = 0){
		$img = Image::make($content);
		$ext = explode('/', $img->mime())[1];
		$img->encode($ext, 80)->blur($blur);
		$fielName = $this->getNewImagePrefixName() . '.' . $ext;
		$img->save(static::getImageFilePath() . $fielName);
		$this->update(['image' => $fielName]);
	}
	
	public function deleteImage(){
		if($this->image)
			File::delete(static::getImageFilePath() . $this->image);
	}
}
