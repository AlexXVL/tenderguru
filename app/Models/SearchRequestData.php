<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SearchRequestData
 * @package App\Models
 *
 * @property int search_request_id
 * @property string data
 */
class SearchRequestData extends Model
{
    use HasFactory;

    protected $table= 'search_requests_data';

    protected $guarded= ['id'];
}
