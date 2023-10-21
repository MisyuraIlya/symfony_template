<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\XlxDocuments;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class PdfDocumentProcessor implements ProcessorInterface
{
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        assert($data instanceof XlxDocuments);
        $this->CreateDocument($data);

        $obj = new \stdClass();
        $obj->url = "gogi.png";
        return $obj;
    }

    public function CreateDocument(XlxDocuments $data)
    {
//        $spreadsheet = new Spreadsheet();
//        $formated_date = date("Y-m-d_H:i:s");
//        $mpdf = new Mpdf($spreadsheet);
//        $html =
//        $html ='<div style="text-align: center;">
//                <img style="width:100px;height: auto;display:inline-block;" src="https://digitrade.com.ua/ceremonitea/src/img/logo.png"/>
//              </div>';
//        $html .= '<h1 style="text-align: center;line-height:24px;margin-bottom:0;">' . $data->documentType .$data->userExtId . '</h1><br>';
//        $html .= '<h2 style="text-align: center;margin:0;line-height:24px;">אסמכתא: #' . $data->documentNumber . '</h2><br>';
//        $html .= "<table cellpadding='10' cellspacing='10' style='width:100%;border-bottom: 1px solid black;'>
//                <tr style='outline: thin solid'>
//                  <td style='font-weight: bold'>#</td>
//                  <td style='font-weight: bold'>תמונה</td>
//                  <td style='font-weight: bold'>מס' קטלוג</td>
//                  <td style='font-weight: bold'>ברקוד</td>
//                  <td style='font-weight: bold'>תיאור פריט</td>
//                  <td style='font-weight: bold'>כמות</td>
//                  <td style='font-weight: bold'>נטו ליחידה</td>
//                  <td style='font-weight: bold'>סה״כ</td>
//                 </tr>
//              ";
//        if (!empty($data->erpData->documents)) {
//            foreach ($data->erpData->documents as $key => $line) {
//
//                $html .= '<tr style="outline: thin solid;">
//                      <td>' . $line->totalPrice . '</td>
//                      <td>';
//                $fileExists = file_exists(__DIR__ . $line->image);
//                if($fileExists){
//                    $html .= '<img style="width:50px;height: auto;" src="' . __DIR__ . $line->img. '"/></div>' . '</td>';
//                }else{
//                    $html .= '</td>';
//                }
//
//                $html .=    '<td>' . $line->sku . '</td>
//                       <td>' . $line->barcode . '</td>
//                       <td>' . $line->title . '</td>
//                       <td>' . $line->quantity . '</td>
//                       <td>' . number_format($line->price , 2, '.', "") . '</td>
//                       <td>' . number_format($line->totalPrice , 2, '.', "") . '</td>
//                    </tr>';
//
//            }
//        }
//
//        $html .= '</table>';
//        $html .= "<div style='text-align: left;'>
//                  <div style='display:inline-block;'>
//                    <span style='font-weight: bold'>סה״כ ללא מע״מ:</span>
//                    <span style='border:1px solid black; padding:8px 16px;'>" .number_format($data->erpData->totalPriceBeforeTax  ,2, '.', '')  . "</span>
//                  </div>
//                  <div style='display:inline-block;'>
//                    <span style='font-weight: bold'>סה״כ לתשלום:</span>
//                    <span style='border:1px solid black; padding:8px 16px;'>" .number_format($data->erpData->totalPrice  ,2, '.', '') . "</span>
//                  </div>
//                </div>";
//
//
//
//        $mpdf->autoScriptToLang = true;
//        $mpdf->autoLangToFont = true;
//        $mpdf->SetDirectionality('rtl');
//
//        $mpdf->WriteHTML($html);
//
//        $fxls = __DIR__.'/../../public/media/documents/' . $formated_date . '_order_'.$data->documentNumber.'.pdf';
//        $mpdf->Output($fxls,'F');
        $spreadsheet = new Spreadsheet();

// Load the HTML content into a cell
        $htmlContent = '<h1>Hello, PDF!</h1>';
        $spreadsheet->getActiveSheet()->setCellValue('A1', $htmlContent);

// Create a PDF writer
        $pdfWriter = new Mpdf($spreadsheet);

// Set the file format to PDF
        $pdfWriter->setSheetIndex(0);

// Save the PDF to a file
        $pdfWriter->save('output.pdf');



    }

    public function FtpUploader()
    {

    }
}
