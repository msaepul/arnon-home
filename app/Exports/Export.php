<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use Throwable;
use App\Models\Modelutama;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class Export implements FromView, WithEvents, WithTitle
{
    public function title(): string
    {
        $cabang = cabang();
        if ($cabang != 'HO') {
            $jenis = @$_GET['jenis'];
        } else {
            $jenis = 'Eksternal';
        }
        return "Laporan PTPP $jenis";
    }

    public function view(): View
    {
        $cabang = cabang();
        $bulan = @$_GET['bulan'];
        $tahun = @$_GET['tahun'];
        if ($cabang != 'HO') {
            $jenis = @$_GET['jenis'];

            return view('layout.report.laporanptpp', [
                'invoices' => Modelutama::where([
                    ['jenis', '=', "$jenis"],
                    ['bulan', '=', "$tahun$bulan"],
                    ['dari', '=', "$cabang"]
                ])->orWhere([
                    ['jenis', '=', "$jenis"],
                    ['bulan', '=', "$tahun$bulan"],
                    ['kepada', '=', "$cabang"]
                ])->get(),
            ]);
        } else {
            return view('layout.report.laporanptpp', [
                'invoices' => Modelutama::all()->where('bulan', '=', "$tahun$bulan")->where('jenis', '=', "eksternal"),
            ]);
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cabang = cabang();
                $bulan = @$_GET['bulan'];
                $tahun = @$_GET['tahun'];
                if ($cabang != 'HO') {
                    $jenis = @$_GET['jenis'];
                    $utama = Modelutama::where([
                        ['jenis', '=', "$jenis"],
                        ['bulan', '=', "$tahun$bulan"],
                        ['dari', '=', "$cabang"]
                    ])->orWhere([
                        ['jenis', '=', "$jenis"],
                        ['bulan', '=', "$tahun$bulan"],
                        ['kepada', '=', "$cabang"]
                    ])->get();
                } else {
                    $utama = Modelutama::all()->where('bulan', '=', "$tahun$bulan")->where('jenis', '=', "eksternal");
                }
                $cutama = count($utama) + 3;
                $middle = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ],
                ];
                $orange =  [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'ffc000']
                    ]
                ];
                $coklat =  [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'E5C298']
                    ]
                ];
                $kuning =  [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'fbff00']
                    ]
                ];
                $merah =  [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'ff0000']
                    ]
                ];
                $justify = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_JUSTIFY, // Set text jadi ditengah secara horizontal (center)
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP // Set text jadi di tengah secara vertical (middle)
                    ],
                ];
                $thin = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
                $medium = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        ],
                    ],
                ];

                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(11.5);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20.5);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(27.3);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(9.8);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(6.5);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(6.5);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(6.5);
                $event->sheet->getDelegate()->getStyle("A:H")->applyFromArray($middle);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(50);
                $event->sheet->getDelegate()->getStyle("I")->applyFromArray($justify);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(21.5);
                $event->sheet->getDelegate()->getStyle("J")->applyFromArray($middle);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(50);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(50);
                $event->sheet->getDelegate()->getStyle("K:L")->applyFromArray($justify);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(8.7);
                $event->sheet->getDelegate()->getStyle("M:O")->applyFromArray($middle);

                $ind = 4;
                foreach ($utama as $d) {
                    if (kategori($d->kategori) == 'BERDAMPAK PADA MUTU' || kategori($d->kategori) == 'KELUHAN PELANGGAN') {
                        $event->sheet->getDelegate()->getStyle("A$ind:O$ind")->applyFromArray($coklat);
                    }
                    if (kategori($d->kategori) == 'AMI') {
                        $event->sheet->getDelegate()->getStyle("A$ind:O$ind")->applyFromArray($kuning);
                    }
                    if ($d->status == 'cancel') {
                        $event->sheet->getDelegate()->getStyle("A$ind:O$ind")->applyFromArray($merah);
                    }
                    $ind++;
                }

                $event->sheet->getDelegate()->getStyle("A1:O2")->applyFromArray($medium);
                $event->sheet->getDelegate()->getStyle("A3:O3")->applyFromArray($medium);
                $event->sheet->getDelegate()->getStyle("A3:O3")->applyFromArray($medium);
                $event->sheet->getDelegate()->getStyle("A3:O3")->applyFromArray($orange);
                $event->sheet->getDelegate()->getStyle("A4:O$cutama")->applyFromArray($thin)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle("A1:O3")
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A1:O3')->getFont()->setName('Times New Roman');
                $event->sheet->getDelegate()->getStyle('A1:A2')->getFont()->setSize(15);
                $event->sheet->getDelegate()->getStyle('A3:O3')
                    ->getFont()
                    ->setBold(true);
            },
        ];
    }
}
