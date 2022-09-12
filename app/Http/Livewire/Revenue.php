<?php

namespace App\Http\Livewire;

use App\Models\Expence;
use App\Models\Payment;
use Livewire\Component;

class Revenue extends Component
{
    public $year;

    public function render()
    {
        $total = Payment::whereYear('payment_date', $this->year)->sum('amount');
        $exp_total = Expence::whereYear('date', $this->year)->sum('amount');

        $jan = Payment::whereMonth('payment_date', 1)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_jan = Expence::whereMonth('date', 1)->whereYear('date', $this->year)->sum('amount');

        $feb = Payment::whereMonth('payment_date', 2)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_feb = Expence::whereMonth('date', 2)->whereYear('date', $this->year)->sum('amount');

        $mar = Payment::whereMonth('payment_date', 3)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_mar = Expence::whereMonth('date', 3)->whereYear('date', $this->year)->sum('amount');

        $april = Payment::whereMonth('payment_date', 4)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_april = Expence::whereMonth('date', 4)->whereYear('date', $this->year)->sum('amount');

        $may = Payment::whereMonth('payment_date', 5)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_may = Expence::whereMonth('date', 5)->whereYear('date', $this->year)->sum('amount');

        $jun = Payment::whereMonth('payment_date', 6)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_jun = Expence::whereMonth('date', 6)->whereYear('date', $this->year)->sum('amount');

        $jul = Payment::whereMonth('payment_date', 7)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_jul = Expence::whereMonth('date', 7)->whereYear('date', $this->year)->sum('amount');

        $aug = Payment::whereMonth('payment_date', 8)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_aug = Expence::whereMonth('date', 8)->whereYear('date', $this->year)->sum('amount');

        $sep = Payment::whereMonth('payment_date', 9)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_sep = Expence::whereMonth('date', 9)->whereYear('date', $this->year)->sum('amount');

        $oct = Payment::whereMonth('payment_date', 10)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_oct = Expence::whereMonth('date', 10)->whereYear('date', $this->year)->sum('amount');

        $nov = Payment::whereMonth('payment_date', 11)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_nov = Expence::whereMonth('date', 11)->whereYear('date', $this->year)->sum('amount');

        $dec = Payment::whereMonth('payment_date', 12)->whereYear('payment_date', $this->year)->sum('amount');
        $exp_dec = Expence::whereMonth('date', 12)->whereYear('date', $this->year)->sum('amount');

        return view('livewire.revenue', compact(
            'total',
            'exp_total',
            'jan',
            'exp_jan',
            'feb',
            'exp_feb',
            'mar',
            'exp_mar',
            'april',
            'exp_april',
            'may',
            'exp_may',
            'jun',
            'exp_jun',
            'jul',
            'exp_jul',
            'aug',
            'exp_aug',
            'sep',
            'exp_sep',
            'oct',
            'exp_oct',
            'nov',
            'exp_nov',
            'dec',
            'exp_dec'
        ));
    }
}
