<div>
    @include('toastrMgs')
    <form wire:submit.prevent="send" method="post">
        <div class="row">
            <div class="col-sm-8">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <button wire:ignore.self type="button" class="nav-link active" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-pills-top-All"
                                aria-controls="navs-pills-top-All" aria-selected="true">
                                All
                            </button>
                        </li>
                        <li class="nav-item">
                            <button wire:ignore.self type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-Unpaid" aria-controls="navs-pills-top-Unpaid"
                                aria-selected="false">
                                Unpaid
                            </button>
                        </li>
                        <li class="nav-item">
                            <button wire:ignore.self type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-deactive" aria-controls="navs-pills-top-deactive"
                                aria-selected="false">
                                De-active
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div wire:ignore.self class="tab-pane fade active show" id="navs-pills-top-All" role="tabpanel">
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-2 mb-3">
                                    <select class="form-control" wire:model="paginateValue">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-borderless align-middle">
                                    <thead class="table-primary">
                                        <tr>
                                            <th><input wire:model="selectAll" class="form-check-input" type="checkbox">
                                            </th>
                                            <th>Member ID</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @forelse ($allMembers as $item)
                                            <tr>
                                                <td><input wire:model="selectNumbers" class="form-check-input" type="checkbox"
                                                        value="0{{ $item->mobile }}"></td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>0{{ $item->mobile }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $allMembers->links() }}
                            </div>
                        </div>
                        <div wire:ignore.self class="tab-pane fade" id="navs-pills-top-Unpaid" role="tabpanel">
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-2 mb-3">
                                    <select class="form-control" wire:model="paginateValue1">
                                        <option value="1">10</option>
                                        <option value="20">20</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-borderless align-middle">
                                    <thead class="table-primary">
                                        <tr>
                                            <th><input wire:model="selectAll1" class="form-check-input" type="checkbox">
                                            </th>
                                            <th>Member ID</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">

                                        @forelse ($unPaidMembers as $item)
                                            <tr>
                                                <td><input wire:model="selectNumbers1" class="form-check-input" type="checkbox"
                                                        value="0{{ $item->mobile }}"></td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>0{{ $item->mobile }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $unPaidMembers->links() }}
                            </div>
                        </div>
                        <div wire:ignore.self class="tab-pane fade" id="navs-pills-top-deactive" role="tabpanel">
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-2 mb-3">
                                    <select class="form-control" wire:model="paginateValue2">
                                        <option value="1">10</option>
                                        <option value="20">20</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-borderless align-middle">
                                    <thead class="table-primary">
                                        <tr>
                                            <th><input wire:model="selectAll2" class="form-check-input" type="checkbox">
                                            </th>
                                            <th>Member ID</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">

                                        @forelse ($deactiveMembers as $item)
                                            <tr>
                                                <td><input wire:model="selectNumbers2" class="form-check-input" type="checkbox"
                                                        value="0{{ $item->mobile }}"></td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>0{{ $item->mobile }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $deactiveMembers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea wire:model="mgs" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">SEND SMS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
