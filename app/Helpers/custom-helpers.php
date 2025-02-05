<?php

use App\Helpers\Classes\Format;
use App\Helpers\Classes\Mask;
use App\Helpers\Classes\Sanitize;

if (!function_exists('currency_to_db')) {
    /**
     * Formatar moeda para BD.
     *
     * @param string|float $number Número a formatar
     * @param int $decimals [optional] Número de casas decimais (default: 2)
     *
     * @return string Número formatado
     */
    function currency_to_db(float|string $number, int $decimals = 2): string
    {
        if ($number) {
            return Format::currencyToDb($number, $decimals);
        }

        // Caso $number seja null ou = 0, retorna vazio.
        return '';
    }
}

if (!function_exists('currency_get_db')) {
    /**
     * Formatar moeda do BD para moeda brasileira.
     *
     * @param string|float $number Número a formatar
     * @param int $decimals [optional] Número de casas decimais (default: 2)
     * @param string $thousandSeparator [optional] Separador de milhar (default: '')
     *
     * @return string Número formatado
     */
    function currency_get_db(float|string $number, int $decimals = 2, string $thousandSeparator = ''): string
    {
        // Se existe $number e for diferente de 0, então mascara.
        if ($number && $number <> 0) {
            return Format::currencyGetDb($number, $decimals, $thousandSeparator);
        }

        // Caso $number é null ou = 0, retorna vazio.
        return '';
    }
}

if (!function_exists('date_to_db')) {
    /**
     * Formatar data para BD.
     *
     * @param string $date Data a formatar
     * @return string Data formatada
     */
    function date_to_db(string $date): string
    {
        if ($date) {
            return Format::dateToDb($date);
        }

        return '';
    }
}

if (!function_exists('mask_phone')) {
    /**
     * Formatar data para BD.
     *
     * @param string $phone Data a formatar
     * @return string Telefone formatado
     */
    function mask_phone(string $phone): string
    {
        if ($phone) {
            return Mask::phone($phone);
        }

        // Caso $phone é null, retorna vazio.
        return '';
    }
}

if (!function_exists('mask_cpf_cnpj')) {
    /**
     * Formatar data para BD.
     *
     * @param string $cpf_cnpj Data a formatar
     * @return string Cpf/Cnpj formatado
     */
    function mask_cpf_cnpj(string $cpf_cnpj): string
    {
        if (strlen($cpf_cnpj) == 14) {
            return Mask::cnpj($cpf_cnpj);
        } elseif (strlen($cpf_cnpj) == 11) {
            return Mask::cpf($cpf_cnpj);
        }

        // Caso $phone é null, retorna vazio.
        return '';
    }
}

if (!function_exists('mask_cep')) {
    /**
     * Formatar data para BD.
     *
     * @param string $cep Data a formatar
     * @return string Telefone formatado
     */
    function mask_cep(string $cep): string
    {
        if ($cep) {
            return Mask::cep($cep);
        }

        // Caso $phone é null, retorna vazio.
        return '';
    }
}

if (!function_exists('onlyNumbers')) {
    /**
     * Formatar data para BD.
     *
     * @param string $string String a formatar
     * @return string String formatado
     */
    function onlyNumbers(string $string): string
    {
        if ($string) {
            return Sanitize::onlyNumbers($string);
        }

        return '';
    }
}

if (!function_exists('capitalize_words')) {
    /**
     * Formatar data para BD.
     *
     * @param string $string String a formatar
     * @return string String formatado
     */
    function capitalize_words(?string $string): string
    {
        if ($string) {
            return Sanitize::capitalizeEachWords($string);
        }

        return '';
    }
}
