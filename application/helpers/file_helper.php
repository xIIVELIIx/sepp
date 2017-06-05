<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('upload_file'))
{
    
    function upload_file()
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        $extension = (strpos($_FILES['archivo']['name'], ".docx")) ? "docx" : substr($_FILES['archivo']['name'], -3);
        $filename = "HV-".$CI->session->userdata('cedula').".$extension";
        $uploaded_file = $_SERVER['DOCUMENT_ROOT']."/sepp/uploads/$filename";
        
        try{
                $file_types = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                'application/msword',
                                'application/pdf',];
            
                //  Validar tipo de archivo
                if(!in_array($_FILES['archivo']['type'], $file_types)){
                    throw new Exception("El archivo ".$_FILES['archivo']['name']." no es va&aacute;lido.");
                }
                
                //  Proceder con la subida
                if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $uploaded_file)) {
                    throw new Exception("El archivo ".$_FILES['archivo']['name']." no pudo ser subido");
                }
                
                return array('filepath' => $uploaded_file, 'hoja_vida_link' => base_url()."uploads/".$filename);
                
        }  catch (Exception $e){
            return array('error' => $e->getMessage());
        }
    }
    
}

if ( ! function_exists('export_to_excel'))
{
    
    function export_to_excel($titulo_archivo, $titulo_hoja, $datos)
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        //load our new PHPExcel library
        $CI->load->library('excel');
        //activate worksheet number 1
        $CI->excel->setActiveSheetIndex(0);
        //name the worksheet
        $CI->excel->getActiveSheet()->setTitle($titulo_hoja);
        //set cell A1 content with some text
        $CI->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
        //change the font size
        $CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        //make the font become bold
        $CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        //read data from array
        $CI->excel->getActiveSheet()->fromArray($datos);
        /*
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         * 
         */
        $filename= $titulo_archivo.'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');

    }
    
}