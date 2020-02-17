@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl mb-6">{{ $album->title }}</h1>
        <p class="mb-6">{{ $album->description }}</p>
        <div class="bg-white p-4 shadow">
            <div class="flex flex-row flex-wrap -mx-2 justify-between">
                @foreach($album->photos as $photo)
                    <div class="mb-3">
                        <a title="{{ $photo->title }}" href="/storage/albums/{{ $photo->album->id }}/{{ $photo->photo_url }}" data-fancybox="gallery" data-caption="{{ $photo->description }}">
                            <img class="object-cover p-2 mb-1" src="/storage/albums/{{ $photo->album->id }}/{{ $photo->photo_url }}" alt="" width="300" style="height: 200px">
                        </a>
                        <span class="px-2 font-semibold">{{ $photo->title }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
