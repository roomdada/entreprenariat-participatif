<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    /*
    * const des differents type de user
    */
    const INVESTOR = 1;

    const PROJECT_OWNER = 2;

    protected $guarded = [];

    /*
    * retourner les id des differents types
    */

    public static function getAllTypes(): array
    {
        return [
            UserType::INVESTOR,
            UserType::PROJECT_OWNER,
        ];
    }

    /*
    * retourner le type de l'utilsateur
    */

    public static function getUsertypeName(int $type): string
    {
        switch ($type) {
            case UserType::INVESTOR:
                return 'Investisseur';
                break;
            case UserType::PROJECT_OWNER:
                return 'Porteur de projet';
                break;
            default:
                return 'Admin fonctionnel';
        }
    }
}
