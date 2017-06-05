<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiantes_preinscritos
 *
 * @author Camilo
 */
class Reportes extends CI_Controller {

    var $estados = array("en_curso" => 2, "preinscrito" => 3, "vinculado" => 4, "aprobado" => 5, "reprobado" => 6, "descartado" => 16, "activo" => 8);

    function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_COORDINADOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->helper("html_builder_helper");
        $this->load->model("estudiante_model");
        $this->load->model("profesor_model");
        $this->load->model("empresa_model");
        $this->load->model("novedad_model");
        $this->load->model("practica_profesional_model");
    }

    public function index() {
        extract($this->estados);
        $where_array = array("usuario.id_rol_usuario = " . ID_ROL_ESTUDIANTE,
            "usuario.id_estado IN ($en_curso,$preinscrito,$vinculado,$aprobado,$reprobado,$descartado)",
            "usuario.id_facultad = " . $this->session->userdata("id_facultad")
        );
        $lista_estudiantes = $this->estudiante_model->listEstudiantes($where_array);
        $html = common_usuario_list_table($lista_estudiantes, 'coordinador/estudiantes');

        $empresas = $this->empresa_model->getAll();
        $whereArray = array("usuario.id_rol_usuario = " . ID_ROL_PROFESOR, "usuario.id_estado = " . $this->estados["activo"]);
        $profesores = $this->profesor_model->listar($whereArray);
        $data ["titulo"] = "Lista de estudiantes";
        $data ["html"] = $html;
        $data ["nav"] = "nav_coordinador";
        $data ["empresas"] = $empresas;
        $data ["profesores"] = $profesores;

        $this->load->view("common/estudiantes/list", $data);
    }

    public function practicas_profesionales() {
        
        $this->load->model("modalidad_model");
        $this->load->model("visita_model");
        //$this->load->model("novedad_model");
        
        $practicas = $this->practica_profesional_model->getAll(['id_periodo'=>$this->session->userdata('periodo_vigente')]);
        
        $reporte = array('');
        $reporte[0] = ['cod_estudiante',
            'nombre_estudiante',
            'apellido_estudiante',
            'cedula_estudiante',
            'email_estudiante',
            'telefono_estudiante',
            'celular_estudiante',
            'programa',
            'estado_practica',
            'empresa',
            'cargo',
            'profesor_asignado',
            'modalidad_practica',
            'visitas_realizadas',
            'visitas_requeridas',
            ];
            
        foreach($practicas as $a){
            $row = array();
            $info_practica = $this->practica_profesional_model->SelectPracticaByIdEstudiante($a->id_estudiante);
            
            $where_array = array("usuario.id = " . $a->id_estudiante);
            $estudiante = $this->estudiante_model->detalleEstudiantes($where_array);
            
            $row[0] = $estudiante[0]->codigo_uniminuto;
            $row[1] = $estudiante[0]->nombre;
            $row[2] = $estudiante[0]->apellido;
            $row[3] = $estudiante[0]->cedula;
            $row[4] = $estudiante[0]->email1;
            $row[5] = $estudiante[0]->telefono_fijo;
            $row[7] = $estudiante[0]->celular;
            $row[8] = $estudiante[0]->programa;
            $row[9] = $info_practica[0]->estado;
            $row[10] = $info_practica[0]->empresa;
            $row[11] = $a->cargo_practicante;
            
            $profesor = $this->profesor_model->obtener($a->id_profesor);
            $row[12] = ($a->id_profesor) ? $profesor[0]->nombre." ".$profesor[0]->apellido : "";
            
            $modalidad = $this->modalidad_model->get($a->id_modalidad);
            $row[13] = $info_practica[0]->modalidad_practica;
            
            $row[14] = $modalidad[0]->numero_visitas;
            
            $visitas_realizadas  = $this->visita_model->ContarVisitasRealizadasByIdPractica($a->id);
            $row[15] = $visitas_realizadas[0]->cantidad;
            
            array_push($reporte, $row);
            
        }
        
        $this->export_to_excel("reporte_practicas","estudiantes",$reporte);
         
    }
    
    private function export_to_excel($titulo_archivo, $titulo_hoja, $datos)
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        //load our new PHPExcel library
        $CI->load->library('excel');
        //activate worksheet number 1
        $CI->excel->setActiveSheetIndex(0);
        //name the worksheet
        $CI->excel->getActiveSheet()->setTitle($titulo_hoja);
        //set cell A1 content with some text
        //$CI->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
        //change the font size
        //$CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        //make the font become bold
        $CI->excel->getActiveSheet()->getStyle('A1:Z1')->getFont()->setBold(true);
        //read data from array
        $CI->excel->getActiveSheet()->fromArray($datos);
        /*
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         * 
         */
        $filename = $titulo_archivo.'.xlsx'; //save our workbook as this file name
        
        //header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
        header('Content-Disposition: attachment;filename='.$filename); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
        ob_end_clean();
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

}
