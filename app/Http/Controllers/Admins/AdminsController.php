<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category\Category;
use App\Models\Job\Application;
use App\Models\Job\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    //

    public function index(){

        $jobs = Job::select()->count();
    
        $categories = Category::select()->count();

        $admins = Admin::select()->count();

        $applications = Application::select()->count();

        return view('admins.index', compact('jobs', 'categories', 'admins', 'applications'));
    }

    public function viewLogin(){
        return view('admins.view-login');
    }

    public function checkLogin(Request $request){

        $remember_me = $request->has('remember_me') ? true : false;
        if(auth()->guard('admin')->attempt(['email'=>$request->input("email"), 'password'=>$request->input("password")], $remember_me)){
            return redirect()->route('admins.dashboard');
        }

        return redirect()->back()->with(['error'=>'error logging in']);
    }

    public function admins(){
        $admins = Admin::all();
        return view('admins.all-admins', compact('admins'));
    }

    public function createAdmins(){
        $admins = Admin::all();
        return view('admins.create-admins');
    }

    public function storeAdmins(Request $request){

        Request()->validate([
            "name" => 'required|max:40',
            "email" => 'required|max:40',
            "password" => 'required',
        ]);

        $createAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        if($createAdmins){
            return redirect('admin/all-admins/')->with('create', 'Admin created successfully');
        }

    }


    public function displayCategories(){

        $categories = Category::all();
        return view('admins.display-categories', compact('categories'));
    }

    public function createCategories(){

        $categories = Category::all();
        return view('admins.create-categories', compact('categories'));
    }

    public function storeCategories(Request $request){

        Request()->validate([
            "name" => 'required|max:40',
        ]);

        $createCategory = Category::create([
            'name' => $request->name,
        ]);



        if($createCategory){
            return redirect('admins.create-categories')->with('create', 'Category created successfully');
        }

    }

    public function editCategories($id){

        $category = Category::find($id);

        return view('admins.edit-categories', compact('category'));
    }

    public function updateCategories($id, Request $request){

        Request()->validate([
            "name" => 'required|max:40',
        ]);
    
        $categoryUpdate = Category::find($id);
        $categoryUpdate->update([
            "name" => $request->name,
        ]);
    
        if($categoryUpdate){
            return redirect('admin/display-categories')->with('update', 'Category updated successfully');
        }
        
    }

    public function deleteCategories($id){

        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        if($deleteCategory){
            return redirect('admin/display-categories')->with('delete', 'Category deleted successfully');
        }

        
    }
    
    public function allJobs(){

        $jobs = Job::all();

        return view('admins.all-jobs', compact('jobs'));
    }

    public function createJobs(){
        $categories = Category::all();
        return view('admins.create-jobs', compact('categories'));
    }
    

    public function storeJobs(Request $request){

        Request()->validate([
            "job_title" => 'required',
            "job_region" => 'required',
            "company" => 'required',
            "job_type" => 'required',
            "experience" => 'required',
            "salary" => 'required',
            "gender" => 'required',
            "application_deadline" => 'required',
            "job_description" => 'required',
            "education_experience" => 'required',
            "other_benefits" => 'required',
            "category" => 'required',
            "image" => 'required',
        ]);

        

        $destinationPath = 'assets/images/';
        $myImage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myImage);

        $createJobs = Job::create([
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'company' => $request->company,
            'job_type' => $request->job_type,
            'vacancy' => $request->vacancy,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'education_experience' => $request->education_experience,
            'other_benefits' => $request->other_benefits,
            'category' => $request->category,
            'image' => $myImage,
        ]);



        if($createJobs){
            return redirect('admin/display-jobs/')->with('create', 'Job created successfully');
        }

    }

    public function deleteJobs($id){

        $deleteJob = Job::find($id);
        
        if(File::exists(public_path('assets/images/'. $deleteJob->image))){
            File::delete(public_path('assets/images/'. $deleteJob->image));
        }

        $deleteJob->delete();

        if($deleteJob){
            return redirect('admin/display-jobs/')->with('delete', 'Job deleted successfully');
        }

    }
    
    //apps

    public function displayApps(){

        $apps = Application::all();
        return view('admins.all-apps', compact('apps'));
    }

    public function deleteApps($id){

        $deleteApp = Application::find($id);
        $deleteApp->delete();
        return redirect('admin/display-apps/')->with('delete', 'Aplication deleted successfully');
    }
    
    

}
