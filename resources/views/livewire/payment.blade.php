<div>
    @include('toastrMgs')
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Payment Form</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label class="form-label">Member ID</label>
                            <input type="number" class="form-control @error('member_id') is-invalid @enderror"
                                wire:model.lazy="member_id" placeholder="Enter Your ID">
                            @error('member_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                wire:model.lazy="amount" placeholder="Enter Amount">
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date"class="form-control @error('payment_date') is-invalid @enderror"
                                wire:model.lazy="payment_date">
                            @error('payment_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Note</label>
                            <textarea class="form-control" wire:model.lazy="note" placeholder="Note ( Optional )"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Payment</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header row">
                    <div class="col-xl-10"></div>
                    <div class="col-xl-2">
                        <select class="form-select" wire:model.prevent="paginateValue">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->member_id }}</td>
                                    <td><i class="fab fa-angular fa-lg text-danger"></i>
                                        <strong>{{ $item->memberTable->name }}</strong>
                                    </td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    wire:click.prevent="editPayment({{ $item->id }})"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <a class="dropdown-item" href="" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    wire:click.prevent="deletePayment({{ $item->id }})">
                                                    <i class="bx bx-trash me-1"></i>Delete</a>
                                            </div>
                                        </div>
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
                            <h2>Are you Sure ?</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" wire:click.prevent="deletePaymentInfo" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Edit Modal --}}
    <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                {{-- <label class="form-label">Member ID</label> --}}
                                <input type="hidden" class="form-control @error('member_id') is-invalid @enderror"
                                    wire:model.lazy="member_id" placeholder="Enter Your ID" disabled>
                                @error('member_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                    wire:model.lazy="amount" placeholder="Enter Amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="date"class="form-control @error('payment_date') is-invalid @enderror"
                                    wire:model.lazy="payment_date">
                                @error('payment_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Note</label>
                                <textarea class="form-control" wire:model.lazy="note" placeholder="Note ( Optional )"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" wire:click.prevent="updatePaymentInfo"
                        class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
