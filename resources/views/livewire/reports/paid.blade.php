<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Paid Members</h4>
        <h5 class="text-danger">Total Amount : {{$totalAmount}} Taka</h5>
        <div class="mb-3">
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
            <thead>
                <tr>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>date</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($paidInfo as $item)
                    
                <tr>
                    <td>{{ $item->member_id }}</td>
                    <td>{{ $item->memberTable->name }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->payment_date->format('Y-m-d') }}</td>
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
                        </td>
                    </tr> --}}
                    @endforeach
            </tbody>
        </table>
        <div class="m-4">
            <hr>
            {{ $paidInfo->links() }}
        </div>
    </div>
</div>