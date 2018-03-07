<?php
/**
 * Created by PhpStorm.
 * User: seniha.miminevska
 * Date: 23-Aug-17
 * Time: 14:58
 */

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
}