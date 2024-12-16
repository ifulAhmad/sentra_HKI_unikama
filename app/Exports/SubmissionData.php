<?php

namespace App\Exports;

use App\Models\Submission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithAfterSheet;
use Maatwebsite\Excel\Events\AfterSheet;

class SubmissionData implements FromView
{

    public function __construct(protected $submission)
    {
        $this->submission = $submission;
    }
    public function view(): \Illuminate\View\View
    {
        $submission = Submission::with(['applicants', 'files', 'subtype'])
            ->where('uuid', $this->submission->uuid)
            ->first();

        return view('admins.export.template_tabel_excel_submission', compact('submission'));
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                foreach (range('A', 'G') as $column) {
                    $sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
