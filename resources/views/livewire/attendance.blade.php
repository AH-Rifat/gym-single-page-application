<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#add-attendance" aria-controls="add-attendance" aria-selected="true">
                            Add Attendance
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                            aria-selected="false">
                            Find Member History
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="add-attendance" role="tabpanel">
                        <form class="row d-flex align-self-center">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="form-label">Member ID</label>
                                <input type="number" class="form-control" placeholder="Enter Member ID">
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <label class="form-label"> </label>
                                <button type="submit" class="btn btn-primary fw-bold form-control mt-2 ms-1">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                        <form class="row d-flex align-self-center">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="form-label">Member ID</label>
                                <input type="number" class="form-control" placeholder="Enter Member ID">
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <label class="form-label"> </label>
                                <button type="submit" class="btn btn-success fw-bold fs-5 form-control mt-1 ms-1">Find</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Members Attendance</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Date</th>
                                <th>Member Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>07-02-2022</td>
                                <td>Albert Cook</td>
                                <td><span class="badge bg-label-primary me-1">Present</span></td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-info">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-danger ms-3">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
