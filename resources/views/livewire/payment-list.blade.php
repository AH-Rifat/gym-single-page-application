<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-block">
                            <input type="checkbox" wire:model="showFilter" class="btn-check" id="filter-btn-check"
                                checked="" autocomplete="off">
                            <label class="btn btn-primary" for="filter-btn-check"><i
                                    class='bx bx-filter-alt me-2'></i>Filter</label>
                        </div>
                        <div class="d-flex align-self-end">
                            @if ($showFilter == true)
                                <input class="form-control me-2" type="date" wire:model.prevent="selectDate">
                                <input class="form-control" placeholder="Year" type="text" wire:model.debounce.1000ms="year">
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
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->member_id }}</td>
                                    <td>{{ $item->memberTable->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->payment_date }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
