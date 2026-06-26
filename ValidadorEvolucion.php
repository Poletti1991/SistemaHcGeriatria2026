<?php

class ValidadorEvolucion
{
    /**
     * Valida los datos de entrada para agregar una Evolución Clínica.
     * 
     * @param array $post Datos recibidos por POST (ej. $_POST)
     * @param array|null $existingDnis Lista opcional de DNIs válidos para mock de base de datos en pruebas unitarias
     * @param resource|null $conn Conexión opcional a la base de datos MySQL para verificar DNI en producción
     * @return array Array asociativo con los errores detectados. Vacío si todo es correcto.
     */
    public static function validar($post, $existingDnis = null, $conn = null)
    {
        $errores = [];

        // 1. Validación de la Fecha
        if (empty($post['fecha'])) {
            $errores['fecha'] = "La fecha es obligatoria.";
        } else {
            $fecha = $post['fecha'];
            $min = '2019-01-01';
            $max = (date('Y') + 10) . '-12-31';
            if ($fecha < $min || $fecha > $max) {
                $errores['fecha'] = "La fecha debe estar entre $min y $max.";
            }
        }

        // 2. Validación de la Evolución (Descripción)
        if (empty($post['evolucion']) || trim($post['evolucion']) === '') {
            $errores['evolucion'] = "La descripción de la evolución es obligatoria.";
        }

        // 3. Validación de DNI
        if (empty($post['dni']) || trim($post['dni']) === '') {
            $errores['dni'] = "El DNI del paciente es obligatorio.";
        } else {
            $dni = trim($post['dni']);
            if (!is_numeric($dni)) {
                $errores['dni'] = "El DNI debe contener únicamente números.";
            } else {
                $dniVal = floatval($dni);
                if ($dniVal < 0) {
                    $errores['dni'] = "El DNI no puede ser un número negativo.";
                } else {
                    // RN1: Verificar si el paciente tiene historia clínica previa
                    if (is_array($existingDnis)) {
                        // Modo Prueba Unitarias (Mock)
                        if (!in_array($dni, $existingDnis)) {
                            $errores['dni'] = "No se puede registrar una evolución a un paciente sin historia clínica previa.";
                        }
                    } else {
                        // Modo Producción (Consulta real a DB)
                        if (function_exists('mysql_query')) {
                            $escapedDni = mysql_real_escape_string($dni);
                            $query = mysql_query("SELECT id_paciente FROM historia_clinica WHERE DNI = '$escapedDni'");
                            if ($query) {
                                if (mysql_num_rows($query) === 0) {
                                    $errores['dni'] = "No se puede registrar una evolución a un paciente sin historia clínica previa.";
                                }
                            }
                        }
                    }
                }
            }
        }

        return $errores;
    }
}
