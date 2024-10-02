<x-backend>
    @php
    $id=$songs->id;
    $name=$songs->name;
    $photo=$songs->photo;
    $file=$songs->file;
    $artist_id=$songs->artist_id;
    $album_id=$songs->album_id;
    $category_id = $songs->category_id;


    @endphp

<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Song Edit Form </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.song.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>

         <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('backside.song.update',$id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                         <input type="hidden" name="oldPhoto" value="{{ $photo }}">
                            
                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="name" value="{{ $name }}">
                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                <div class="col-sm-10">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="oldPhoto-tab" data-toggle="tab" href="#oldPhotoTab" role="tab" aria-controls="oldPhotoTab" aria-selected="true"> Old Photo </a>
                                        </li>
                                      
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="newPhoto-tab" data-toggle="tab" href="#newPhotoTab" role="tab" aria-controls="newPhotoTab" aria-selected="false"> New Photo </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="oldPhotoTab" role="tabpanel" aria-labelledby="oldPhoto-tab">
                                            <img src="{{ asset($photo) }}" class="img-fluid w-25">
                                        </div>
                                        
                                        <div class="tab-pane fade" id="newPhotoTab" role="tabpanel" aria-labelledby="newPhoto-tab">
                                            <input type="file" id="photo_id" name="photo">
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> File </label>
                                <div class="col-sm-10">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="oldPhoto-tab" data-toggle="tab" href="#oldPhotoTab1" role="tab" aria-controls="oldPhotoTab" aria-selected="true"> Old File </a>
                                        </li>
                                      
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="newPhoto-tab" data-toggle="tab" href="#newPhotoTab1" role="tab" aria-controls="newPhotoTab" aria-selected="false"> New File </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="oldPhotoTab1" role="tabpanel" aria-labelledby="oldPhoto-tab">
                                            <img src="{{ asset($file) }}" class="img-fluid w-25">
                                        </div>
                                        
                                        <div class="tab-pane fade" id="newPhotoTab1" role="tabpanel" aria-labelledby="newPhoto-tab">
                                            <input type="file" id="photo_id" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Artist </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="artistid">
                                        <option> Choose Artist </option>
                                        
                                       @foreach($artists as $artist)
                                            <option value="{{ $artist->id }}" @if($artist_id == $artist->id) {{'selected'}} @endif> {{ $artist->name }} </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('artistid') }}
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Album </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="albumid">
                                        <option> Choose Album </option>
                                        
                                        @foreach($albums as $album)
                                            <option value="{{ $album->id }}" @if($album_id == $album->id) {{'selected'}} @endif> {{ $album->name }} </option>
                                        @endforeach
                                        
                                    </select>
                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('albumid') }}
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="categoryid">
                                        <option> Choose Category </option>
                                        
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category_id == $category->id) {{'selected'}} @endif> {{ $category->name }} </option>
                                        @endforeach
                                        
                                    </select>
                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('categoryid') }}
                                    </div>
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


