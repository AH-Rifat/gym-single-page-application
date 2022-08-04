<div>
    @include('errorMgs')
    @include('toastrMgs')
    <div class="row">
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3>Attendence</h3>
                </div>
                <div class="card-body">
                    <form class="row d-flex align-self-center" wire:submit.prevent="store">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="form-label">Member ID</label>
                            <input type="number" class="form-control @error('member_id') is-invalid @enderror"
                                wire:model.lazy="member_id" placeholder="Enter Member ID">
                            @error('member_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                wire:model.lazy="date">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="form-label"> </label>
                            <button type="submit" class="btn btn-primary fw-bold form-control mt-2 ms-1">Save
                                Attendance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Members Attendance</h5>
                    <a href="/find_attendance" class="btn btn-primary">Find</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Date</th>
                                <th>Member Id</th>
                                <th>Member Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->member_id }}</td>
                                    <td>{{ $item->memberTable->name }}</td>
                                    <td><span class="badge bg-label-primary me-1">Present</span></td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-icon btn-info">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button> --}}
                                        <button type="button" class="btn btn-icon btn-danger ms-3"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            wire:click.lazy="deleteAttendance({{ $item->id }})">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-4">
                        <hr>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <h2>Are youe Sure ?</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" wire:click.prevent="deleteAttendanceInfo"
                        class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
