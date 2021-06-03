<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
  * Class SearchRequest
 * @package App\Models
 *
 * @property int id
 * @property int user_id
 * @property string kwords
 */
class SearchRequest extends Model
{
    use HasFactory;

    protected $table= 'search_requests';

    protected $guarded= ['id'];
}
