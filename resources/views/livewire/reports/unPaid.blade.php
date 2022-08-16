<div class="card">
    <div class="card-header">
        <h4>Unpaid Members</h4>{{$id_or_name}}
        <div class="d-flex justify-content-end">
            <input class="form-control me-2"  type="text" wire:model.prevent="id_or_name" placeholder="Search by Name" style="width: 13%">
            <select class="form-select"  wire:model.prevent="paginateValue" style="width: 5rem">
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Last Date Of Payment</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($unpaidInfo as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->lastDate->payment_date->format('Y-m-d') }}</td>
                        {{-- <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i
                                    class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="fw-bold text-danger">No Result <i class='bx bxs-file-find'></i></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="m-4">
            <hr>
            {{ $unpaidInfo->links() }}
        </div>
    </div>
</div>
