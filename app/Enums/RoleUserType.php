<?php

namespace App\Enums;

enum RoleUserType: int
{
    case Company = 1;
    case Candidate = 2;


    public function label(): string
    {
        return match ($this) {
            self::Company => 'Company',
            self::Candidate => 'Candidate',
        };
    }
}