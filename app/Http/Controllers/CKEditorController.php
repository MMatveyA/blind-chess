<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if (!Auth::user()->superuser) {
            abort(403);
        }

        $callback = $_GET["CKEditorFuncNum"];
        $error = "";
        $file = $request->file("upload");
        $filename = md5(date("YmdHis")) . rand(5, 50);
        $extension = $file->getClientOriginalExtension();

        Storage::disk("public")->put(
            "/images/uploaded/" . $filename . "." . $extension,
            File::get($file)
        );
        $http_path = "/storage/images/uploaded/" . $filename . "." . $extension;

        echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" .
            $callback .
            ",  \"" .
            $http_path .
            "\", \"" .
            $error .
            "\" );</script>";
    }
}
