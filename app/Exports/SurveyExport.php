<?php

namespace App\Exports;

use App\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class SurveyExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Report::all();
    }
    public function headings(): array
    {
        return [
            'Survey ID',
            'Date Created',
            'County',
            'Sub-County',
            'Facility',
            'Question',
            'Answer',
        ];
    }
}
