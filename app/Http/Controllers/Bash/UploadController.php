<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadController {
	public static function uploadFile($dir, $file, $fileNameSuffix = "file") {
		// создать директорию
		$storage = Storage::disk('public');
		$storage->makeDirectory($dir);

		// перенейсти файл в указанную директорию
		$ext = $file->getClientOriginalExtension();
		$fileName = time() . '_' . $fileNameSuffix . '.' . $ext;
		$file->move($dir, $fileName);

		return $dir.'/'.$fileName; 
	}

	public static function deleteFile($dir) {
		if (File::exists($dir)) {
			File::delete($dir);
			return true;
		}
		return false;
	}
}