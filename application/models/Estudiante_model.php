<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiante_model
 *
 * @author Camilo
 */
class Estudiante_model extends User_model {

    //put your code here

    public function listEstudiantes($whereArray) {
        $select = array(['usuario.*'],
            ['facultades.nombre', 'facultad'],
            ['programas.nombre', 'programa'],
            ['estados_usuario.nombre', 'estado'],
            ['sedes.nombre', 'sede']);

        $join = array(['facultades', 'facultades.id = usuario.id_facultad'],
            ['programas', 'programas.id = usuario.id_programa'],
            ['sedes', 'sedes.id = usuario.id_sede'],
            ['estados_usuario', 'estados_usuario.id = usuario.id_estado']
        );

        $where = $whereArray;

        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select, $join, $where, NULL);
//        echo $this->db->last_query();
//        exit;
        return $result;
    }

    public function detalleEstudiantes($whereArray) {
        $select = array(['usuario.*'],
            ['facultades.nombre', 'facultad'],
            ['practica_profesional.id', 'id_practica'],
            ['practica_profesional.id_profesor'],
            ['practica_profesional.id_periodo'],
            ['practica_profesional.id_modalidad'],
            ['practica_profesional.id_empresa'],
            ['practica_profesional.cargo_practicante'],
            ['practica_profesional.nombre_jefe'],
            ['practica_profesional.apellido_jefe'],
            ['practica_profesional.telefono_jefe'],
            ['practica_profesional.celular_jefe'],
            ['practica_profesional.email_jefe'],
            ['practica_profesional.cargo_jefe'],
            ['practica_profesional.direccion_practica'],
            ['practica_profesional.id_ciudad'],
            ['practica_profesional.id_estado_practica'],
            ['programas.nombre', 'programa'],
            ['estados_usuario.nombre', 'estado'],
            ['sedes.nombre', 'sede'],
            ['estados_practica.descripcion', 'estado_practica']
        );

        $join = array(['facultades', 'facultades.id = usuario.id_facultad'],
            ['programas', 'programas.id = usuario.id_programa'],
            ['sedes', 'sedes.id = usuario.id_sede'],
            ['estados_usuario', 'estados_usuario.id = usuario.id_estado'],
            ['practica_profesional', 'practica_profesional.id_estudiante = usuario.id'],
            ['estados_practica', 'estados_practica.id = practica_profesional.id_estado_practica']
        );

        $where = $whereArray;

        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select, $join, $where, NULL);
