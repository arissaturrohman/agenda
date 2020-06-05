<?php


include('config.php');
include('../assets/vendor/autoload.php');
include('tgl_indo.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Hari / Tanggal');
$sheet->setCellValue('C1', 'Jam');
$sheet->setCellValue('D1', 'Acara');
$sheet->setCellValue('E1', 'Tempat');
$sheet->setCellValue('F1', 'Disposisi');


  $sql = mysqli_query($conn, "SELECT * FROM tb_agenda");
  $i = 2;
  $no = 1;
    while($data = mysqli_fetch_array($sql))
    {

        $date   = $data['tgl'];
        $dhari = array(
         'Sunday' => 'Minggu',
         'Monday' => 'Senin',
         'Tuesday' => 'Selasa',
         'Wednesday' => 'Rabu',
         'Thursday' => 'Kamis',
         'Friday' => 'Jumat',
         'Saturday' => 'Sabtu'
        );
        $hari   = date('l', strtotime($date));

        $sheet->setCellValue('A'.$i, $no++);
        $sheet->setCellValue('B'.$i, $dhari[$hari].','.' '. TanggalIndo($data["tgl"]));
        $sheet->setCellValue('C'.$i, $data['jam']);
        $sheet->setCellValue('D'.$i, $data['acara']);
        $sheet->setCellValue('E'.$i, $data['tempat']);
        $sheet->setCellValue('F'.$i, $data['dispo']);
        $i++;
    }

    $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
$i = $i - 1;
$sheet->getStyle('A1:F'.$i)->applyFromArray($styleArray);

    $writer = new Xlsx($spreadsheet);
    $writer->save('Data Agenda.xlsx');
    echo "<script>window.location = 'Data Agenda.xlsx'</script>";


 ?>
