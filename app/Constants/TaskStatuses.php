<?php

namespace App\Constants;

abstract class TaskStatuses
{
    public const COMPLETED = 'COMPLETED';
    public const UNCOMPLETED = 'UNCOMPLETED';

    public static function getAll(): array
    {
        return [self::COMPLETED, self::UNCOMPLETED];
    }

    public static function getRandom()
    {
        return self::getAll()[array_rand(self::getAll(), 1)];
    }
}
