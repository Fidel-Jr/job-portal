<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    
    public function profile(){

        $profile = User::find(Auth::user()->id);

        return view('users.profile', compact('profile'));

    }

    public function applications(){

        $applications = Application::where('user_id', '=', Auth::user()->id)->get();

        return view('users.applications', compact('applications'));

    }

    public function savedJobs(){

        $savedJobs = JobSaved::where('user_id', '=', Auth::user()->id)->get();

        return view('users.savedjobs', compact('savedJobs'));

    }

    public function editDetails(){

        $userDetails = User::find(Auth::user()->id);

        return view('users.editdetails', compact('userDetails'));

    }

    public function updateDetails(Request $request){

        Request()->validate([
            "name" => 'required|max:40',
            "job_title" => 'required|max:40',
            "bio" => 'required',
            "facebook" => 'required|max:140',
            "twitter" => 'required|max:140',
            "linkedin" => 'required|max:140',
        ]);

        $userDetailsUpdate = User::find(Auth::user()->id);
        $userDetailsUpdate->update([
            "name" => $request->name,
            "job_title" => $request->job_title,
            "bio" => $request->bio,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "linkedin" => $request->linkedin,
        ]);

        if($userDetailsUpdate){
            return redirect('/users/editdetails/')->with('update', 'User details updated successfully');
        }
        

    }
    
    public function editCV(){


        return view('users.editcv');

    }

    public function updateCV(Request $request){

        Request()->validate([
            "cv" => 'required',
        ]);

        $oldCV = User::find(Auth::user()->id);

        if(File::exists(public_path('assets/cvs/'. $oldCV))){
            File::delete(public_path('assets/cvs/'. $oldCV));
        }

        // $file_path = public_path('assets/cvs/'.$oldCV->cv);
        // unlink($file_path);

        $destinationPath = 'assets/cvs/';
        $mycv = $request->cv->getClientOriginalName();
        $request->cv->move(public_path($destinationPath), $mycv);

        $oldCV->update([
            "cv" => $mycv
        ]);

        return redirect('/users/profile')->with('update', 'CV updated successfully');

    }

    

}
