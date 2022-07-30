<?php
namespace App\Http\Services;

class HomePageServices {

    public function fillTransactionsCountByDays($days, $transactions_rows) {
        $transactions = [];
        $current = now()->subDays($days);
        for ($day=0; $day < $days; $day++) {
            $date = $current->addDay(1)->format('Y-m-d');
            if(array_key_exists($date, $transactions_rows)) {
                $transactions[$date] = $transactions_rows[$date][0]->total;
            }
            else {
                $transactions[$date] = 0;
            }
        }
        return $transactions;
    }
}


?>