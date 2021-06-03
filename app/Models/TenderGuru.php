<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderGuru extends Model
{
    use HasFactory;

    const url= 'https://www.tenderguru.ru/api/export';

    const api_code= 'Ro7nEuZuEb62jq9i';

//    protected $refresh_key= 'L_2XSquuJIgpaK1T';

    const dtype= 'json2';

}
