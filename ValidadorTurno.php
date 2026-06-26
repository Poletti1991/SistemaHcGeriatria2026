<?php
/**
 * Validador para la Carga/Asignación de Turnos (Modificado)
 * Universidad Nacional del Nordeste (UNNE) - FACENA
 * Lic. en Sistemas de Información - Ingeniería del Software II
 */

class ValidadorTurno
{
    /**
     * Valida los datos de entrada para Administrar Turnos.
     * 
     * @param array $post Datos recibidos por POST (ej. $_POST)
     * @param array|null $existingTurns Lista opcional de turnos ya reservados para mock de base de datos en pruebas unitarias
     * @param resource|null $conn Conexión opcional a la base de datos MySQL para verificar en producción
     * @return array Array asociativo con los errores detectados. Vacío si todo es correcto.
     */
    public static function validar($post, $existingTurns = null, $conn = null)
    {
        $errores = [];

        // 1. Validación de la Fecha
        if (empty($post['fecha'])) {
            $errores['fecha'] = "La fecha del turno es obligatoria.";
        } else {
            $fecha = $post['fecha'];
            $min = '2019-01-01';
            $max = (date('Y') + 10) . '-12-31';
            if ($fecha < $min || $fecha > $max) {
                $errores['fecha'] = "La fecha debe estar entre $min y $max.";
            }
        }

        // 2. Validación de la Hora
        if (empty($post['hora']) || trim($post['hora']) === '') {
            $errores['hora'] = "El horario del turno es obligatorio.";
        } else {
            $hora = trim($post['hora']);
            // Validar formato HH:MM (de 00:00 a 23:59)
            if (!preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $hora)) {
                $errores['hora'] = "El formato de la hora debe ser HH:MM (ej: 20:00).";
            }
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
                }
            }
        }

        // 4. Validación de Nombre (Opcional, pero si se ingresa, debe ser válido)
        if (!empty($post['nombre']) && trim($post['nombre']) !== '') {
            $nombre = trim($post['nombre']);
            if (strlen($nombre) < 3) {
                $errores['nombre'] = "El Apellido y Nombre debe tener al menos 3 caracteres.";
            }
        }

        // 5. Regla de Negocio: No se pueden asignar dos turnos diferentes el mismo día a la misma hora
        if (empty($errores['fecha']) && empty($errores['hora'])) {
            $fecha = $post['fecha'];
            $hora = trim($post['hora']);

            if (is_array($existingTurns)) {
                // Modo Prueba Unitarias (Mock)
                foreach ($existingTurns as $t) {
                    if ($t['fecha'] === $fecha && $t['hora'] === $hora) {
                        $errores['hora'] = "Ya existe un turno asignado para la fecha y horario seleccionados.";
                        break;
                    }
                }
            } else {
                // Modo Producción (Consulta real a DB)
                if (function_exists('mysql_query')) {
                    $escapedFecha = mysql_real_escape_string($fecha);
                    $escapedHora = mysql_real_escape_string($hora);
                    $query = mysql_query("SELECT fecha_turno FROM turnos WHERE fecha_turno = '$escapedFecha' AND (hora_turno = '$escapedHora' OR hora_turno LIKE '$escapedHora%') LIMIT 1");
                    if ($query && mysql_num_rows($query) > 0) {
                        $errores['hora'] = "Ya existe un turno asignado para la fecha y horario seleccionados.";
                    }
                }
            }
        }

        return $errores;
    }
}
