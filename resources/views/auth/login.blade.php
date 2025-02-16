<x-frontend>
    <!-- Breadcrumb Section End -->

        <div class="container-fluid ">

            <div class="row justify-content-center">
                <div class="col-5">

                   <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" autofocus="" value="{{ old('email') }}"/>
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                         @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                            <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>


                        </div>

                        <a class="small text-muted" href="#">Forgot Password?</a>

                    </div>

                    <div class="text-center">

                        <button type="submit" class="btn text-dark bg-warning px-4">Login Account</button>
                    </div>


                </form>

                <div class=" mt-3 text-center ">
                    <a href="{{route('register')}} " class="text-dark text-decoration-none">Need an account? Sign Up!</a>
                </div>
            </div>
        </div>
    </div>
<!-- Contact Form End -->
</x-frontend>