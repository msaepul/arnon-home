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

class Grafik implements FromView, WithEvents, WithTitle
{
    public function title(): string
    {
        return "Grafik";
    }

    public function view(): View
    {
        $cabang = cabang();
        $bulan = @$_GET['bulan'];
        $tahun = @$_GET['tahun'];
        if ($cabang != 'HO') {
            $jenis = @$_GET['jenis'];

            return view('layout.report.grafik', [
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
            $dari = ['ASD', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'PDL', 'CBL', 'JTW', 'TGL', 'MDO', 'MKS', 'KDR', 'BDJ', 'BWI', 'LPG', 'DMK', 'PLM', 'BLI', 'PKU', 'MDN', 'LOM', 'PNK', 'LLG', 'PLU', 'AMQ', 'KDI'];

            $d_dept = ['ASD', 'MKT', 'PRC', 'PBL', 'GBB', 'PRO', 'ENG', 'QCT', 'GPJ', 'EKS', 'KND', 'FIN', 'ACC', 'HRD', 'SIS', 'EDP', 'TAX', 'GRR', 'R&D', 'GSP', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%'];

            $kepada = ['ASD', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'PDL', 'CBL', 'JTW', 'TGL', 'MDO', 'MKS', 'KDR', 'BDJ', 'BWI', 'LPG', 'DMK', 'PLM', 'BLI', 'PKU', 'MDN', 'LOM', 'PNK', 'LLG', 'PLU', 'AMQ', 'KDI'];

            $k_dept = ['ASD', 'MKT', 'PRC', 'PBL', 'GBB', 'PRO', 'ENG', 'QCT', 'GPJ', 'EKS', 'KND', 'FIN', 'ACC', 'HRD', 'SIS', 'EDP', 'TAX', 'GRR', 'R&D', 'GSP', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%'];

            $kolom = ['ASD', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP'];

            // for ($no2 = 1; $no2 <= 40; $no2++) {
            //     for ($no = 1; $no <= 40; $no++) {
            //         $nok = $no + 4;
            //         $data = [
            //             "$kolom[$no2]$nok" => Modelutama::all()
            //                 ->where('dari', '=', "$dari[$no]")
            //                 ->where('d_dept', 'LIKE', "$d_dept[$no]")
            //                 ->where('kepada', '=', "$kepada[$no2]")
            //                 ->where('k_dept', 'LIKE', "$k_dept[$no2]")
            //                 ->where('bulan', '=', "$tahun$bulan")
            //                 ->where('jenis', '=', "eksternal"),
            //         ];
            //     }
            // }

            return view('layout.report.grafik');
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cabang = cabang();
                $bulan = @$_GET['bulan'];
                $tahun = @$_GET['tahun'];
                $middle = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                        'Aertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
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
                        'Aertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP // Set text jadi di tengah secara vertical (middle)
                    ],
                ];
                $thin = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
                $bottom = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        ],
                    ],
                ];
                $medium = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        ],
                    ],
                ]; {
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(3);
                    $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('P')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('Q')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('R')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('S')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('T')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('U')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('W')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('X')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('Y')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('Z')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AA')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AB')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AC')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AD')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AE')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AF')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AG')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AH')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AI')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AJ')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AK')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AL')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AM')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AN')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AO')->setWidth(9);
                    $event->sheet->getDelegate()->getColumnDimension('AP')->setWidth(9);
                    $event->sheet->getDelegate()->getStyle("A:AP")->applyFromArray($middle);
                }

                $event->sheet->getDelegate()->getStyle("A1:AP2")->applyFromArray($bottom);
                $event->sheet->getDelegate()->getStyle("C3:AP3")->applyFromArray($bottom);
                $event->sheet->getDelegate()->getStyle("C4:AP4")->applyFromArray($medium);
                $event->sheet->getDelegate()->getStyle("A3:B4")->applyFromArray($medium);
                $event->sheet->getDelegate()->getStyle("A1:AP2")->applyFromArray($orange);
                $event->sheet->getDelegate()->getStyle("A5:AP45")->applyFromArray($thin)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle("A47:C67")->applyFromArray($thin)->getAlignment()->setWrapText(true);
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
