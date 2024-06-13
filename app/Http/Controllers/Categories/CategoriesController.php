<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Job\Job;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    // public function allcCategories(){
    //     $categories = Category::all();
    //     return view('jobs.single', compact('categories'));
    // }

    public function singleCategory($name){
        $jobs = Job::where('category', $name)
                    ->take(5)
                    ->orderby('created_at', 'desc')
                    ->get();

        return view('categories.single', compact('jobs', 'name'));
    }

}
