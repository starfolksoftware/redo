<?php

namespace StarfolkSoftware\Redo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Recurrence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'team_id',
        'recurrable_type',
        'recurrable_id',
        'frequency',
        'interval',
        'days',
        'starts_at',
        'ends_at',
        'ends_after',
        'status',
    ];

    /**
     * The attributes that should be dates.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'days' => 'array',
    ];

    /**
     * Returns the table name.
     *
     * @return string
     */
    public function getTable(): string
    {
        return Redo::$recurrencesTableName;
    }

    /**
     * Get the team that owns the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Redo::$teamModel, 'team_id');
    }

    /**
     * Returns the rewiewable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function recurrable()
    {
        return $this->morphTo();
    }
}
