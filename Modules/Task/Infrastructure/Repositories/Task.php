<?php

namespace Modules\Task\Infrastructure\Repositories;;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}
