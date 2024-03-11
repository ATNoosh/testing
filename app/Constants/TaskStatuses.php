<?php

namespace App\Constants;

abstract class TaskStatuses
{
    public const COMPLETED = 'COMPLETED';
    public const UNCOMPLETED = 'UNCOMPLETED';
    public const ALL = 'ALL';

    public static function getAll(): array
    {
        return [self::COMPLETED, self::UNCOMPLETED];
    }

    public static function getRandom()
    {
        return self::getAll()[array_rand(self::getAll(), 1)];
    }

    public static function getOptionsInRequests()
    {
        return array_merge(self::getAll(), [self::ALL]);
    }
}
