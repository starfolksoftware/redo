<?php

namespace StarfolkSoftware\Redo;

final class Redo
{
    /**
     * Indicates if Redo migrations should be ran.
     *
     * @var bool
     */
    public static $runsMigrations = true;

    /**
     * The recurrence model that should be used by Redo.
     *
     * @var string
     */
    public static $recurrenceModel = 'App\\Models\\Recurrence';

    /**
     * The recurrences table name that should be used by Redo.
     *
     * @var string
     */
    public static $recurrencesTableName = 'recurrences';

    /**
     * The timezone that should be used by Redo.
     *
     * @var string
     */
    public static $timezone = 'Africa/Lagos';

    /**
     * Indicates whether Redo soft deletes recurrences.
     *
     * @var bool
     */
    public static $supportsSoftDeletes = false;

    /**
     * Indicates if Redo should support teams.
     *
     * @var bool
     */
    public static $supportsTeams = false;

    /**
     * The team model that should be used by Redo.
     *
     * @var string
     */
    public static $teamModel;

    /**
     * Get the name of the team model used by the application.
     *
     * @return string
     */
    public static function teamModel()
    {
        return static::$teamModel;
    }

    /**
     * Specify the team model that should be used by Redo.
     *
     * @param  string  $model
     * @return static
     */
    public static function useTeamModel(string $model)
    {
        static::$teamModel = $model;

        return new static();
    }

    /**
     * Get a new instance of the team model.
     *
     * @return mixed
     */
    public static function newTeamModel()
    {
        $model = static::teamModel();

        return new $model();
    }

    /**
     * Find a team instance by the given ID.
     *
     * @param  mixed  $id
     * @return mixed
     */
    public static function findTeamByIdOrFail($id)
    {
        return static::newTeamModel()->whereId($id)->firstOrFail();
    }

    /**
     * Get the name of the recurrence model used by the application.
     *
     * @return string
     */
    public static function recurrenceModel()
    {
        return static::$recurrenceModel;
    }

    /**
     * Get a new instance of the recurrence model.
     *
     * @return mixed
     */
    public static function newRecurrenceModel()
    {
        $model = static::recurrenceModel();

        return new $model();
    }

    /**
     * Specify the recurrence model that should be used by Redo.
     *
     * @param  string  $model
     * @return static
     */
    public static function useRecurrenceModel(string $model)
    {
        static::$recurrenceModel = $model;

        return new static();
    }

    /**
     * Configure Redo to not run its migrations.
     *
     * @return static
     */
    public static function ignoreMigrations()
    {
        static::$runsMigrations = false;

        return new static();
    }

    /**
     * Configure Redo to support multiple teams.
     *
     * @param  bool  $value
     * @return static
     */
    public static function supportsTeams(bool $value = true)
    {
        static::$supportsTeams = $value;

        return new static();
    }

    /**
     * Configure Redo to support soft delete.
     *
     * @param  bool  $value
     * @return static
     */
    public static function supportsSoftDeletes(bool $value = true)
    {
        static::$supportsSoftDeletes = $value;

        return new static();
    }

    /**
     * Sets recurrences table name.
     *
     * @param  string  $value
     * @return static
     */
    public static function useRecurrencesTableName(string $value)
    {
        static::$recurrencesTableName = $value;

        return new static();
    }

    /**
     * Sets the timezone.
     * 
     * @param string $timezone
     * @return static
     */
    public static function useTimezone(string $timezone)
    {
        static::$timezone = $timezone;

        return new static();
    }
}
