```php
<?php

include("conectar.php");

/*
|--------------------------------------------------------------------------
| CLASE FACHADA PATRON DE DISEÑO
|--------------------------------------------------------------------------
| Esta clase actúa como punto único de acceso a todas las operaciones
| relacionadas con la Historia Clínica.
|
| Desde aquí se centralizan las llamadas a:
|  - Registro de paciente
|  - Antecedentes familiares
|  - Antecedentes patológicos
|  - Vacunas
|  - Prácticas preventivas
|  - Medicación habitual
|  - Examen físico
|  - Problemas / Síndromes / Pendientes
|--------------------------------------------------------------------------
*/

class HistoriaClinica
{

    /*
    |--------------------------------------------------------------------------
    | Método principal de la Fachada
    |--------------------------------------------------------------------------
    */

    public function registrarHistoria($post, $files)
    {
        // Centraliza todas las operaciones

        $this->guardarPaciente($post, $files);
        $this->guardarFamiliares($post);
        $this->guardarAntecedentesPatologicos($post);
        $this->guardarVacunas($post);
        $this->guardarPracticasPreventivas($post);
        $this->guardarMedicacionHabitual($post);
        $this->guardarExamenFisico($post);
        $this->guardarOtros($post);
    }


    /*
    |--------------------------------------------------------------------------
    | Subsistemas
    |--------------------------------------------------------------------------
    */

    private function guardarPaciente($post, $files)
    {
        // Código de INSERT INTO historia_clinica
    }

    private function guardarFamiliares($post)
    {
        // Código de INSERT INTO familiares
    }

    private function guardarAntecedentesPatologicos($post)
    {
        // Código de INSERT INTO anpatologicos
    }

    private function guardarVacunas($post)
    {
        // Código de INSERT INTO vacunas
    }

    private function guardarPracticasPreventivas($post)
    {
        // Código de INSERT INTO practpreventivas
    }

    private function guardarMedicacionHabitual($post)
    {
        // Código de INSERT INTO medi_habituales
    }

    private function guardarExamenFisico($post)
    {
        // Código de INSERT INTO exfisico
    }

    private function guardarOtros($post)
    {
        // Código de INSERT INTO otros
    }

}

?>
