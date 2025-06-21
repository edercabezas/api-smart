<?php

namespace App\Enums;

enum TypeDocument: string {
    case CC = 'Cédula de Ciudadanía';
    case TI = 'Tarjeta de Identidad';
    case CE = 'Cédula de Extranjería';
    case PA = 'Pasaporte';
    case RC = 'Registro Civil';


    public static function toArray(): array
    {
        return [
            'CC' => self::CC->value,
            'TI' => self::TI->value,
            'CE' => self::CE->value,
            'PA' => self::PA->value,
            'RC' => self::RC->value,
        ];
    }

    public static function getKey(string $value): ?string
    {
        foreach (self::toArray() as $key => $enumValue) {
            if ($enumValue === $value) {
                return $key;
            }
        }
        return null; // Valor no encontrado
    }
}
