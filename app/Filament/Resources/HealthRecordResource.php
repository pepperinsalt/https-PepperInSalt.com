<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthRecordResource\Pages;
use App\Models\HealthRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HealthRecordResource extends Resource
{
    protected static ?string $model = HealthRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationGroup = 'Health';

    protected static ?string $navigationLabel = 'Health Log';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Date & Source')
                ->schema([
                    Forms\Components\DatePicker::make('recorded_date')
                        ->label('Date')
                        ->required()
                        ->default(now()),

                    Forms\Components\Select::make('source')
                        ->options([
                            'manual' => 'Manual Entry',
                            'apple_health' => 'Apple Health',
                            'google_fit' => 'Google Fit',
                            'garmin' => 'Garmin',
                            'whoop' => 'WHOOP',
                            'fitbit' => 'Fitbit',
                        ])
                        ->default('apple_health'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Activity')
                ->schema([
                    Forms\Components\TextInput::make('steps')
                        ->label('Steps')
                        ->numeric()
                        ->suffix('steps')
                        ->placeholder('10000'),

                    Forms\Components\TextInput::make('active_calories')
                        ->label('Active Calories')
                        ->numeric()
                        ->suffix('kcal'),

                    Forms\Components\TextInput::make('total_calories')
                        ->label('Total Calories Burned')
                        ->numeric()
                        ->suffix('kcal'),

                    Forms\Components\TextInput::make('exercise_minutes')
                        ->label('Exercise Time')
                        ->numeric()
                        ->suffix('min'),

                    Forms\Components\TextInput::make('stand_hours')
                        ->label('Stand Hours')
                        ->numeric()
                        ->suffix('hrs')
                        ->minValue(0)
                        ->maxValue(24),
                ])
                ->columns(3),

            Forms\Components\Section::make('Heart & Vitals')
                ->schema([
                    Forms\Components\TextInput::make('resting_heart_rate')
                        ->label('Resting Heart Rate')
                        ->numeric()
                        ->suffix('bpm'),

                    Forms\Components\TextInput::make('hrv')
                        ->label('HRV')
                        ->numeric()
                        ->suffix('ms')
                        ->helperText('Heart Rate Variability'),

                    Forms\Components\TextInput::make('vo2_max')
                        ->label('VO2 Max')
                        ->numeric()
                        ->step(0.1),
                ])
                ->columns(3),

            Forms\Components\Section::make('Sleep & Body')
                ->schema([
                    Forms\Components\TextInput::make('sleep_hours')
                        ->label('Sleep Duration')
                        ->numeric()
                        ->step(0.1)
                        ->suffix('hrs'),

                    Forms\Components\TextInput::make('sleep_score')
                        ->label('Sleep Score')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(100)
                        ->suffix('/100'),

                    Forms\Components\TextInput::make('weight_lbs')
                        ->label('Weight')
                        ->numeric()
                        ->step(0.1)
                        ->suffix('lbs'),
                ])
                ->columns(3),

            Forms\Components\Section::make('Notes')
                ->schema([
                    Forms\Components\Textarea::make('notes')
                        ->placeholder('How did you feel today? Any workouts, stress, illness?')
                        ->rows(4)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('recorded_date')
                    ->label('Date')
                    ->date('D, M j Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('steps')
                    ->label('Steps')
                    ->numeric(thousandsSeparator: ',')
                    ->suffix(' 👟')
                    ->color(fn ($state) => $state >= 10000 ? 'success' : ($state >= 5000 ? 'warning' : 'danger')),

                Tables\Columns\TextColumn::make('resting_heart_rate')
                    ->label('HR')
                    ->suffix(' bpm'),

                Tables\Columns\TextColumn::make('sleep_hours')
                    ->label('Sleep')
                    ->suffix(' hrs')
                    ->color(fn ($state) => $state >= 7 ? 'success' : ($state >= 6 ? 'warning' : 'danger')),

                Tables\Columns\TextColumn::make('weight_lbs')
                    ->label('Weight')
                    ->suffix(' lbs'),

                Tables\Columns\TextColumn::make('active_calories')
                    ->label('Cal')
                    ->suffix(' kcal'),

                Tables\Columns\BadgeColumn::make('source')
                    ->colors([
                        'primary' => 'apple_health',
                        'success' => 'garmin',
                        'warning' => 'manual',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('source'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('recorded_date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHealthRecords::route('/'),
            'create' => Pages\CreateHealthRecord::route('/create'),
            'edit' => Pages\EditHealthRecord::route('/{record}/edit'),
        ];
    }
}
