@extends('website.templates.master')

@section('title', 'SignUp')

<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="faqs">

                        <div class="container-fluid banner">
                            {{-- banner --}}
                            <div class="row p-5">
                                <!-- Add banner content here if needed -->
                            </div>
                        </div>

                        <div class="container">
                            {{-- features --}}
                            <div class="section-2 container-fluid">
                                <div class="text-center p-5 text-danger">
                                    <h1 class="display-4 font-weight-bold">Sign Up</h1>
                                </div>

                                <!-- Registration Form -->
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <form method="POST" action="{{ route('signup') }}">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="full_name">Full Name</label>
                                                <input type="text" id="full_name" name="full_name"
                                                    class="form-control rounded-pill" required>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" id="username" name="username"
                                                            class="form-control rounded-pill" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email"
                                                            class="form-control rounded-pill" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control rounded-pill" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password_confirmation">Confirm Password</label>
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control rounded-pill"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="beneficiary_name">Name of Beneficiary</label>
                                                <input type="text" id="beneficiary_name" name="beneficiary_name"
                                                    class="form-control rounded-pill" required>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" name="address"
                                                    class="form-control rounded-pill" required>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <div class="form-group">
                                                        <label for="primary_contact">Primary Contact No.</label>
                                                        <input type="text" id="primary_contact" name="primary_contact"
                                                            class="form-control rounded-pill" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="secondary_contact">Secondary Contact No.</label>
                                                        <input type="text" id="secondary_contact"
                                                            name="secondary_contact" class="form-control rounded-pill">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-danger btn-block rounded-pill">Register</button>
                                        </form>

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
