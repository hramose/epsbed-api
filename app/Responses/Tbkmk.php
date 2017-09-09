<?php

namespace App\Responses;

use Illuminate\Contracts\Support\Responsable;

class Tbkmk implements Responsable
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
                'periode' => $value->THSMSTBKMK,
                'prodi_id' => 7,
                'lecturer_id' => null,
                'lecturer_code' => $value->NODOSTBKMK,
                'course_id' => null,
                'course_code' => $value->KDKMKTBKMK,
                'course_name' => $value->NAKMKTBKMK,
                'sks' => $value->SKSMKTBKMK,
                'sks_tm' => $value->SKSTMTBKMK,
                'sks_prak' => $value->SKSPRTBKMK,
                'sks_prak_lap' => $value->SKSLPTBKMK,
                'sks_sim' => 0,
                'semester' => (int) $value->SEMESTBKMK,
                'capacity' => 50,
                'class_code' => '01',
            ];
        });
    }
}