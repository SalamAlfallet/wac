<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
    'name',
    'filepath',
    'mimetype',
    'mimetype',
    'user_id',
    'downloads',
'size'];

}
