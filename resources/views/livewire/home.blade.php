<div>
    @if ($show == 'paid')
        @include('livewire.reports.paid')
    @elseif ($show == 'unpaid')
        @include('livewire.reports.unPaid')
    @elseif ($show == 'deactive')
        @include('livewire.reports.deactive')
    @else
        @php
            $jan = DB::table('payments')
                ->whereMonth('payment_date', 1)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $feb = DB::table('payments')
                ->whereMonth('payment_date', 2)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $mar = DB::table('payments')
                ->whereMonth('payment_date', 3)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $apr = DB::table('payments')
                ->whereMonth('payment_date', 4)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $may = DB::table('payments')
                ->whereMonth('payment_date', 5)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $jun = DB::table('payments')
                ->whereMonth('payment_date', 6)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $jul = DB::table('payments')
                ->whereMonth('payment_date', 7)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $aug = DB::table('payments')
                ->whereMonth('payment_date', 8)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $sep = DB::table('payments')
                ->whereMonth('payment_date', 9)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $oct = DB::table('payments')
                ->whereMonth('payment_date', 10)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $nov = DB::table('payments')
                ->whereMonth('payment_date', 11)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');
            $dec = DB::table('payments')
                ->where('payment_date', 12)
                ->whereYear('payment_date', date('Y'))
                ->sum('amount');

                $totalMale = DB::table('members')
                ->where('gender', 'Male')
                ->count('gender');
                $totalFemale = DB::table('members')
                ->where('gender', 'Female')
                ->count('gender');
        @endphp
        <div class="row">
            <div class="col-lg-3">
                <div class="card" style="background-color: #FF63A4; color:white">
                    <div class="card-body">
                        <span class="d-block mb-2">Total Members</span>
                        <div class="text-nowrap fs-2 mb-2">{{ $totalMembers }}</div>
                        <small class="fw-semibold fs-6" style="cursor: pointer;">view more</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="background-color: #366BFFFF; color:white">
                    <div class="card-body">
                        <span class="d-block mb-2">Paid Members</span>
                        <div class="text-nowrap fs-2 mb-2">{{ $totalPaidMembers }}</div>
                        <small class="fw-semibold fs-6" wire:click.lazy="viewPaidMembers" style="cursor: pointer;">view
                            more</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="background-color: #BA61FFFF; color:white">
                    <div class="card-body">
                        <span class="d-block mb-2">Dues Members</span>
                        <div class="text-nowrap fs-2 mb-2">{{ $totalUnpaidMembers }}</div>
                        <small class="fw-semibold fs-6" wire:click.lazy="viewUnpaidMembers"
                            style="cursor: pointer;">view more</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="background-color: #FF5465FF; color:white">
                    <div class="card-body">
                        <span class="d-block mb-2">De-active Members</span>
                        <div class="text-nowrap fs-2 mb-2">{{ $totalDeactiveMembers }}</div>
                        <small class="fw-semibold fs-6" wire:click.lazy="viewDeactiveMembers"
                            style="cursor: pointer;">view more</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myC" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@section('js')
@isset($jan)
    
    <script>
        var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
            "November", "December"
        ];
        var yValues = [{{ $jan }},{{ $feb }},{{ $mar }},{{ $apr }},{{ $may }},{{ $jun }},{{ $jul }},{{ $aug }},{{ $sep }},{{ $oct }},{{ $nov }},{{ $dec }}];
        var barColors = ["#6CA61F", "#1F86A6", "#1F2DA6", "#9B1FA6", "#A61F60", "#A61F1F", "#A6781F", "#93A61F", "#1F86A6",
            "#0B3B24", "#0F2C4F", "#7330FF"
        ];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "INCOME {{ date('Y') }}"
                }
            }
        });
    </script>
    <script>
        var xValues = ["Male", "Female"];
        var yValues = [{{$totalMale}}, {{$totalFemale}}];
        var barColors = ["#C41B1B", "#FF2E85"];

        new Chart("myC", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: false,
                    text: "INCOME {{ date('Y') }}"
                }
            }
        });
    </script>
@endisset
@endsection
