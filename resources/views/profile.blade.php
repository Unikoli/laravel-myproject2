@extends('layouts.auth')
@section('content')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
        <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Update User</h1>
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <p>{{$error}}</p>
                              @endforeach
                          </ul>
                      </div>
                  @endif
              </div>
            
            <form class="user" action="{{url('profile',auth()->user()->id())}}" method="post">
                @csrf

                <div class="form-group">
                    <input type="full name" class="form-control form-control-user" id="exampleInputFullName"
                        aria-describedby="emailHelp" placeholder="Enter Full Name"name="name" value="{$user->name}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Enter Email Address..."name="email" value="{$user->email}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        placeholder="Password" name="password" value="{$user->password}">
                </div>
                
                <button href="index.html" class="btn btn-primary btn-user btn-block">
                    update data
                </button>

                <hr>
                
            </form>
            <hr>
            
        </div>
    </div>
</div>
@endsection