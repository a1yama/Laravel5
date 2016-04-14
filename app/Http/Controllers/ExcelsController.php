<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExcelsController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Tokyo');

        $book = new \PHPExcel();
        $sheet = $book->getActiveSheet();

// セル番地で書いてみる
        $sheet->setCellValue('A1', 10000);
        $sheet->setCellValue('A2', true);
        $sheet->setCellValue('A3', 'テスト');

// 行列番号で書いてみる
        $column = 1;
        $sheet->setCellValueByColumnAndRow($column, 1, 'B1');
        $sheet->setCellValueByColumnAndRow($column, 2, 'B2');
        $sheet->setCellValueByColumnAndRow($column, 3, 'B3');

        $output = 'output.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        ob_end_clean();//バッファのゴミ捨て
        header('Content-Disposition: attachment;filename='.$output);
        header('Cache-Control: max-age=0');

        $writer = \PHPExcel_IOFactory::createWriter($book, "Excel2007");
        $writer->save('php://output');

    }
}
