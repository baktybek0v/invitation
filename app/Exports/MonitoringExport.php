<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class MonitoringExport implements FromCollection
{
    protected $q_result;

    public function __construct($q_result)
    {
        $this->q_result = $q_result;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->q_result;
    }

}
