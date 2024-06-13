@extends('layouts.app')

@section('content')

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}'); margin-top: -24px;" id="home-section">
        <div class="container">
        <div class="row">
            <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update Details</h1>
            <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="#">Job</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Update Details</strong></span>
            </div>
            </div>
        </div>
        </div>
    </section>

    <div class="container">
      @if(\Session::has('update'))
        <div class="alert alert-success">
          <p>{!! \Session::get('update') !!}</p> 
        </div>
      @endif
    </div>

        <!--job details-->
    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Update User Details</h2>
                        </div>
                    </div>
                </div>
            </div>
            <form class="p-4 p-md-5 border rounded" action="{{ route('update.details') }}" method="post">
                @csrf
                <div class="form-group"> 
                    <label for="job-title">Name</label>
                    <input type="text" value="{{ $userDetails->name }}" name="name" class="form-control" id="job-title" placeholder="Name">
                </div>
                @if($errors->has('name'))
                    <p class="alert alert-success">{{ $errors->first('name') }}</p>
                @endif
                <div class="form-group">
                    <label for="job-title">Job Title</label>
                    <input type="text" value="{{ $userDetails->job_title }}" name="job_title" class="form-control" id="job-title" placeholder="Job Title">
                </div>
                @if($errors->has('job_title'))
                    <p class="alert alert-success">{{ $errors->first('job_title') }}</p>
                @endif
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="">Bio</label> 
                        <textarea name="bio" id="" cols="30" rows="7" class="form-control" placeholder="bio">{{ $userDetails->bio }}</textarea>
                    </div>
                </div>
                @if($errors->has('bio'))
                    <p class="alert alert-success">{{ $errors->first('bio') }}</p>
                @endif
                <div class="form-group">
                    <label for="job-title">Facebook</label>
                    <input type="text" value="{{ $userDetails->facebook }}" name="facebook" class="form-control" id="facebook" placeholder="Facebook">
                </div>
                @if($errors->has('facebook'))
                    <p class="alert alert-success">{{ $errors->first('facebook') }}</p>
                @endif
                <div class="form-group">
                    <label for="job-title">Twitter</label>
                    <input type="text" value="{{ $userDetails->twitter }}" name="twitter" class="form-control" id="twitter" placeholder="Twitter">
                </div>
                @if($errors->has('twitter'))
                    <p class="alert alert-success">{{ $errors->first('twitter') }}</p>
                @endif
                <div class="form-group">
                    <label for="job-title">Linkedin</label>
                    <input type="text" value="{{ $userDetails->linkedin }}" name="linkedin" class="form-control" id="linkedin" placeholder="Linkedin">
                </div>
                @if($errors->has('linkedin'))
                    <p class="alert alert-success">{{ $errors->first('linkedin') }}</p>
                @endif

                <div class="col-lg-4 ml-auto">
                    <div class="row">  
                    <div class="col-6">
                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Update">
                    </div>
                    </div>
                </div>
                
            
            </form>
        </div>
    </section>
@endsection