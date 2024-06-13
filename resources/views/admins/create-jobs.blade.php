@extends('layouts.admin')

@section('content')
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Create Jobs</h5>
            
              <form class="p-4 p-md-5" action="{{ route('store.jobs') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!--job details-->
              
                <div class="form-group">
                  <label for="job-title">Job Title</label>
                  <input type="text" name="job_title" class="form-control" id="job-title" placeholder="Product Designer">
                </div>

                @if($errors->has('job_title'))
                    <p class="alert alert-danger">{{ $errors->first('job_title') }}</p>
                @endif
              
  
                <div class="form-group">
                  <label for="job-region">Job Region</label>
                  <select name="job_region" class="form-select form-control" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                        <option value="Anywhere">Anywhere</option>
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
                @if($errors->has('job_region'))
                    <p class="alert alert-danger">{{ $errors->first('job_region') }}</p>
                @endif
                <div class="form-group">
                    <label for="job-title">Company</label>
                    <input type="text" name="company" class="form-control" id="job-title" placeholder="company">
                </div>
                @if($errors->has('company'))
                    <p class="alert alert-danger">{{ $errors->first('company') }}</p>
                @endif
  
                <div class="form-group">
                  <label for="job-type">Job Type</label>
                  <select name="job_type" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option value="Part Time">Part Time</option>
                    <option value="Full Time">Full Time</option>
                  </select>
                </div>
                @if($errors->has('job_type'))
                    <p class="alert alert-danger">{{ $errors->first('job_type') }}</p>
                @endif

                <div class="form-group">
                  <label for="job-location">Vacancy</label>
                  <input name="vacancy" type="text" class="form-control" id="job-location" placeholder="e.g. 3">
                </div>
                @if($errors->has('vacancy'))
                    <p class="alert alert-danger">{{ $errors->first('vacancy') }}</p>
                @endif


                <div class="form-group">
                  <label for="job-type">Experience</label>
                  <select name="experience" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                    <option value="1-3 years">1-3 years</option>
                    <option value="3-6 years">3-6 years</option>
                    <option value="6-9 years">6-9 years</option>
                  </select>
                </div>
                @if($errors->has('experience'))
                    <p class="alert alert-danger">{{ $errors->first('experience') }}</p>
                @endif 

                <div class="form-group">
                  <label for="job-type">Salary</label>
                  <select name="salary" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                    <option value="$50k - $70k">$50k - $70k</option>
                    <option value="$70k - $100k">$70k - $100k</option>
                    <option value="$100k - $150k">$100k - $150k</option>
                  </select>
                </div>
                @if($errors->has('salary'))
                    <p class="alert alert-danger">{{ $errors->first('salary') }}</p>
                @endif
                
                <div class="form-group">
                  <label for="job-type">Gender</label>
                  <select name="gender" class="selectpicker border rounded form-control " id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Any">Any</option>
                  </select>
                </div>
                @if($errors->has('gender'))
                    <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
                @endif
  
                <div class="form-group">
                  <label for="job-location">Application Deadline</label>
                  <input name="application_deadline" type="text" class="form-control" id="" placeholder="e.g. 20-12-2022">
                </div>
                @if($errors->has('application_deadline'))
                    <p class="alert alert-danger">{{ $errors->first('application_deadline') }}</p>
                @endif
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Job Description</label> 
                    <textarea name="job_description" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
                  </div>
                </div>
                @if($errors->has('job_description'))
                    <p class="alert alert-danger">{{ $errors->first('job_description') }}</p>
                @endif
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Responsibilities</label> 
                    <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
                  </div>
                </div>
                @if($errors->has('responsibilities'))
                    <p class="alert alert-danger">{{ $errors->first('responsibilities') }}</p>
                @endif
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Education & Experience</label> 
                    <textarea name="education_experience" id="" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience..."></textarea>
                  </div>
                </div>
                @if($errors->has('education_experience'))
                    <p class="alert alert-danger">{{ $errors->first('education_experience') }}</p>
                @endif
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Other Benifits</label> 
                    <textarea name="other_benefits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
                  </div>
                </div>
                @if($errors->has('other_benefits'))
                    <p class="alert alert-danger">{{ $errors->first('other_benefits') }}</p>
                @endif
             
                <!--company details-->
  
  
                <div class="form-group">
                    <label for="job-type">Categroy</label>
                    <select name="category" class="selectpicker border rounded form-control " id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                        @foreach($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option> 
                        @endforeach
                    </select>
                </div>
                @if($errors->has('category'))
                    <p class="alert alert-danger">{{ $errors->first('category') }}</p>
                @endif
                <div class="form-group">
                    <label for="job-location">Images</label>
                    <input name="image" type="file" class="form-control">
                </div>
                @if($errors->has('image'))
                    <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                @endif
                
                <div class="col-lg-4 ml-auto">
                    <div class="row">  
                      <div class="col-6">
                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                      </div>
                    </div>
                </div>
  
  
              </form>
            </div>
          </div>    
        </div>
      </div>
@endsection