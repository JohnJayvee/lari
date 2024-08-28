@extends('website.templates.master')

@section('title', 'Login')

@section('contents')
    <div class="content-wrapper">
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="faqs">
                        <div class="container">
                            <div class="section-2 container-fluid">
                                <div class="text-center p-5 text-danger">
                                    <h1 class="display-4 font-weight-bold">Login</h1>
                                </div>

                                <!-- Login Form -->
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-8 col-sm-10">
                                        <form method="POST" action="{{ route('try') }}">
                                            @csrf

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control rounded-pill" required>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control rounded-pill" required>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-danger btn-block rounded-pill">Login</button>
                                        </form>

                                        <!-- Sign Up Section -->
                                        <div class="text-center mt-4">
                                            <p class="mb-0">Don't have an account?</p>
                                            <a href="{{ route('signup') }}"
                                                class="btn btn-outline-danger rounded-pill mt-2">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
