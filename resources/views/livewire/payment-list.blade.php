<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-block">
                            <input type="checkbox" wire:model="showFilter" class="btn-check" id="filter-btn-check" checked=""
                                autocomplete="off">
                            <label class="btn btn-primary" for="filter-btn-check"><i class='bx bx-filter-alt me-2'></i>Filter</label>
                        </div>
                        <div class="d-flex align-self-end">
                            @if ($showFilter == true)
                            <input class="form-control me-2" type="date">
                            <input class="form-control" type="month">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
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
                            <tr>
                                <td>1</td>
                                <td>Albert Cook</td>
                                <td>600</td>
                                <td>31-07-200-22</td>
                                <td>
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
