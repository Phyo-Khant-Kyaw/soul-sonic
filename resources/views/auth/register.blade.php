<x-frontend>

    <!-- Contact Form Begin -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="{{route('register')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="small mb-1" for="inputName"> Name</label>
                                  <input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" autofocus="" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="small mb-1" for="Profile"> Profile</label><br>
                                  <input id="Profile" type="file" name="profile" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="small mb-1" for="inputPassword">Password</label>
                                  <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                  <font id="error" color="red"></font>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                  <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                  <font id="cerror" color="red"></font>
                                </div>
                            </div>
                        </div>

                        
                        <div class="text-center">
                            
                            <button type="submit" class="btn btn-warning"> Create Account </button>
                        </div>
                    </form>

                    <div class=" mt-3 text-center ">
                        <a href="{{route('login')}} " class="text-dark text-decoration-none">Have an account? Go to login</a>
                    </div>
                </div>
            </div>
    </div>
    <!-- Contact Form End -->
</x-frontend>