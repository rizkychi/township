@extends('_template.master-public')

@section('page_title', 'Login')

@section('title', 'Welcome!')

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary border-0 mb-0"> 
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            Sign in with credentials
          </div>
          <form role="form" action="{{ route('doLogin') }}" method="post">
            @csrf
            <div class="form-group mb-3">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" name="email" placeholder="Email" type="email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" name="password" placeholder="Password" type="password">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endSection