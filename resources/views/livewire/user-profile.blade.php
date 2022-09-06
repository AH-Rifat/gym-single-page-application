<div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Profile Photo</h3>
                    <div class="text-center">
                        @if ($photo)
                            <img wire:ignore.self src="{{ asset('storage/' . $photo) }}" class="img-fluid rounded" alt="user-photo">
                        @else
                            <img wire:ignore.self src="{{ asset('assets/img/avatars/8.png') }}" class="img-fluid rounded"
                                alt="user-photo">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button wire:ignore.self type="button" class="nav-link active" role="tab"
                            data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile"
                            aria-controls="navs-pills-top-profile" aria-selected="false">
                            Profile
                        </button>
                    </li>
                    <li class="nav-item">
                        <button wire:ignore.self type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-change-password"
                            aria-controls="navs-pills-top-change-password" aria-selected="true">
                            Change Password
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    @include('toastrMgs')
                    <div wire:ignore.self class="tab-pane fade show active" id="navs-pills-top-profile" role="tabpanel">
                        <form wire:submit.prevent="updateProfile" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" wire:model="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" wire:model="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Upload Photo</label>
                                <div class="col-sm-6">
                                    <input type="file" wire:model="photo"
                                        class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="navs-pills-top-change-password" role="tabpanel">
                        <form wire:submit.prevent="changePassword" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Current Password</label>
                                <div class="col-sm-6">
                                    <input type="password" wire:model="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror">
                                    @error('current_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" wire:model="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Confirm Password</label>
                                <div class="col-sm-6">
                                    <input type="password" wire:model="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
