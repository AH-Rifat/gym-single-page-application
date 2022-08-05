<div>
    <div class="row">
@include('toastrMgs')
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <form class="row d-flex align-self-center">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="form-label">Member ID</label>
                            <input type="number" class="form-control" wire:model.prevent="member_id"
                                placeholder="Enter Member ID">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="form-label">Month</label>
                            <input type="number" class="form-control" wire:model.prevent="month">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="form-label">Year</label>
                            <input type="number" class="form-control" wire:model.prevent="year">
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

                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Date</th>
                                <th>Member Id</th>
                                <th>Member Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->member_id }}</td>
                                    <td>{{ $item->memberTable->name }}</td>
                                    <td><span class="badge bg-label-primary me-1">Present</span></td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="fw-bold text-danger">No Result <i class='bx bxs-file-find'></i></td></tr>
                            @endforelse
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
</div>
