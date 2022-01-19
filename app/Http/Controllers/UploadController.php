<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Utilities\Filepond;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request, $saveToFolder = 'uploads')
    {
        // Loop in each incoming request (use loop to reuse this code)
        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                $file = Filepond::uploadFileTemporarily($request, $key, $saveToFolder);

                // Save the temporary File -- Will be deleted later
                $tmp = TemporaryFile::create([
                    'folder' => $file["tmp_folder"],
                    'filename' => $file["fileName"],
                    'save_to' => $file["saveToFolder"]
                ]);

                return $tmp->folder; // Return the folder for filepond
            }
        }

        return '';
    }
}
