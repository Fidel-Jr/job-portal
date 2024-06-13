@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>--}}
<!-- HOME -->
<section class="home-section section-hero overlay bg-image" style="margin-top: -24px; background-image: url(' {{ asset('assets/images/hero_1.jpg') }}')" id="home-section">

<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-12">
      <div class="mb-5 text-center">
        <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
      </div>
      <form method="post" action="{{ route('search.job') }}" class="search-jobs-form">
        @csrf
        <div class="row mb-5">
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <input name="job_title" type="text" class="form-control form-control-lg" placeholder="Job Title">
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select name="job_region" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
              <option>Anywhere</option>
              <option value="San Francisco">San Francisco</option>
              <option value="Palo Alto">Palo Alto</option>
              <option value="New York">New York</option>
              <option value="Manhattan">Manhattan</option>
              <option value="Ontario">Ontario</option>
              <option value="Toronto">Toronto</option>
              <option value="Kansas">Kansas</option>
              <option value="Mountain View">Mountain View</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select name="job_type" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
              <option>Part Time</option>
              <option>Full Time</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 popular-keywords">
            <h3>Trending Keywords:</h3>
            <ul class="keywords list-unstyled m-0 p-0">
              @foreach($duplicates as $duplicate)
                <li><a href="#" class="">{{ $duplicate->keyword }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<a href="#next" class="scroll-button smoothscroll">
  <span class=" icon-keyboard_arrow_down"></span>
</a>

</section>

<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}');">
<div class="container">
  <div class="row mb-5 justify-content-center">
    <div class="col-md-7 text-center">
      <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
      <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
    </div>
  </div>
  <div class="row pb-0 block__19738 section-counter">

    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
      <div class="d-flex align-items-center justify-content-center mb-2">
        <strong class="number" data-number="1930">0</strong>
      </div>
      <span class="caption">Candidates</span>
    </div>

    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
      <div class="d-flex align-items-center justify-content-center mb-2">
        <strong class="number" data-number="54">0</strong>
      </div>
      <span class="caption">Jobs Posted</span>
    </div>

    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
      <div class="d-flex align-items-center justify-content-center mb-2">
        <strong class="number" data-number="120">0</strong>
      </div>
      <span class="caption">Jobs Filled</span>
    </div>

    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
      <div class="d-flex align-items-center justify-content-center mb-2">
        <strong class="number" data-number="550">0</strong>
      </div>
      <span class="caption">Companies</span>
    </div>

      
  </div>
</div>
</section>



<section class="site-section">
  <div class="container">

    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">{{ $totalJobs }} Job Listed</h2>
      </div>
    </div>
    
    <ul class="job-listings mb-5">
      
      @foreach($jobs as $job)
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="{{ route('single.job', $job->id) }}"></a>
          <div class="job-listing-logo">
            <img src=" {{ asset('assets/images/' . $job->image . '') }}" alt="Free Website Template by Free-Template.co" class="img-fluid">
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
    


      

      
    </ul>



  </div>
</section>

<section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url(' {{ asset('assets/images/hero_1.jpg') }}' )">
<div class="container">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h2 class="text-white">Looking For A Job?</h2>
      <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
    </div>
    <div class="col-md-3 ml-auto">
      <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
    </div>
  </div>
</div>
</section>


<section class="site-section py-4">
<div class="container">

  <div class="row align-items-center">
    <div class="col-12 text-center mt-4 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <h2 class="section-title mb-2">Company We've Helped</h2>
          <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>
        </div>
      </div>
      
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_mailchimp.svg') }}" alt="Image" class="img-fluid logo-1">
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_paypal.svg') }}" alt="Image" class="img-fluid logo-2">
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_stripe.svg') }}" alt="Image" class="img-fluid logo-3">
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_visa.svg') }}" alt="Image" class="img-fluid logo-4">
    </div>

    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_apple.svg') }}" alt="Image" class="img-fluid logo-5">
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_tinder.svg') }}" alt="Image" class="img-fluid logo-6">
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_sony.svg') }}" alt="Image" class="img-fluid logo-7">
    </div>
    <div class="col-6 col-lg-3 col-md-6 text-center">
      <img src=" {{ asset('assets/images/logo_airbnb.svg') }}" alt="Image" class="img-fluid logo-8">
    </div>
  </div>
</div>
</section>


<section class="bg-light pt-5 testimony-full">
  
  <div class="owl-carousel single-carousel">

  
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center text-center text-lg-left">
          <blockquote>
            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
            <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
          </blockquote>
        </div>
        <div class="col-lg-6 align-self-end text-center text-lg-right">
          <img src=" {{ asset('assets/images/person_transparent_2.png') }}" alt="Image" class="img-fluid mb-0">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center text-center text-lg-left">
          <blockquote>
            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
            <p><cite> &mdash; Chris Peters, @Google</cite></p>
          </blockquote>
        </div>
        <div class="col-lg-6 align-self-end text-center text-lg-right">
          <img src=" {{ asset('assets/images/person_transparent.png') }}" alt="Image" class="img-fluid mb-0">
        </div>
      </div>
    </div>

</div>

</section>

<section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}'); margin-bottom: -24px;">
<div class="container">
  <div class="row">
    <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
      <h2 class="text-white">Get The Mobile Apps</h2>
      <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
      <p class="mb-0">
        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
      </p>
    </div>
    <div class="col-md-6 ml-auto align-self-end">
      <img src=" {{ asset('assets/images/apps.png') }}" alt="Free Website Template by Free-Template.co" class="img-fluid">
    </div>
  </div>
</div>
</section>
@endsection
