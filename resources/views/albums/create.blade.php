@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl mb-6">Neues Album erstellen</h1>
        <form action="{{ route('albums.store') }}" method="post">
            @csrf
            <div class="mb-8">
                <label for="title" class="block mb-2 font-semibold">Titel des Albums</label>
                <input type="text" class="p-4 w-full border border-gray-300 text-xl text-gray-800" name="title" id="title" required>
            </div>
            <div class="mb-8">
                <label for="description" class="block mb-2 font-semibold">Beschreibung des Albums</label>
                <input type="text" class="p-4 w-full border border-gray-300 text-xl text-gray-800" name="description" id="description">
            </div>

            <div class="mb-8">
                <label class=" block font-semibold mb-2" for="is_active">Status</label>
                <div class="inline-block relative w-64 ">
                    <select name="is_active" id="is_active" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0">inaktiv</option>
                        <option value="1">aktiv</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>

            <div>
                <button class="shadow bg-green-500 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-semibold py-2 px-4 rounded" type="submit">
                    speichern
                </button>
            </div>
        </form>
    </div>
@stop
