<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'curso';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID', 'ano', 'nombreCurso',
    ];
}
