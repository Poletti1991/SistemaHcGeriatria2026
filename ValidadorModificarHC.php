<?php
/**
 * Validador para la Modificación de Historias Clínicas
 * Universidad Nacional del Nordeste (UNNE) - FACENA
 * Lic. en Sistemas de Información - Ingeniería del Software II
 */

class ValidadorModificarHC
{
    /**
     * Valida los datos de entrada para la modificación de una Historia Clínica.
     * 
     * @param array $post Datos recibidos por POST (ej. $_POST)
     * @param array $files Archivos recibidos por FILES (ej. $_FILES)
     * @param array|null $existingIds Lista opcional de IDs de paciente válidos para mock de base de datos en pruebas
     * @return array Array asociativo con los errores detectados. Vacío si todo es correcto.
     */
    public static function validar($post, $files = null, $existingIds = null)
    {
        $errores = [];

        // 0. Validación de ID de Paciente (Obligatorio para modificar)
        if (empty($post['ID']) && empty($post['id'])) {
            $errores['id'] = "El ID del paciente es obligatorio para realizar modificaciones.";
        } else {
            $id = !empty($post['ID']) ? trim($post['ID']) : trim($post['id']);
            if (!is_numeric($id)) {
                $errores['id'] = "El ID del paciente debe ser numérico.";
            } else {
                $idVal = intval($id);
                if ($idVal <= 0) {
                    $errores['id'] = "El ID del paciente debe ser un número entero positivo.";
                } elseif (is_array($existingIds)) {
                    // Modo Prueba Unitarias (Mock)
                    if (!in_array($idVal, $existingIds)) {
                        $errores['id'] = "No se puede modificar una historia clínica de un paciente inexistente.";
                    }
                }
            }
        }

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

        // 2. Validación de Nombre y Apellido
        if (empty($post['Nombre']) || trim($post['Nombre']) === '') {
            $errores['Nombre'] = "El Nombre y Apellido es obligatorio.";
        }

        // 3. Validación de DNI (Debe ser numérico)
        if (empty($post['DNI']) || trim($post['DNI']) === '') {
            $errores['DNI'] = "El DNI es obligatorio.";
        } elseif (!is_numeric(trim($post['DNI']))) {
            $errores['DNI'] = "El DNI debe contener únicamente números.";
        }

        // 4. Validación de Domicilio
        if (empty($post['Domicilio']) || trim($post['Domicilio']) === '') {
            $errores['Domicilio'] = "El Domicilio es obligatorio.";
        }

        // 5. Validación de la Edad (Debe ser entero positivo razonable)
        if (empty($post['Edad']) || trim($post['Edad']) === '') {
            $errores['Edad'] = "La edad es obligatoria.";
        } else {
            $edadRaw = trim($post['Edad']);
            if (!is_numeric($edadRaw) || intval($edadRaw) != $edadRaw) {
                $errores['Edad'] = "La edad debe ser un número entero.";
            } else {
                $edad = intval($edadRaw);
                if ($edad < 0 || $edad > 125) {
                    $errores['Edad'] = "La edad debe estar en un rango lógico de 0 a 125 años.";
                }
            }
        }

        // 6. Validación de Ocupación
        if (empty($post['Ocupacion']) || trim($post['Ocupacion']) === '') {
            $errores['Ocupacion'] = "La Ocupación es obligatoria.";
        }

        // 7. Validación de Obra Social
        if (empty($post['OS']) || trim($post['OS']) === '') {
            $errores['OS'] = "La Obra Social es obligatoria.";
        }

        // 8. Validación de Motivo de Consulta
        if (empty($post['motivo']) || trim($post['motivo']) === '') {
            $errores['motivo'] = "El Motivo de Consulta es obligatorio.";
        }

        // 9. Validación de Vive con
        if (empty($post['vive_con']) || trim($post['vive_con']) === '') {
            $errores['vive_con'] = "El campo 'Vive con' es obligatorio.";
        }

        // 10. Validación de Contención (Debe ser Si o No)
        if (empty($post['conteccion'])) {
            $errores['conteccion'] = "Debe especificar si tiene contención.";
        } else {
            $contencion = trim($post['conteccion']);
            if ($contencion !== 'Si' && $contencion !== 'No') {
                $errores['conteccion'] = "El campo Contención debe ser 'Si' o 'No'.";
            }
        }

        // 11. Validación del Archivo (Foto del paciente)
        if ($files && isset($files['archivo']) && $files['archivo']['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($files['archivo']['error'] === UPLOAD_ERR_OK) {
                $filename = $files['archivo']['name'];
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
                
                if (!in_array($ext, $extensionesPermitidas)) {
                    $errores['archivo'] = "El archivo debe ser una imagen válida (formatos permitidos: JPG, JPEG, PNG, GIF).";
                }
            } else {
                $errores['archivo'] = "Hubo un error al subir el archivo (Código de error: " . $files['archivo']['error'] . ").";
            }
        }

        return $errores;
    }
}
