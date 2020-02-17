@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl mb-6">{{ $album->title }} bearbeiten</h1>

        <div class="p-2 bg-white rounded shadow mb-6">
            <strong>Kunden-URL:</strong> http://extranet.stg/albums/{{ $album->slug }}
        </div>

        <div class="flex">
            <div class="w-1/3 pr-5">
                <h2 class="text-xl mb-4 font-semibold">Metaangaben</h2>
                <form action="{{ route('albums.update', $album) }}" method="post" class="mb-10 p-4 bg-white rounded shadow">
                    @csrf
                    @method('PUT')
                    <div class="mb-8">
                        <label for="title" class="block mb-2 font-semibold text-sm">Titel des Albums</label>
                        <input type="text" class="p-2 w-full border border-gray-400 text-xl text-gray-800 focus:outline-none focus:shadow-outline" name="title" id="title" value="{{ $album->title }}" required>
                    </div>
                    <div class="mb-8">
                        <label for="description" class="block mb-2 font-semibold text-sm">Beschreibung des Albums</label>
                        <input type="text" class="p-2 w-full border border-gray-400 text-xl text-gray-800 focus:outline-none focus:shadow-outline" value="{{ $album->description }}" name="description" id="description">
                    </div>

                    <div class="mb-8">
                        <label class=" block font-semibold mb-2" for="is_active">Status</label>
                        <div class="inline-block relative w-full ">
                            <select name="is_active" id="is_active" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option value="0" {{ ($album->is_active) == 0 ? 'selected="selected"' : '' }}>inaktiv</option>
                                <option value="1" {{ ($album->is_active) == 1 ? 'selected="selected"' : '' }}>aktiv</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="shadow bg-green-400 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-semibold py-2 px-4 rounded" type="submit">
                            speichern
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-2/3 pl-5">
                <h2 class="text-xl mb-4 font-semibold">Bild hinzufügen</h2>
                <form class="p-4 bg-white rounded shadow" action="{{ route('photos.store', $album) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="albumId" value="{{ $album->id }}">
                    <div class="mb-4">
                        <label for="title" class="block font-semibold mb-2 text-sm">Titel</label>
                        <input type="text" name="title" id="title" class="w-full p-2 border border-gray-400 focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block font-semibold mb-2 text-sm">Bildbeschreibung</label>
                        <input type="text" name="description" id="description" class="w-full p-2 border border-gray-400 focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="photo_url" class="block font-semibold mb-2 text-sm">Datei</label>
                        <input type="file" name="photo_url" id="photo_url" class="w-full p-2 border border-gray-400 focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <button class="shadow bg-blue-400 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white font-semibold py-2 px-4 rounded" type="submit">
                            upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex w-full flex-col mb-6">
            <h2 class="text-xl my-4 font-semibold ">Vorhandene Bilder</h2>
            <div class="flex flex-wrap bg-white shadow -mx-4">
                @if (count($album->photos) > 0)
                    @foreach($album->photos as $photo)
                        <div class="w-1/4 p-4">
                            <div class="rounded overflow-hidden shadow border border-gray-400">
                                <img class="w-full object-cover" src="/storage/albums/{{ $photo->album->id }}/{{ $photo->photo_url }}" alt="" width="282" style="height: 200px">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $photo->title }}</div>
                                    <p class="text-gray-700 text-base">
                                        {{ $photo->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white p-4 shadow ">Keine Bilder vorhanden</div>
                @endif
            </div>
        </div>







    </div>
@stop
