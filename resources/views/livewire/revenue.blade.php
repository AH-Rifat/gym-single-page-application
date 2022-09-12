<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title row d-flex justify-content-end">
                        <div class="mb-3 col-sm-2">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control" wire:model.prevent.debounce.500ms="year"
                                placeholder="Enter Year">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <th>Months</th>
                                <th>Income</th>
                                <th>Expense</th>
                                <th>Total</th>
                            </thead>
                            <tr>
                                <th>Janurary</th>
                                <td>{{ $jan }}</td>
                                <td>{{ $exp_jan }}</td>
                                <td>{{ $jan - $exp_jan }}</td>
                            </tr>
                            <tr>
                                <th>February</th>
                                <td>{{ $feb }}</td>
                                <td>{{ $exp_feb }}</td>
                                <td>{{ $feb - $exp_feb }}</td>
                            </tr>
                            <tr>
                                <th>March</th>
                                <td>{{ $mar }}</td>
                                <td>{{ $exp_mar }}</td>
                                <td>{{ $mar - $exp_mar }}</td>
                            </tr>
                            <tr>
                                <th>April</th>
                                <td>{{ $april }}</td>
                                <td>{{ $exp_april }}</td>
                                <td>{{ $april - $exp_april }}</td>
                            </tr>
                            <tr>
                                <th>May</th>
                                <td>{{ $may }}</td>
                                <td>{{ $exp_may }}</td>
                                <td>{{ $may - $exp_may }}</td>
                            </tr>
                            <tr>
                                <th>june</th>
                                <td>{{ $jun }}</td>
                                <td>{{ $exp_jun }}</td>
                                <td>{{ $jun - $exp_jun }}</td>
                            </tr>
                            <tr>
                                <th>July</th>
                                <td>{{ $jul }}</td>
                                <td>{{ $exp_jul }}</td>
                                <td>{{ $jul - $exp_jul }}</td>
                            </tr>
                            <tr>
                                <th>August</th>
                                <td>{{ $aug }}</td>
                                <td>{{ $exp_aug }}</td>
                                <td>{{ $aug - $exp_aug }}</td>
                            </tr>
                            <tr>
                                <th>September</th>
                                <td>{{ $sep }}</td>
                                <td>{{ $exp_sep }}</td>
                                <td>{{ $sep - $exp_sep }}</td>
                            </tr>
                            <tr>
                                <th>Octobor</th>
                                <td>{{ $oct }}</td>
                                <td>{{ $exp_oct }}</td>
                                <td>{{ $oct - $exp_oct }}</td>
                            </tr>
                            <tr>
                                <th>November</th>
                                <td>{{ $nov }}</td>
                                <td>{{ $exp_nov }}</td>
                                <td>{{ $nov - $exp_nov }}</td>
                            </tr>
                            <tr>
                                <th>December</th>
                                <td>{{ $dec }}</td>
                                <td>{{ $exp_dec }}</td>
                                <td>{{ $dec - $exp_dec }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-danger fw-bold">Total Revenue of The Year:</td>
                                <td class="text-danger fw-bold">{{ $total - $exp_total }} Taka</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
