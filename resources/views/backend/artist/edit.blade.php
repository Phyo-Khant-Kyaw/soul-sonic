<x-backend>
    @php 
    $id= $artist->id;
    $name= $artist->name;
    $photo= $artist->photo;


    @endphp

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Artist Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href=" {{route('backside.artist.index')}}" class="btn btn-outline-primary">
                        <i class="icofont-double-left icofont-1x"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="{{route('backside.artist.update',$id)}}" method="post" enctype="multipart/form-data">

                                @csrf {{-- cross site request forqery --}}
                                @method('PUT')
                                <input type="hidden" name="photo" value="{{$photo}}">

                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="{{$name}}">

                                     
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label" > photo </label>
                                    <div class="col-sm-10">


                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldphoto" role="tab" aria-controls="home" aria-selected="true" >Old Photo</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">new Photo</a>
                        </li>

                    </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="home-tab">
                            <img src="{{ asset($photo)}}" id="editphoto" width="100" height="100"></div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" name="photo"></div>
                        
                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

</x-backend>