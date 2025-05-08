<?php

namespace App\Validation;

class CustomRules
{
    public function check_future_date(string $str, string $fields = null, array $data = null): bool
    {
        // input vacio
        if (empty($str)) {
            return true;
        }

        return strtotime($str) >= strtotime(date('Y-m-d'));
    }
}


?>