<?php

namespace App\Observers;

use App\GrupoLaboratorio;

class GrupoLaboratorioObserver
{
    public function saving(GrupoLaboratorio $grupoLaboratorio)
    {
        $grupoLaboratorio->dias_asignados = implode(',', $grupoLaboratorio->dias_asignados);
    }
}
