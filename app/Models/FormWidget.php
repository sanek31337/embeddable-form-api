<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormWidget extends Model
{
    protected $table = 'form_widget';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'pageUid',
        'userName',
        'message',
        'created'
    ];

    protected $dates = [
        'created'
    ];

    protected $dateFormat = 'Y-m-d';
}
