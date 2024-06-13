@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url(' {{ asset('assets/images/hero_1.jpg') }} '); margin-top: -24px;" id="home-section">
        <div class="container">
            <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Saved Jobs</h1>
                <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="#">Job</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Saved Jobs</strong></span>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Saved Jobs</h2>
        </div>
        </div>
        
        <ul class="job-listings mb-5">
        @if($savedJobs->count()>0)
        @foreach($savedJobs as $job)
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="{{ route('single.job', $job->job_id) }}"></a>
            <div class="job-listing-logo">
                <img src=" {{ asset('assets/images/' . $job->job_image . '') }}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $job->job_title }}</h2>
                <strong>{{  $job->company }}</strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span>{{ $job->job_region }}
                </div>
                <div class="job-listing-meta">
                <span class="badge badge-danger">{{ $job->job_type }}</span>
                </div>
            </div>
            
            </li>
        @endforeach
        @else
            <div class="alert alert-info">
            <p>No saved jobs just yet.</p>
            </div>
        @endif
        


        

        
        </ul>



    </div>
    </section>


@endsection
