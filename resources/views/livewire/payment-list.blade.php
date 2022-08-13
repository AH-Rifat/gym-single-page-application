<div>
    @include('toastrMgs')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-block">
                            <input type="checkbox" wire:model="showFilter" class="btn-check" id="filter-btn-check"
                                checked="" autocomplete="off">
                            <label class="btn btn-primary" for="filter-btn-check"><i
                                    class='bx bx-filter-alt me-2'></i>Filter {{$paginateValue}}</label>
                        </div>
                        <div class="d-flex align-self-end">
                            @if ($showFilter == true)
                                <input class="form-control me-2" type="date" wire:model.prevent="selectDate">
                                <input class="form-control" placeholder="Year" type="text"
                                    wire:model.debounce.1000ms="year">
                                    <select class="form-select w-25 ms-1" wire:model.prevent="paginateValue">
                                        <option value="10" selected>10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->member_id }}</td>
                                    <td>{{ $item->memberTable->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->payment_date->format('Y-m-d') }}</td>
                                    <td><button class="btn btn-icon btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            wire:click.lazy="getDeleteId({{ $item->id }})">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button></td>
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
                                    <td colspan="5" class="fw-bold text-danger">No Result <i
                                            class='bx bxs-file-find'></i></td>
                                </tr>
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
                    <button type="button" wire:click.prevent="deletePayment" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
