<?php


function getGen($gen)
{
    switch ($gen){
        case 'm';
            $gen = 'Masculino';
            break;
        case 'f';
            $gen = 'Feminino';
            break;
        case null;
            //Não informado
            $gen = 'Não informado';
            break;
    }
    return $gen;
}
