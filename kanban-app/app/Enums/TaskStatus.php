<?php

namespace App\Enums;

use Filament\Support\Enum;
use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum TaskStatus: string
{
    use IsKanbanStatus;

    case Todo = 'todo';
    case Doing = 'doing';
    case Done = 'done';

    public static function kanbanCases(): array
    {
        return [
            static::Todo,
            static::Doing,
            static::Done,
        ];
    }

    public function getTitle(): string
    {
        return $this->name;
    }
   
}

