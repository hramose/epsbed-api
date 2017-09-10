<?php

namespace App\Responses;

use Illuminate\Contracts\Support\Responsable;

class Msmhs implements Responsable
{
    private $dataCollection;

    public function __construct($dataCollection)
    {
        $this->dataCollection = $dataCollection;
    }

    public function toResponse($request)
    {
        return response()->json($this->transformData());
    }

    protected function transformData()
    {
        return $this->dataCollection->map(function ($value) {
            return [
                'nim' => $value->NIMHSMSMHS,
                'name' => $value->NMMHSMSMHS,
                'pob' => $value->TPLHRMSMHS,
                'dob' => $value->TGLHRMSMHS,
                'prodi_id' => 7,
                'advisor_id' => 0,
                'religion_id' => null,
                'gender' => $value->KDJEKMSMHS == 'L' ? 1 : 2,
                'shift' => $value->SHIFTMSMHS,
                'start_year' => $value->TAHUNMSMHS,
                'start_periode' => $value->SMAWLMSMHS,
                'end_periode' => $value->BTSTUMSMHS,
                'reg_date' => $value->TGMSKMSMHS,
                'status' => $value->STMHSMSMHS,
                'reg_status' => $value->STPIDMSMHS == 'B' ? 1 : 2,
            ];
        });
    }
}