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