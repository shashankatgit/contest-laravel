<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;

class ResourceController extends Controller
{
    public function getQuestionImage($id)
    {
        if (Auth::guard('admins')->check()) {
            $question = Question::findOrFail($id);
            $imagePath = \Config::get('constants.paths.ImageStoragePath') . ($question->imageName);
            $image = \Storage::disk('local')->get($imagePath);
            $mime = $question->mime;
            return \Response::make($image, 200, array('Content-type' => $question->mime,
                ));
        }
    }
}
