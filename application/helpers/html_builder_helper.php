<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('usuario_list_table')) {

    function usuario_list_table($data, $rol) {
        //setlocale(LC_MONETARY, 'en_US');
        //print_r($data);
        $html = "";
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td>" . $a->nombre . " " . $a->apellido . "</td>";
            $html .= "<td>" . $a->programa . "</td>";
            $html .= "<td>" . $a->facultad . "</td>";

            if ($a->estado !== "activo") {
                $html .= "<td class=\"text-danger\">" . $a->estado . "</td>";
            } else {
                $html .= "<td class=\"text-success\">" . $a->estado . "</td>";
            }

            $view_btn = "<a class=\"btn btn-info btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\" href = \"" . base_url() . "admin/$rol/view/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-eye-open\"></span>
                            </a>";

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url() . "admin/$rol/edit/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";
            if ($a->estado !== "no_disponible" && $a->estado !== "inactivo") {
                $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </button>";
            } else {
                $option_btn = "<button class=\"btn btn-success btn-xs enable\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-check\"></span>
                            </button>";
            }
            $html .= "<td>$view_btn&nbsp;$edit_btn&nbsp;$option_btn</td>";
            $html .= "</tr>";
        }

        return $html;
    }

}

if (!function_exists('categoria_aptitud_list_table')) {

    function categoria_aptitud_list_table($data) {
        //setlocale(LC_MONETARY, 'en_US');
        //print_r($data);
        $html = "";
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td>" . $a->nombre . "</td>";
            $html .= "<td>" . $a->descripcion . "</td>";
            $html .= "<td>" . $a->programa . "</td>";

            if ($a->activo !== "1") {
                $html .= "<td class=\"text-danger\">no</td>";
            } else {
                $html .= "<td class=\"text-success\">si</td>";
            }

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url() . "admin/categoria_aptitud/edit/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";

            if ($a->activo == "1") {
                $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </button>";
            } else {
                $option_btn = "<button class=\"btn btn-success btn-xs enable\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-check\"></span>
                            </button>";
            }
            $html .= "<td>$edit_btn&nbsp;$option_btn</td>";
            $html .= "</tr>";
        }

        return $html;
    }

}

if (!function_exists('aptitud_profesional_list_table')) {

    function aptitud_profesional_list_table($data) {
        //setlocale(LC_MONETARY, 'en_US');
        //print_r($data);
        $html = "";
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td>" . $a->nombre . "</td>";
            $html .= "<td>" . $a->descripcion . "</td>";
            $html .= "<td>" . $a->categoria . "</td>";

            if ($a->activo !== "1") {
                $html .= "<td class=\"text-danger\">no</td>";
            } else {
                $html .= "<td class=\"text-success\">si</td>";
            }

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url() . "admin/aptitud_profesional/edit/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";

            if ($a->activo == "1") {
                $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </button>";
            } else {
                $option_btn = "<button class=\"btn btn-success btn-xs enable\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-check\"></span>
                            </button>";
            }
            $html .= "<td>$edit_btn&nbsp;$option_btn</td>";
            $html .= "</tr>";
        }

        return $html;
    }

}



if (!function_exists('show_notification')) {

    function show_notification() {
        $CI = & get_instance();  //get instance, access the CI superobject
        $html = "";

        if ($CI->session->flashdata('error') !== FALSE && $CI->session->flashdata('error') != "") {

            $html = "<div class=\"well well-sm alert-info\">" . $CI->session->flashdata('error') . "</div>";
        } elseif ($CI->session->flashdata('message') !== FALSE && $CI->session->flashdata('message') != "") {

            $html = "<div class=\"well well-sm alert-info\">" . $CI->session->flashdata('message') . "</div>";
        }

        return $html;
    }

}

if (!function_exists('modalidad_list_table')) {

    function modalidad_list_table($data) {
        $html = "";
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td>" . $a->nombre . "</td>";
            $html .= "<td>" . $a->numero_visitas . "</td>";
            if ($a->activo !== "1") {
                $html .= "<td class=\"text-danger\">Inactiva</td>";
            } else {
                $html .= "<td class=\"text-success\">Activa</td>";
            }

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url("admin/modalidad/edit/") . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";
            if ($a->activo !== "0") {
                $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </button>";
            } else {
                $option_btn = "<button class=\"btn btn-success btn-xs active\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-check\"></span>
                            </button>";
            }
            $html .= "<td>$edit_btn&nbsp;$option_btn</td>";
            $html .= "</tr>";
        }

        return $html;
    }

}


if (!function_exists('empresa_list_table')) {

    function empresa_list_table($data) {
        //setlocale(LC_MONETARY, 'en_US');
        //print_r($data);
        $html = "";
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td>" . $a->nombre . "</td>";
            $html .= "<td>" . $a->direccion . "</td>";
            $html .= "<td>" . $a->ciudad . "</td>";
            $html .= "<td>" . $a->telefono . "</td>";
            $html .= "<td>ESTADO</td>";

            /*
              if ($a->estado !== "activo") {
              $html .= "<td class=\"text-danger\">" . $a->estado . "</td>";
              } else {
              $html .= "<td class=\"text-success\">" . $a->estado . "</td>";
              }
             */

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url() . "admin/empresa/edit/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";

            /*
              if ($a->estado !== "no_disponible" && $a->estado !== "inactivo") {
              $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
              <span class=\"glyphicon glyphicon-remove\"></span>
              </button>";
              } else {
              $option_btn = "<button class=\"btn btn-success btn-xs enable\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
              <span class=\"glyphicon glyphicon-check\"></span>
              </button>";
              }
             */
            $html .= "<td>$edit_btn&nbsp;</td>";
            $html .= "</tr>";
        }

        return $html;
    }

}

if (!function_exists('common_usuario_list_table')) {

    function common_usuario_list_table($data, $controller) {
        $html = "";
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td> <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\" href = \"" . base_url() . "$controller/view/" . $a->id . "\" >
                            " . $a->nombre . " " . $a->apellido . "
                            </a></td>";
            $html .= "<td>" . $a->programa . "</td>";
            $html .= "<td>" . $a->facultad . "</td>";

            if ($a->estado !== "preinscrito") {
                $html .= "<td class=\"text-danger\">" . $a->estado . "</td>";
            } else {
                $html .= "<td class=\"text-success\">" . $a->estado . "</td>";
            }

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url() . "$controller/edit/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";
            if ($a->estado !== "no_disponible" && $a->estado !== "inactivo") {
                $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </button>";
            } else {
                $option_btn = "<button class=\"btn btn-success btn-xs enable\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-check\"></span>
                            </button>";
            }
//            $html .= "<td>$edit_btn&nbsp;$option_btn</td>";
            $html .= "</tr>";
        }

        return $html;
    }

}
