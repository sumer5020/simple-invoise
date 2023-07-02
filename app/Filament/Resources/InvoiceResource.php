<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('بيانات الفاتورة')
                        ->schema([
                            Forms\Components\TextInput::make('customer')
                                ->maxLength(250)
                                ->required(),
                            Forms\Components\Select::make('invoice_type')
                                ->options([
                                    1 => 'نقد',
                                    2 => 'آجل',
                                    3 => 'عرض سعر',
                                ])
                                ->searchable(),
                            Forms\Components\TextInput::make('period')
                                ->maxLength(250)
                                ->default(1)
                                ->required(), 
                        ])->columnSpan('full'),
                    Wizard\Step::make('محتوى الفاتورة')
                        ->schema([
                            Section::make('المنتج 1')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.1.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.1.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.1.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.1.Description')
                                        ->maxLength(250),
                                ]),
                            Section::make('المنتج 2')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.2.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.2.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.2.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.2.Description')
                                        ->maxLength(250),
                                ]),

                            Section::make('المنتج 3')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.3.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.3.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.3.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.3.Description')
                                        ->maxLength(250),
                                ]),
                            Section::make('المنتج 4')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.4.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.4.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.4.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.4.Description')
                                        ->maxLength(250),
                                ]),
                            Section::make('المنتج 5')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.5.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.5.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.5.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.5.Description')
                                        ->maxLength(250),
                                ]),
                            Section::make('المنتج 6')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.6.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.6.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.6.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.6.Description')
                                        ->maxLength(250),
                                ]),
                            Section::make('المنتج 7')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.7.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.7.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.7.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.7.Description')
                                        ->maxLength(250),
                               ]),
                            Section::make('المنتج 8')
                               ->description('كل قسم يمثل صف في الفاتورة')
                               ->schema([
                                   Forms\Components\TextInput::make('items.8.Total')
                                       ->maxLength(250),
                                   Forms\Components\TextInput::make('items.8.Unit')
                                       ->maxLength(250),
                                   Forms\Components\TextInput::make('items.8.Qty')
                                       ->maxLength(250),
                                   Forms\Components\TextInput::make('items.8.Description')
                                       ->maxLength(250),
                              ]),
                            Section::make('المنتج 9')
                                ->description('كل قسم يمثل صف في الفاتورة')
                                ->schema([
                                    Forms\Components\TextInput::make('items.9.Total')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.9.Unit')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.9.Qty')
                                        ->maxLength(250),
                                    Forms\Components\TextInput::make('items.9.Description')
                                        ->maxLength(250),
                               ]),
                        ])->columnSpan('full'),
                ])->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('customer'),
                Tables\Columns\TextColumn::make('invoice_type'),
                Tables\Columns\TextColumn::make('period'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }    
}
