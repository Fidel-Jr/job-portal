@extends('layouts.admin')

@section('content')
<div class="col">
          <div class="card">
            <div class="card-body">
              @if(\Session::has('create'))
                <div class="alert alert-success">
                  <p>{!! \Session::get('create') !!}</p> 
                </div>
              @endif

              @if(\Session::has('delete'))
                <div class="alert alert-success">
                  <p>{!! \Session::get('delete') !!}</p> 
                </div>
              @endif

              @if(\Session::has('update'))
                <div class="alert alert-success">
                  <p>{!! \Session::get('update') !!}</p> 
                </div>
              @endif
                
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="{{ route('create.categories') }}" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                  <tr>
                    <th scope="row">$category</th>
                    <td>{{ $category->name }}</td>
                    <td><a  href="{{ route('edit.categories', $category->id) }}" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="{{ route('delete.categories', $category->id) }}" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
@endsection