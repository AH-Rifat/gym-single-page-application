<div class="row">
    <div class="col-xl col-sm col-md">
        @include('errorMgs')
        @include('toastrMgs')
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Member Details</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="MemberUpdate({{ $editId }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Name</label>
                                <input type="hidden" name="id" wire:model="editId">
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
                                <input type="number" wire:model.lazy="age" class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Height</label>
                                <input type="number" wire:model.lazy="height" class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Weight</label>
                                <input type="number" wire:model.lazy="weight" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label class="form-label">Work</label>
                                <input type="text" wire:model.lazy="work" class="form-control" placeholder="" />
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
                                <input type="text" wire:model.lazy="address" class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="number" wire:model.lazy="mobile" class="form-control" placeholder="" />
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
                                <input type="file" wire:model.lazy="photo" class="form-control" placeholder="" />
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
