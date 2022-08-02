@if ($errors->any())

    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul class="list-unstyled">
            {{-- <div class="card mb-3">
                <div class="card-header"> --}}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                {{-- </div>
            </div> --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </ul>
    </div>
@endif
@if (session()->has('success'))
    {{-- <div class="card mb-4">
        <div class="card-header"> --}}
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {{-- </div>
    </div> --}}
@endif
@if (session()->has('danger'))
    
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="card mb-4">
            <div class="card-header">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
