<div class="learning container-lg">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-center">
                <h2 class="text-center" style="color: black">
                    Our System Learning
                </h2>
            </div>
        </div>
    </div>
    <div class="col-center">
        <h3 class="text-left" style="color: black">
            Series
        </h3>
    </div>
    <div class="card-group">
        @foreach ($series as $data)
            <div class="col-6 mx-auto" style="width: 22rem; height: 22rem">
                <div class="card shadow" style="width: 22rem; height: 23rem">
                    <img src="{{ $data->cover }}" class="img-fluid" />
                    <div class="card-body">
                        <h2 class="text-capitalize">{{ $data->name }}</h2>
                        <p class="card-text text-truncate text-wrap" style="max-width: 25rem; height: 3rem">
                            {{ $data->description }}</p>
                        <a class="btn btn-info" href="{{ route('series.show', $data->slug) }}">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <nav aria-label="Page">
        <ul class="pagination justify-content-left">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>

<link href="https://raw.githubusercontent.com/twbs/bootstrap/master/dist/css/bootstrap.css" />
{{-- <div class="col-center">
        <h3 class="text-left" style="color: black">
            MTP - LDP - SDP
        </h3>
    </div>
    <div class="card-group">
        <div class="col">
            <div class="card shadow" style="width: 20rem;">
                <img src="{{url('/assets/images/content4.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow" style="width: 20rem;">
                <img src="{{url('/assets/images/content5.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow" style="width: 20rem;">
                <img src="{{url('/assets/images/content6.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
     --}}

{{--  <div class="row">
            @foreach ($series as $data)
                <div class="col-12 col-lg-4">
                    <a class="text-dark" href="{{ route('series.show', $data->slug) }}">
                        <div class="card card-stacked">
                            <div class="ribbon bg-primary">New</div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $data->name }}</h3>
                                <p class="text-muted">{{ $data->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        {{ $data->videos->count() }} Episode
                                    </div>
                                    <div>
                                        Rp. {{ number_format($data->price) }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-device-desktop-analytics" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="3" y="4" width="18" height="12" rx="1"></rect>
                                            <path d="M7 20h10"></path>
                                            <path d="M9 16v4"></path>
                                            <path d="M15 16v4"></path>
                                            <path d="M9 12v-4"></path>
                                            <path d="M12 12v-1"></path>
                                            <path d="M15 12v-2"></path>
                                            <path d="M12 12v-1"></path>
                                        </svg>
                                        {{ $data->level }}
                                    </div>
                                    <div class="{{ $data->status == 1 ? 'text-teal' : 'text-danger' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-circle-check" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M9 12l2 2l4 -4"></path>
                                        </svg>
                                        {{ $data->status == 1 ? 'Completed' : 'Developed' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <x-button.button-link title="See More Series" url="{{ route('series.index') }}" icon="bars"
                        class="btn btn-dark" />
                </div>
            </div>
        </div> --}}
{{-- </div> --}}
