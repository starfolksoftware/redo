<?php

namespace StarfolkSoftware\Redo\Tests\Mocks;

use Illuminate\Database\Eloquent\Model;
use StarfolkSoftware\Redo\TeamHasRecurrences;

class Team extends Model
{
    use TeamHasRecurrences;

    protected $table = 'teams';
}