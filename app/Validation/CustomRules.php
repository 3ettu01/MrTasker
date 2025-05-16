<?php

namespace App\Validation;

class CustomRules
{
    public function check_future_date(string $str, string $fields = null, array $data = null): bool {
        // input vacio
        if (empty($str)) {
            return true;
        }

        return strtotime($str) >= strtotime(date('Y-m-d'));
    }

    public function reminder_before_due(string $str, string $fields = null, array $data = null): bool {
        if (empty($str)) {
            return true; // si input recordatorio esta vacio
        }

        $request = \Config\Services::request();
        $vencimiento = $request->getPost('fvencimiento');

        if (empty($vencimiento)) {
            return true; // si no ingresa vencimiento (Esto se controla aparte)
        }

        $recordatorio = strtotime($str);
        $vencimiento = strtotime($vencimiento);

        return $recordatorio < $vencimiento;
    }
    public function sub_reminder_before_due(string $str, string $fields = null, array $data = null): bool {
        if (empty($str)) {
            return true;
        }

        $request = \Config\Services::request();
        $vencimiento = $request->getPost('sub_fvencimiento');

        if (empty($vencimiento)) {
            return true;
        }

        $recordatorio = strtotime($str);
        $vencimiento = strtotime($vencimiento);

        return $recordatorio <= $vencimiento;
    }


}


?>