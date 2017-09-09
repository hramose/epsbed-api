<?php

namespace App\Responses;

use Illuminate\Contracts\Support\Responsable;

class Rtrnlm implements Responsable
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
                'periode' => $value->THSMSTRNLM,
                'prodi_id' => 7,
                'lecturing_id' => null,
                'advisor_id' => 0,
                'approved' => 1,
                'student_id' => null,
                'student_nim' => $value->NIMHSTRNLM,
                'course_id' => null,
                'course_code' => $value->KDKMKTRNLM,
                'sks' => $value->SKSMKTRNLM,
                'status' => 1,
                'numeric_score' => $value->NLMUTTRNLM,
                'letter_score' => $value->NLAKHTRNLM,
                'index_score' => $value->NLBBTTRNLM,
                'class_code' => $value->KELASTRNLM,
                'details' => null,
                'transfer' => null,
            ];
        });
    }
}