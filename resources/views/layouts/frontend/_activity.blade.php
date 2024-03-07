<div class="container-lg">
    <div class="page-header">
        <div class="col-center">
            <h2 class="text-center text-bold" style="color: black">
                Employee Activity
            </h2>
        </div>
    </div>
    <div class="col-center">
        <h3 class="text-left" style="color: black">
            Events
        </h3>
    </div>
    <div class="card-group">

        @foreach ($event as $data)
            <div class="col-6 mx-auto" style="width: 22rem; height: 20rem">
                <div class="card shadow">
                    <img src="{{ $data->cover }}" class="img-fluid" alt="" />
                    <div class="card-body">
                        <h3 class="text-capitalize">{{ $data->name }}</h3>
                        {{-- <p class="card-text text-break">{{ $data->description }}</p> --}}
                        <a class="btn btn-info" href="{{ route('event.show', $data->slug) }}">Lihat</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row row-cols-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="card">
                <img src="{{ url(asset('assets/images/content5.png')) }}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="{{ url(asset('assets/images/content6.png')) }}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="{{ url(asset('assets/images/content2.png')) }}" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
</div>
