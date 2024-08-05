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
                                    <h1 class="display-4 font-weight-bold">Contact Us</h1>
                                </div>

                                <div class="row">
                                    <!-- Form Column -->
                                    <div class="col-md-6">
                                        <form method="POST" action="{{ route('try1') }}">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control rounded-pill" placeholder="Enter your name"
                                                    required>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control rounded-pill" placeholder="Enter your email"
                                                    required>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="subject">Subject</label>
                                                <input type="text" id="subject" name="subject"
                                                    class="form-control rounded-pill" placeholder="Enter the subject"
                                                    required>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="message">Message</label>
                                                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required
                                                    style="border-radius: 0.25rem;"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-danger btn-block rounded-pill">Send
                                                Message</button>
                                        </form>
                                    </div>

                                    <!-- Contact Info Column -->
                                    <div class="col-md-6">
                                        <div class="info-box mt-5">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>83 National Road, Barangay Putatan<br>Muntinlupa City</p>

                                            <i class="fas fa-envelope"></i>
                                            <p>lariph22@gmail.com</p>

                                            <i class="fas fa-phone"></i>
                                            <p>0915-264-8656</p>
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
