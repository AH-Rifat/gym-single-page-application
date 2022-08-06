<div>
    @include('toastrMgs')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                {{-- <div class="card-header">
                    <h5 class="mb-0">Basic Layout</h5>
                </div> --}}
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Name" wire:model.lazy="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="col-sm-3 col-form-label">Amount</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                    placeholder="Enter Amount" wire:model.lazy="amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="col-sm-3 col-form-label">Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    wire:model.lazy="date">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="col-sm-3 col-form-label mb-2"></label>
                                <input type="submit" class="form-control btn btn-primary" value="save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>All Expence</h5>
                    <input type="month" name="" class="form-control w-25" wire:model.prevent="month">
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($data as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger"></i>
                                        <strong>{{ $item->name }}</strong>
                                    </td>
                                    <td>{{ $item->amount }} TK</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal"
                                            href="javascript:void(0);" wire:click.lazy="editId({{ $item->id }})"><i
                                                class="bx bx-edit-alt "></i> Edit</a>

                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            href="javascript:void(0);"
                                            wire:click.lazy="deleteId({{ $item->id }})"><i class="bx bx-trash "></i>
                                            Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="fw-bold text-danger">No Result <i
                                            class='bx bxs-file-find'></i></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $data->links() }}
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
                            <h2>Are you Sure ?</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" wire:click.prevent="deleteExpence" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    {{-- edit Modal --}}
    <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Name" wire:model.lazy="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Amount</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                    placeholder="Enter Amount" wire:model.lazy="amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    wire:model.lazy="date">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" wire:click.prevent="updateExpence" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
