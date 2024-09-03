<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Myexcel
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($user, $jenis, $tahun, $kelas, $mapel, $result, $result_min = NULL, $result_max = NULL, $result_sum = NULL, $result_avg = NULL)
    {
        $kelas              = $kelas['kelas'];
        $semester           = $tahun['semester'];
        $tahun              = $tahun['nama'];
        $list_head_cell     = ['E6', 'F6', 'G6', 'H6', 'I6', 'J6', 'K6', 'L6', 'M6', 'N6', 'O6', 'P6', 'Q6', 'R6', 'S6', 'T6', 'U6'];
        $list_body_cell     = ['E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U'];

        $object             = new Spreadsheet();

        $object->getProperties()->setCreator($user);
        $object->getProperties()->setLastModifiedBy($user);
        $object->getProperties()->setTitle("Nilai $jenis Siswa Kelas $kelas Tahun $tahun Semester $semester");

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'LAPORAN DAFTAR NILAI SISWA ' . $jenis);
        $object->getActiveSheet()->setCellValue('A2', 'SD MUHAMMADIYAH TRINI');
        $object->getActiveSheet()->setCellValue('A3', 'Tahun Ajaran ' . $tahun . ' Semester ' . $semester);
        $object->getActiveSheet()->setCellValue('A4', 'Kelas ' . $kelas);
        $object->getActiveSheet()->setCellValue('A6', 'NO');
        $object->getActiveSheet()->setCellValue('B6', 'NIS');
        $object->getActiveSheet()->setCellValue('C6', 'NISN');
        $object->getActiveSheet()->setCellValue('D6', 'NAMA');

        $style = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );

        $no_head = 0;
        foreach ($mapel as $key => $value) {
            $object->getActiveSheet()->setCellValue($list_head_cell[$key], $value->nama_mapel);
            $no_head++;
        }

        $object->getActiveSheet()->setCellValue($list_head_cell[$no_head], 'Jumlah');
        $object->getActiveSheet()->setCellValue($list_head_cell[$no_head + 1], 'Rata-Rata');

        $baris = 7;
        foreach ($result as $key => $value) {
            $object->getActiveSheet()->setCellValue('A' . $baris, ++$key);
            $object->getActiveSheet()->setCellValue('B' . $baris, $value['nis']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $value['nisn']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $value['nama']);

            $no_body = 0;
            foreach ($mapel as $mp => $value_mp) {
                $object->getActiveSheet()->setCellValue($list_body_cell[$mp] . $baris, $value[$value_mp->nama_mapel]);
                $no_body++;
            }

            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body] . $baris, $value['jumlah']);
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body + 1] . $baris, $value['rerata']);
            $object->getActiveSheet()->mergeCells('A1:' . $list_body_cell[$no_body + 1] . '1');
            $object->getActiveSheet()->mergeCells('A2:' . $list_body_cell[$no_body + 1] . '2');
            $object->getActiveSheet()->mergeCells('A3:' . $list_body_cell[$no_body + 1] . '3');
            $object->getActiveSheet()->mergeCells('A4:' . $list_body_cell[$no_body + 1] . '4');
            $object->getActiveSheet()->getStyle('A1:' . $list_body_cell[$no_body + 1] . '1')->applyFromArray($style);
            $object->getActiveSheet()->getStyle('A2:' . $list_body_cell[$no_body + 1] . '2')->applyFromArray($style);
            $object->getActiveSheet()->getStyle('A3:' . $list_body_cell[$no_body + 1] . '3')->applyFromArray($style);
            $object->getActiveSheet()->getStyle('A4:' . $list_body_cell[$no_body + 1] . '4')->applyFromArray($style);


            $object->getActiveSheet()->getStyleByColumnAndRow(3, $baris)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

            $baris++;
        }

        foreach ($result_min as $key => $value) {
            $object->getActiveSheet()->mergeCells('B' . $baris . ':D' . $baris);
            $object->getActiveSheet()->setCellValue('B' . $baris, 'MIN');

            $no_body = 0;
            foreach ($mapel as $mp => $value_mp) {
                $object->getActiveSheet()->setCellValue($list_body_cell[$mp] . $baris, $value[$value_mp->nama_mapel]);
                $no_body++;
            }

            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body] . $baris, $value['jumlah']);
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body + 1] . $baris, $value['rerata']);
            $baris++;
        }

        foreach ($result_max as $key => $value) {
            $object->getActiveSheet()->mergeCells('B' . $baris . ':D' . $baris);
            $object->getActiveSheet()->setCellValue('B' . $baris, 'MAX');

            $no_body = 0;
            foreach ($mapel as $mp => $value_mp) {
                $object->getActiveSheet()->setCellValue($list_body_cell[$mp] . $baris, $value[$value_mp->nama_mapel]);
                $no_body++;
            }

            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body] . $baris, $value['jumlah']);
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body + 1] . $baris, $value['rerata']);
            $baris++;
        }

        foreach ($result_sum as $key => $value) {
            $object->getActiveSheet()->mergeCells('B' . $baris . ':D' . $baris);
            $object->getActiveSheet()->setCellValue('B' . $baris, 'JUMLAH');

            $no_body = 0;
            foreach ($mapel as $mp => $value_mp) {
                $object->getActiveSheet()->setCellValue($list_body_cell[$mp] . $baris, $value[$value_mp->nama_mapel]);
                $no_body++;
            }

            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body] . $baris, $value['jumlah']);
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body + 1] . $baris, $value['rerata']);
            $baris++;
        }

        foreach ($result_avg as $key => $value) {
            $object->getActiveSheet()->mergeCells('B' . $baris . ':D' . $baris);
            $object->getActiveSheet()->setCellValue('B' . $baris, 'RATA-RATA');

            $no_body = 0;
            foreach ($mapel as $mp => $value_mp) {
                $object->getActiveSheet()->setCellValue($list_body_cell[$mp] . $baris, $value[$value_mp->nama_mapel]);
                $no_body++;
            }

            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body] . $baris, $value['jumlah']);
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body + 1] . $baris, $value['rerata']);
            $baris++;
        }

        $object->getActiveSheet()->getStyle('A1:' . $list_head_cell[$no_head + 1])->getFont()->setBold(true);
        $object->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $object->getActiveSheet()->getColumnDimension('B')->setWidth(6);
        $object->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $object->getActiveSheet()->getColumnDimension('D')->setWidth(35);

        $file_name = "Data_Nilai_{$jenis}_Kelas{$kelas}_Tahun{$tahun}_Semester{$semester}" . '.xlsx';

        $object->getActiveSheet()->setTitle("Kelas $kelas");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($object);
        $writer->save('php://output');
        exit;
    }

    public function generate_guru($user, $tahun, $result)
    {
        $tahun  = $tahun['nama'];
        $object = new Spreadsheet();
        $style  = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );

        $object->getProperties()->setCreator($user);
        $object->getProperties()->setLastModifiedBy($user);
        $object->getProperties()->setTitle("Data Guru Tahun $tahun");

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'LAPORAN DAFTAR GURU ');
        $object->getActiveSheet()->setCellValue('A2', 'SD MUHAMMADIYAH TRINI');
        $object->getActiveSheet()->setCellValue('A3', 'Tahun Ajaran ' . $tahun);

        $object->getActiveSheet()->setCellValue('A5', 'NO');
        $object->getActiveSheet()->setCellValue('B5', 'NAMA');
        $object->getActiveSheet()->setCellValue('C5', 'NIP');
        $object->getActiveSheet()->setCellValue('D5', 'JENIS KELAMIN');
        $object->getActiveSheet()->setCellValue('E5', 'TANGGAL LAHIR');
        $object->getActiveSheet()->setCellValue('F5', 'JABATAN');
        $object->getActiveSheet()->setCellValue('G5', 'KELAS MENGAJAR');
        $object->getActiveSheet()->setCellValue('H5', 'ALAMAT');


        $object->getActiveSheet()->mergeCells('A1:H1');
        $object->getActiveSheet()->mergeCells('A2:H2');
        $object->getActiveSheet()->mergeCells('A3:H3');
        $object->getActiveSheet()->mergeCells('A4:H4');
        $object->getActiveSheet()->getStyle('A1:H1')->applyFromArray($style);
        $object->getActiveSheet()->getStyle('A2:H2')->applyFromArray($style);
        $object->getActiveSheet()->getStyle('A3:H3')->applyFromArray($style);
        $object->getActiveSheet()->getStyle('A4:H4')->applyFromArray($style);

        $baris = 6;
        foreach ($result as $key => $value) {
            $map_kelas = explode(',', $value->kelas);
            $uniqe_kelas = array_unique($map_kelas);
            sort($uniqe_kelas);
            $new_kelas = implode(', ', $uniqe_kelas);

            $object->getActiveSheet()->setCellValue('A' . $baris, ++$key);
            $object->getActiveSheet()->setCellValue('B' . $baris, $value->nama);
            $object->getActiveSheet()->setCellValue('C' . $baris, $value->nip);
            $object->getActiveSheet()->setCellValue('D' . $baris, $value->jenis_kelamin);
            $object->getActiveSheet()->setCellValue('E' . $baris, $value->tanggal_lahir);
            $object->getActiveSheet()->setCellValue('F' . $baris, $value->jabatan);
            $object->getActiveSheet()->setCellValue('G' . $baris, $new_kelas);
            $object->getActiveSheet()->setCellValue('H' . $baris, $value->alamat);

            $object->getActiveSheet()->getStyleByColumnAndRow(3, $baris)->getNumberFormat()->setFormatCode('#');
            $object->getActiveSheet()->getStyleByColumnAndRow(3, $baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $object->getActiveSheet()->getStyleByColumnAndRow(7, $baris)->getNumberFormat()->setFormatCode('#');
            $object->getActiveSheet()->getStyleByColumnAndRow(7, $baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $baris++;
        }

        $object->getActiveSheet()->getStyle('A1:H5')->getFont()->setBold(true);
        $object->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $object->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $object->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $object->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $object->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('H')->setWidth(40);

        $file_name = "Data_Guru_Tahun{$tahun}" . '.xlsx';

        $object->getActiveSheet()->setTitle("Guru");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($object);
        $writer->save('php://output');
        exit;
    }

    public function generate_siswa($user, $tahun, $kelas, $result)
    {
        $kelas          = $kelas['kelas'];
        $object         = new Spreadsheet();
        $style          = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );

        $object->getProperties()->setCreator($user);
        $object->getProperties()->setLastModifiedBy($user);
        $object->getProperties()->setTitle("Data Siswa Kelas $kelas Tahun $tahun");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->mergeCells('A6:A7');
        $object->getActiveSheet()->getStyle('A6:A7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('B6:B7');
        $object->getActiveSheet()->getStyle('B6:B7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('C6:C7');
        $object->getActiveSheet()->getStyle('C6:C7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('D6:D7');
        $object->getActiveSheet()->getStyle('D6:D7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('E6:E7');
        $object->getActiveSheet()->getStyle('E6:E7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('F6:F7');
        $object->getActiveSheet()->getStyle('F6:F7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('G6:G7');
        $object->getActiveSheet()->getStyle('G6:G7')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('H6:N6');
        $object->getActiveSheet()->getStyle('H6:N6')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('O6:R6');
        $object->getActiveSheet()->getStyle('O6:R6')->applyFromArray($style);

        $object->getActiveSheet()->mergeCells('A1:R1');
        $object->getActiveSheet()->mergeCells('A2:R2');
        $object->getActiveSheet()->mergeCells('A3:R3');
        $object->getActiveSheet()->mergeCells('A4:R4');
        $object->getActiveSheet()->getStyle('A1:R1')->applyFromArray($style);
        $object->getActiveSheet()->getStyle('A2:R2')->applyFromArray($style);
        $object->getActiveSheet()->getStyle('A3:R3')->applyFromArray($style);
        $object->getActiveSheet()->getStyle('A4:R4')->applyFromArray($style);

        $object->getActiveSheet()->setCellValue('A1', 'LAPORAN DAFTAR SISWA');
        $object->getActiveSheet()->setCellValue('A2', 'SD MUHAMMADIYAH TRINI');
        $object->getActiveSheet()->setCellValue('A3', 'Tahun Ajaran ' . $tahun);
        $object->getActiveSheet()->setCellValue('A4', 'Kelas ' . $kelas);

        $object->getActiveSheet()->setCellValue('A6', 'NO');
        $object->getActiveSheet()->setCellValue('B6', 'NIS');
        $object->getActiveSheet()->setCellValue('C6', 'NISN');
        $object->getActiveSheet()->setCellValue('D6', 'NAMA');
        $object->getActiveSheet()->setCellValue('E6', 'JK');
        $object->getActiveSheet()->setCellValue('F6', 'TANGGAL LAHIR');
        $object->getActiveSheet()->setCellValue('G6', 'AGAMA');

        $object->getActiveSheet()->setCellValue('H6', 'ORANG TUA');

        $object->getActiveSheet()->setCellValue('H7', 'NAMA AYAH');
        $object->getActiveSheet()->setCellValue('I7', 'PENDIDIKAN AYAH');
        $object->getActiveSheet()->setCellValue('J7', 'PEKERJAAN AYAH');
        $object->getActiveSheet()->setCellValue('K7', 'NAMA IBU');
        $object->getActiveSheet()->setCellValue('L7', 'PENDIDIKAN IBU');
        $object->getActiveSheet()->setCellValue('M7', 'PEKERJAAN IBU');
        $object->getActiveSheet()->setCellValue('N7', 'NO. HANDPHONE');

        $object->getActiveSheet()->setCellValue('O6', 'ALAMAT');

        $object->getActiveSheet()->setCellValue('O7', 'DUSUN');
        $object->getActiveSheet()->setCellValue('P7', 'DESA');
        $object->getActiveSheet()->setCellValue('Q7', 'KECAMATAN');
        $object->getActiveSheet()->setCellValue('R7', 'KABUPATEN');

        $baris = 8;
        foreach ($result as $key => $value) {
            $jk = ($value->jenis_kelamin == 'Perempuan') ? 'P' : 'L';
            $object->getActiveSheet()->setCellValue('A' . $baris, ++$key);
            $object->getActiveSheet()->setCellValue('B' . $baris, $value->nis);
            $object->getActiveSheet()->setCellValue('C' . $baris, $value->nisn);
            $object->getActiveSheet()->setCellValue('D' . $baris, $value->nama);
            $object->getActiveSheet()->setCellValue('E' . $baris, $jk);
            $object->getActiveSheet()->setCellValue('F' . $baris, $value->tanggal_lahir);
            $object->getActiveSheet()->setCellValue('G' . $baris, $value->agama);
            $object->getActiveSheet()->setCellValue('H' . $baris, $value->nama_ayah);
            $object->getActiveSheet()->setCellValue('I' . $baris, $value->pendidikan_ayah);
            $object->getActiveSheet()->setCellValue('J' . $baris, $value->pekerjaan_ayah);
            $object->getActiveSheet()->setCellValue('K' . $baris, $value->nama_ibu);
            $object->getActiveSheet()->setCellValue('L' . $baris, $value->pendidikan_ibu);
            $object->getActiveSheet()->setCellValue('M' . $baris, $value->pekerjaan_ibu);
            $object->getActiveSheet()->setCellValue('N' . $baris, $value->no_hp);
            $object->getActiveSheet()->setCellValue('O' . $baris, $value->dusun);
            $object->getActiveSheet()->setCellValue('P' . $baris, $value->desa);
            $object->getActiveSheet()->setCellValue('Q' . $baris, $value->kecamatan);
            $object->getActiveSheet()->setCellValue('R' . $baris, $value->kabupaten);

            $object->getActiveSheet()->getStyleByColumnAndRow(3, $baris)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
            $object->getActiveSheet()->getStyleByColumnAndRow(14, $baris)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

            $baris++;
        }

        $object->getActiveSheet()->getStyle('A1:R7')->getFont()->setBold(true);
        $object->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $object->getActiveSheet()->getColumnDimension('B')->setWidth(6);
        $object->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $object->getActiveSheet()->getColumnDimension('D')->setWidth(36);
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(4);
        $object->getActiveSheet()->getColumnDimension('F')->setWidth(16);
        $object->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $object->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $object->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('J')->setWidth(18);
        $object->getActiveSheet()->getColumnDimension('K')->setWidth(40);
        $object->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('M')->setWidth(18);
        $object->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $object->getActiveSheet()->getColumnDimension('O')->setWidth(18);
        $object->getActiveSheet()->getColumnDimension('P')->setWidth(18);
        $object->getActiveSheet()->getColumnDimension('Q')->setWidth(18);
        $object->getActiveSheet()->getColumnDimension('R')->setWidth(18);

        $file_name = "Data_Siswa" . '.xlsx';

        $object->getActiveSheet()->setTitle("Kelas $kelas");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($object);
        $writer->save('php://output');
        exit;
    }
}
