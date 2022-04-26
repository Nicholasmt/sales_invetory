@extends('layouts.app')
@section('title', 'Sales | Inventory')
@section('body')

<div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    @include('layouts.error')
                    <form action="{{ route('user-auth')}}" method="POST">
                        @csrf
                   
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" placeholder="password" name="password">
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                        </div>
                    </div>
                    <input class="btn btn-primary shadow-2 mb-4" type="submit" value="Login">
                    <p class="mb-2 text-muted">Forgot password? <a href="#">Reset</a></p>
                    <p class="mb-0 text-muted">Don’t have an account? <a href="{{  route('sign-up')}}">Signup</a></p>
						
					 </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection