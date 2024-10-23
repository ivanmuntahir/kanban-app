<?php

namespace App\Filament\Pages;

use App\Models\Task;
use App\Enums\TaskStatus;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class TaskKanbanBoard extends KanbanBoard
{
    protected static string $model = Task::class;
    protected static string $statusEnum = TaskStatus::class;

    protected static ?string $title = 'Tasks';

     protected function statuses(): Collection
    {
        return TaskStatus::statuses();
    }
    protected function records(): Collection
    {
       return Task::ordered()->get();
    }

    public function onStatusChanged(int $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        Task::find($recordId)->update(['status' => $status]);
        Task::setNewOrder($toOrderedIds);
    }

    public function onSortChanged(int $recordId, string $status, array $orderedIds): void
    {
        Task::setNewOrder($orderedIds);
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->model(Task::class)
                ->form([
                    TextInput::make('title'),
                    Textarea::make('description'),
                ])
        ];
    }

    protected function getEditModalFormSchema(null|int $recordId): array
    {
        return [
            TextInput::make('title'),
            Textarea::make('description'),
        ];
    }

    protected function additionalRecordData(Task $record): Collection{
        return collect([
            'urgent'=> $record->urgent,
        ]);
    }
        
    
}
