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

