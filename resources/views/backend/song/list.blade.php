<x-backend>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Song </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.song.create') }}" class="btn btn-outline-primary">
                    <i class="icofont-plus icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        @if(session('successMsg') != NULL)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> ✅ SUCCESS!</strong>
                            {{ session('successMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="sampleTable">
                                <thead class="bg-primary text-white">
                                    <tr>
                                      <th>#</th>
                                      <th>Song name</th>
                                      <th>Photo</th>
                                      <th>File</th>
                                      <th>Artist</th>
                                      <th>Album</th>
                                      <th>Category</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp

                                @foreach($songs as $song)

                                @php
                                $id = $song->id;
                                $name = $song->name;
                                $photo = $song->photo;
                                $file=$song->file;
                                $artist=$song->artist_id;
                                $album=$song->album_id;
                                $category=$song->category_id;

                                @endphp
                                <tr>
                                    <td> {{ $i++ }}. </td>
                                    <td>{{$name}} </td>
                                    <td> 
                                        <img src="{{ asset($photo) }}" class="img-fluid" style="width: 70px;"></td>
                                        <td> 
                                         <audio controls>
                                            <source src=" {{asset($file)}} " type="audio/mp3">
                                          </audio>
{{--                                           {{$file}}
 --}}                                      </td>
                                      <td>{{$artist}} </td>
                                      <td>{{$album}} </td>
                                      <td>{{$category}} </td>
                                      <td>
                                        <a href="{{ route('backside.song.edit',$id) }}" class="btn btn-warning">
                                            <i class="icofont-ui-settings icofont-1x"></i>
                                        </a>

                                        <form action="{{ route('backside.song.destroy',$id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-outline-danger" type="submit"> 
                                                <i class="icofont-close icofont-1x"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-backend>