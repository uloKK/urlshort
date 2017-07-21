<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrlModel extends Model
{

    use SoftDeletes;

    protected $table = 'urls';

    protected $guarded = ['id'];

    protected $fillable = ['password'];

}
