@extends('layouts.app')

@section('content')
    <h1 class="text-3xl mb-6">Albenübersicht</h1>

    <table class="min-w-full leading-normal mb-10">
        <thead>

        <tr>
            <th
                class="px-5 py-3 border-b-2 border-gray-400 bg-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Titel
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-400 bg-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                externe URL
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-400 bg-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Erstellt
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-400 bg-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Aktionen
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">
                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap font-semibold text-base">
                            {{ $album->title }}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                    <a href="http://extranet.stg/albums/{{ $album->slug }}">http://extranet.stg/albums/{{ $album->slug }}</a>
                </p>
            </td>
            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                    {{ $album->created_at }}
                </p>
            </td>
            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                <div class="flex flex-row items-center">
                    <a class="bg-blue-400 hover:bg-blue-700 px-4 py-2 text-white rounded mr-3" href="{{ route('albums.edit', $album) }}">Bearbeiten</a>
                    <form action="{{ route('albums.destroy', $album) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-400 hover:bg-red-700 px-4 py-2 text-white rounded" href="{{ route('albums.destroy', $album) }}">Löschen</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <a class="bg-green-400 hover:bg-green-700 text-white px-4 py-2 rounded" href="{{ route('albums.create') }}">Neues Album erstellen</a>
@endsection
