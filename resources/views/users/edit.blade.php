@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-3 border-bottom">
        <h1 class="h5">Update User </h1>
        <a href="{{ route('users.index') }}">
            <button type="button" class="btn btn-success btn-sm">Back</button>
        </a>
    </div>

    <div class="card push-top">
        <form class="needs-validation" method="post" action="{{ route('users.update', $users->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <div class="card card-body">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input class="form-control @error('username') is-invalid @enderror" name="username" type="text"
                            id="fullname" required placeholder="Enter your name" value="{{ $users->username }}" />
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email address</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                            id="emailaddress" required placeholder="Enter your email" value="{{ $users->email }}" />
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
                                class="form-control @error('password_confirmation') is-invalid @enderror" required
                                placeholder="Enter your password" />
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

                    <div class="col-12">
                        <label class="form-label" for="roles">Role Permission</label>
                        <select class="form-select mb-3" id="roles" name="roles">
                            @foreach ($roles as $role)
                                <option value='{{ $role->id }}'>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 text-start">
                        <button class="btn btn-success text-white ms-1" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