//        echo $this->db->last_query();
//        exit;
        return $result;
    }

    public function obtenerRegistroEstudiante($operator, $condition) {

        if ($operator == "where") {
            $this->db->where($condition);
        } else {
            $this->db->like($condition);
        }

        $query = $this->db->get("registros_cuentas");

        $result = $query->result();

        return $result;
    }

    public function crearRegistroEstudiante($data) {

        $data['id_facultad'] = "1";
        $data['id_rol_usuario'] = ID_ROL_ESTUDIANTE;
        $data['id_sede'] = "1";
        $data['id_estado'] = "15";  // crear estudiante con estado sin_perfil
        $data['token'] = sha1($data['email1']);

        $data_registro = array('fecha_registro' => date('Y-m-d H:i:s'),
            'token' => sha1($data['email1']),
            'datos_json' => json_encode($data),
        );

        $this->db->insert("registros_cuentas", $data_registro);

        if ($this->db->insert_id() > 0) {
            $this->enviarEmailActivacionEstudiante($data);
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function enviarEmailActivacionEstudiante($data) {

        $mail_body_html = "Hola <b>" . $data['nombre'] . "</b><br/><br/>";
        $mail_body_html .= "Para activar tu cuenta debes hacer clic en el siguiente enlace. ";
        $mail_body_html .= "Recibir&aacute;s tus credenciales de acceso una vez hayamos confirmado tu identidad.<br/><br/>";
        $mail_body_html .= "Activa tu cuenta: " . base_url() . "user/activate/" . $data['token'] . "<br/><br/>";
        $mail_body_html .= "UNIMINUTO<br/>";

        $to = $data['email1'];
        $subject = "Bienvenido al piloto del proyecto SEPP UNIMINUTO!";

        $this->sendEmail($to, $subject, $mail_body_html, NULL);
    }

    public function enviarEmailCredenciales($data, $password) {

        $mail_body_html = "Bienvenido <b>" . $data['nombre'] . "</b><br/><br/>";
        $mail_body_html .= "Tu cuenta de practicante ha sido exitosamente activada. &Eacute;stas son tus credenciales:<br/><br/>";
        $mail_body_html .= "Usuario: <b>" . $data['email1'] . "</b><br/>";
        $mail_body_html .= "Password: <b>" . $password . "</b><br/><br/>";
        $mail_body_html .= "Inicia sesi&oacute;n <a href=\"" . base_url() . "user/login\">aqu&iacute;</a> y "
                . "sigue los siguientes pasos para preinscribr tu Pr&aacute;ctica Profesional:<br/><br/>";
        $mail_body_html .= "<ul>";
        $mail_body_html .= "<li>Crea tu <b>perfil profesional</b> a partir de una lista de aptitudes profesionales disponibles.</li>";
        $mail_body_html .= "<li>Ve a la opci&oacute; <b>Preinscribir Pr&aacute;ctica Profesional</b> y seleccionando"
                . "la modalidad de pr&aacute;ctica que te interesa.</li>";
        $mail_body_html .= "<li>&iexcl;Y eso es todo! Solo tienes que esperar al inicio de tu pr&aacutectica.</li>";
        $mail_body_html .= "</ul><br/>";
        $mail_body_html .= "Te deseamos una experiencia muy constructiva y enriquecedora. Cuenta con nosotros si tienes alguna inquietud.</br></br>";
        $mail_body_html .= "UNIMINUTO";

        $to = $data['email1'];
        $subject = "Tu cuenta en SEPP UNIMINUTO ha sido activada exitosamente!";

        $this->sendEmail($to, $subject, $mail_body_html, NULL);
    }

    public function actualizarRegistroUsuario($id_registro, $id_usuario) {

        $data = array('activado' => "1",
            'fecha_activacion' => date('Y-m-d H:i:s'),
            'id_usuario_activado' => $id_usuario,);

        $this->db->where('id', $id_registro);
        $this->db->update("registros_cuentas", $data);

        return $this->db->affected_rows();
    }

    public function getValidationRules($tipo = '') {
        $reglaCc = ($tipo === "update") ? '' : '|is_unique[usuario.cedula]';
        $reglaCodigo = ($tipo === "update") ? '' : '|is_unique[usuario.codigo_uniminuto]';
        $config = array(
            array(
                'field' => 'cedula',
                'label' => 'C&eacute;dula',
                'rules' => 'trim|required|is_natural' . $reglaCc
            ),
            array(
                'field' => 'codigo_uniminuto',
                'label' => 'C&oacute;digo Uniminuto',
                'rules' => 'trim|required|is_natural' . $reglaCodigo
            ),
            array(
                'field' => 'nombre',
                'label' => 'Primer Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'apellido',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email1',
                'label' => 'Correo Uniminuto',
                'rules' => 'trim|is_unique[usuario.email1]|required|regex_match[/^[a-z0-9](\.?[a-z0-9]){5,}@uniminuto\.edu\.co$/]',
                'errors' => array(
                    'is_unique' => 'El correo ya est&aacute; registrado.',
                    'regex_match' => 'Debe ser una direcci&oacuten de correo de UNIMINUTO v&aacute;lida.',
                ),
            ),
            array(
                'field' => 'email2',
                'label' => 'Segundo Email',
                'rules' => 'trim|valid_email'
            ),
            array(
                'field' => 'telefono_fijo',
                'label' => 'Tel&eacute;fono Fijo',
                'rules' => 'trim|is_natural|exact_length[7]'
            ),
            array(
                'field' => 'celular',
                'label' => 'Celular',
                'rules' => 'trim|exact_length[10]'
            ),
            array(
                'field' => 'id_programa',
                'label' => 'Programa',
                'rules' => 'trim|is_natural'
            ),
        );
        return $config;
    }

    public function obtenerAptitudEstudiante($id_estudiante) {
        $this->db->select("aptitud_profesional.*,categorias_aptitudes.nombre AS categoria");
        $this->db->from("perfil_estudiante");
        $this->db->join("aptitud_profesional", "aptitud_profesional.id = perfil_estudiante.id_aptitud");
        $this->db->join("categorias_aptitudes", "categorias_aptitudes.id = aptitud_profesional.id_categoria_aptitud");
        $this->db->where("perfil_estudiante.id_estudiante", $id_estudiante);
        $this->db->where("perfil_estudiante.activo", "1");
        $query = $this->db->get();

        $perfil_prof = $query->result();

        if (count($perfil_prof) > 0) {
            // Agrupar las aptitudes por categoria en el array $perfil_profesional_agrupado

            $templevel = $perfil_prof[0]->categoria;
            $newkey = 0;
            $perfil_profesional_agrupado[$templevel] = "";

            foreach ($perfil_prof as $key => $val) {
                if ($templevel == $val->categoria) {
                    $perfil_profesional_agrupado[$templevel][$newkey] = $val;
                } else {
                    $perfil_profesional_agrupado[$val->categoria][$newkey] = $val;
                }
                $newkey++;
            }

            return $perfil_profesional_agrupado;
        } else {
            return false;
        }
    }

    public function obtenerPerfilProfPersonalizado($id_estudiante) {

        $this->db->select("usuario.*,perfil_estudiante_personalizado.comentario");
        $this->db->from("perfil_estudiante_personalizado");
        $this->db->join("usuario", "usuario.id = perfil_estudiante_personalizado.id_estudiante");
        $this->db->where("perfil_estudiante_personalizado.id_estudiante", $id_estudiante);
        $query = $this->db->get();

        return $query->result();
    }

}
