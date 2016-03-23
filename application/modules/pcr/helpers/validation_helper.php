<?php

function cpf_number_validation($cpf)
{ // Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);

    // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if ( strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999' )
    {
        return FALSE;
    }
    else
    { // Calcula os números para verificar se o CPF é verdadeiro
        for ( $t = 9; $t < 11; $t++ )
        {
            for ( $d = 0, $c = 0; $c < $t; $c++ )
            {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ( $cpf{$c} != $d )
            {
                return FALSE;
            }
        }
        return TRUE;
    }
}

function cnpj_number_validation($cnpj)
{
    //TODO CPNJ VALIDATION
    if ( !is_numeric($cnpj) && count($cnpj) != 14 )
    {
        return FALSE;
    }
    else
    {
        /* Verifica se todos os números digitados são iguais, caso sejam, faz o mesmo que na condição anterior */
        if ( ($cnpj == '11111111111111') ||
                ($cnpj == '22222222222222') ||
                ($cnpj == '33333333333333') ||
                ($cnpj == '44444444444444') ||
                ($cnpj == '55555555555555') ||
                ($cnpj == '66666666666666') ||
                ($cnpj == '77777777777777') ||
                ($cnpj == '88888888888888') ||
                ($cnpj == '99999999999999') ||
                ($cnpj == '00000000000000') )
        {
            return FALSE;
        }
        else
        {
            if ( strlen($cnpj) > 14 )
                $cnpj = substr($cnpj, 1);

            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $calc1 = 5;
            $calc2 = 6;

            for ( $i = 0; $i <= 12; $i++ )
            {
                $calc1 = $calc1 < 2 ? 9 : $calc1;
                $calc2 = $calc2 < 2 ? 9 : $calc2;

                if ( $i <= 11 )
                    $sum1 += $cnpj[$i] * $calc1;

                $sum2 += $cnpj[$i] * $calc2;
                $sum3 += $cnpj[$i];
                $calc1--;
                $calc2--;
            }

            $sum1 %= 11;
            $sum2 %= 11;

            return ($sum3 && $cnpj[12] == ($sum1 < 2 ? 0 : 11 - $sum1) && $cnpj[13] == ($sum2 < 2 ? 0 : 11 - $sum2)) ? $cnpj : FALSE;
        }
    }
}

function password_strength($pass)
{
    $len = strlen($pass);
    $count = 0;
    //$array = array('`[a-z]`', '`[A-Z]`', '`[0-9]`', "`[!#_-]`");
    $array = array('`[a-zA-Z]`', '`[0-9]`');
    foreach ( $array as $a )
    {
        if ( preg_match($a, $pass) )
        {
            $count++;
        }
    }

    if ( $len >= 8 )
    {
        $count++;
    }

    if ( $count == 3 )
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}