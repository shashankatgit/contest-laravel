<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notification;
use App\Question;
use App\Team;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Mockery\Matcher\Not;

class AdminActionsController extends Controller
{
    public function getAdd()
    {
        return view('admin.actions.add-ques');
    }

    public function getEdit()
    {
        $questions = Question::all();

        return view('admin.actions.edit-ques', compact('questions'));
    }

    public function getEditQuestion($id)
    {

        $question = Question::findOrFail($id);

        return view('admin.actions.edit-question', compact('id','question'));
    }

    public function postEditQuestion(Request $request)
    {
        $id = $request['id'];
        $question = Question::findOrFail($id);
        $question->text = $request['text'];
        $question->answer = $request['answer'];

        if ($request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imagePath = \Config::get('constants.paths.ImageStoragePath');
            $path = $imagePath . "$id" . '.' . $extension;
            //die("$path");
            \Storage::disk('local')->put($path, file_get_contents($file));
            $question->imageName = "$id" . '.' . $extension;
            $question->mime = $file->getClientMimeType();
        }

        $question->save();
        $this->createNotification("Question $question->id". ' was updated',true);
        return redirect()->route('admin.edit')->with(['success'=>'Changes made successfully']);
    }

    public function postAdd(Request $request)
    {


        $question = new Question();

        $question->text = $request['text'];
        $question->answer = $request['answer'];

        if($request->file('image'))
        {
            $lastQuestion = Question::all()->last();

            //var_dump($lastQuestion);
            $lastQuestionId = $lastQuestion->id + 1;

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imagePath = \Config::get('constants.paths.ImageStoragePath');
            $path = $imagePath."$lastQuestionId".'.'.$extension;
            //die("$path");
            \Storage::disk('local')->put($path, file_get_contents($file));
            $question->imageName="$lastQuestionId".'.'.$extension;
            $question->mime = $file->getClientMimeType();
        }

        $question->save();
        $this->createNotification("Question $question->id"." was added",true);
        return redirect()->route('admin.add')->with(['success'=>'Question Added Successfully!']);
    }

    public function getAddAdmin()
    {
        return view('admin.actions.add-admin');
    }

    public function postAddAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password= bcrypt($request['password']);

        $admin->save();

        $this->createNotification($admin->name." was added as admin",true);
        return redirect()->route('admin.addAdmin')->with(['success'=>'Admin Added Successfully!']);
    }


    public function getManageTeams()
    {
        $teams = Team::orderBy('id','desc')->get();
        $newTeamId = $teams[0]->id + 1;
        return view('admin.actions.manage-team',compact('teams','newTeamId'));
    }

    public function postAddTeam(Request $request)
    {

    }

    public function getEditTeam($id)
    {

    }

    public function postEditTeam(Request $request)
    {

    }

    public function createNotification($text,$isPublic)
    {
        $notification = new Notification();
        $notification -> text = $text;
        $notification -> isPublic = (boolean)$isPublic;
        $notification -> created_at = Carbon::now();

        $notification -> save();
    }
}
