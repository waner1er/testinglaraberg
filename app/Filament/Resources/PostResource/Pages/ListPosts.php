<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;


}
