<?php

namespace StarfolkSoftware\Redo\Tests\Mocks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StarfolkSoftware\Redo\Recurs;

class Task extends Model
{
    use HasFactory;
    use Recurs;

    protected $table = 'tasks';
}