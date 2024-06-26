<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'players';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'player_id';

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'student_id',
        'created_at',
        'updated_at',
    ];
}
