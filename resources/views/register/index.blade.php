@extends('layout.main')
@section('header')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                <p class="text-muted mb-4">Don't have an account? Create your account</p>
                            </div>

                            <form class="needs-validation" action="/register" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username"
                                        type="text" id="fullname" required placeholder="Enter your name" />
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="email" id="emailaddress" required placeholder="Enter your email" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" required
                                            placeholder="Enter your password" />
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            required placeholder="Enter your password" />
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" required
                                            class="form-check-input @error('checkbox') is-invalid @enderror" name='checkbox'
                                            id="checkbox-signup" />
                                        <label class="form-check-label" for="checkbox-signup">I accept <a href="#"
                                                class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                    @error('checkbox')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="/login"
                                    class="text-muted ms-1"><b>LogIn</b></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-alt">2022 TicketApp</footer>
@endsection
