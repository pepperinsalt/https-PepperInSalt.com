<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailTemplateResource\Pages;
use App\Models\EmailTemplate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Str;

class EmailTemplateResource extends Resource
{
    protected static ?string $model = EmailTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Template Details')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))
                            ),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('category')
                            ->options([
                                'general' => 'General',
                                'onboarding' => 'Onboarding',
                                'proposal' => 'Proposal',
                                'follow-up' => 'Follow-Up',
                                'newsletter' => 'Newsletter',
                                'invoice' => 'Invoice',
                                'marketing' => 'Marketing',
                            ])
                            ->default('general')
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->inline(false),
                    ]),

                    Forms\Components\TextInput::make('subject')
                        ->required()
                        ->placeholder('e.g. Thanks for reaching out, {{name}}!')
                        ->helperText('Use {{variable_name}} for dynamic values')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Email Body')
                ->schema([
                    Forms\Components\Placeholder::make('variables_hint')
                        ->label('Available Variables')
                        ->content('Use {{name}}, {{email}}, {{company}}, {{date}}, {{project}}, {{amount}} — or define your own below.')
                        ->columnSpanFull(),

                    TiptapEditor::make('body')
                        ->profile('default')
                        ->required()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Custom Variables')
                ->schema([
                    Forms\Components\Repeater::make('variables')
                        ->schema([
                            Forms\Components\TextInput::make('key')
                                ->label('Variable Name')
                                ->placeholder('e.g. project_name')
                                ->required(),
                            Forms\Components\TextInput::make('description')
                                ->label('Description')
                                ->placeholder('e.g. The client\'s project name'),
                        ])
                        ->columns(2)
                        ->addActionLabel('Add Variable')
                        ->collapsible(),

                    Forms\Components\Textarea::make('notes')
                        ->label('Internal Notes')
                        ->placeholder('When to use this template, any special instructions...')
                        ->rows(3),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('category')
                    ->colors([
                        'primary' => 'general',
                        'success' => 'onboarding',
                        'warning' => 'proposal',
                        'info' => 'follow-up',
                        'secondary' => 'newsletter',
                        'danger' => 'invoice',
                    ]),

                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'general' => 'General', 'onboarding' => 'Onboarding',
                        'proposal' => 'Proposal', 'follow-up' => 'Follow-Up',
                        'newsletter' => 'Newsletter', 'invoice' => 'Invoice',
                        'marketing' => 'Marketing',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')->label('Active'),
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->modalContent(fn (EmailTemplate $record) => view('filament.email-preview', ['template' => $record]))
                    ->modalWidth('4xl'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('category');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmailTemplates::route('/'),
            'create' => Pages\CreateEmailTemplate::route('/create'),
            'edit' => Pages\EditEmailTemplate::route('/{record}/edit'),
        ];
    }
}
