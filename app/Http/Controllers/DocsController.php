<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docs;

class DocsController extends Controller
{
    public function upload(Request $request){

        if ($files = $request->file('file')) {
             
            //store file into document folder
            $file = $request->file->store('public/docs');
 
            //store your file into database
            $document = new Docs();
            $document->path = $file;
            $document->save();
              
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
  
        }

    }
}
