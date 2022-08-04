<div>
    @if (isset($editId))
        @include('livewire.editMember')
    @else
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                @include('errorMgs')
                @include('toastrMgs')
                <div class="card">
                    <h5 class="card-header">
                        <div class="d-flex justify-content-between">
                            <p>Members</p>

                            <button type="button" class="btn rounded-pill btn-dark" data-bs-toggle="modal"
                                data-bs-target="#largeModal">Add
                                Member</button>
                        </div>
                    </h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Mobile Number</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($members as $member)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $member->id }}</strong>
                                        </td>
                                        <td>{{ $member->name }}</td>
                                        <td>
                                            @if ($member->photo == null)
                                                <img src="assets/img/avatars/8.png" width="60" alt="Avatar"
                                                    class="rounded-circle">
                                            @else
                                                <img src="{{ $member->photo }}" width="60" alt="Avatar"
                                                    class="rounded-circle">
                                            @endif
                                        </td>
                                        <td>{{ $member->mobile }}</td>
                                        <td>{{ date_format($member->created_at, 'd-m-Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        wire:click="edit({{ $member->id }})"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item btn" data-bs-toggle="modal"
                                                        wire:click="deleteMember({{ $member->id }})"
                                                        data-bs-target="#deleteModal"><i class="bx bx-trash me-1"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $members->links() }}
                        </div>
                    </div>
                </div>
            </div>
    @endif
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
                    <button type="button" wire:click.prevent="deleteMemberInfo" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" data-bs-backdrop="static" id="largeModal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Member Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent.lazy="save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" wire:model.lazy="name" class="form-control"
                                    placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" wire:model.lazy="email" class="form-control"
                                    placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">DOB</label>
                                <input type="date" wire:model.lazy="dob" class="form-control"
                                    placeholder="DD / MM / YY" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label class="form-label">Age</label>
                                <input type="number" wire:model.lazy="age" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Height</label>
                                <input type="number" wire:model.lazy="height" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Weight</label>
                                <input type="number" wire:model.lazy="weight" class="form-control"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label class="form-label">Work</label>
                                <input type="text" wire:model.lazy="work" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Blood Group</label>
                                <select class="form-select" wire:model.lazy="bloodGroup">
                                    <option>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select" wire:model.lazy="gender">
                                    <option></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" wire:model.lazy="address" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="number" wire:model.lazy="mobile" class="form-control"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-6 mb-3">
                                <label class="form-label">National ID</label>
                                <input type="number" wire:model.lazy="nationalId" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" wire:model.lazy="photo" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col-2 mb-3">
                                <label class="form-label">Package</label>
                                <select class="form-select" wire:model.lazy="package">
                                    <option></option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label class="form-label">Total</label>
                                <input type="number" wire:model.lazy="total" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Paid</label>
                                <input type="number" wire:model.lazy="paid" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Due</label>
                                <input type="number" wire:model.lazy="due" class="form-control"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
