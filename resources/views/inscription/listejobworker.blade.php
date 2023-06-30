@extends('layout')
@section('title','liste des jobworker')
@section('content')
<h1 class="text-2xl font-bold">Liste des jobworker</h1>
@if(session('success'))
<div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
@endif
@isset($message)
<p>{{$message}}</p>
@endisset
<table class="table-auto w-full mt-4">
    <thead>
        <tr>
            <th scope="col" class="px-4 py-2">ID</th>
            <th scope="col" class="px-4 py-2"></th>
            <th scope="col" class="px-4 py-2">nom</th>
            <th scope="col" class="px-4 py-2">prenom</th>
            <th scope="col" class="px-4 py-2">email</th>
            <th scope="col" class="px-4 py-2">siret</th>
            <th scope="col" class="px-4 py-2">activite</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobworker as $jobworker)
        <tr>
            <th scope="row" class="border px-4 py-2">{{ $jobworker->id }}</th>
            <td class="border px-4 py-2">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/inscription/delete/{{$jobworker->id }}" onclick="event.preventDefault();
        document.getElementById('delete-form{{$jobworker->id }}').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2h-2V5H4v10h10v-2h2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm10 2h2v8h-2V7zm-4 0h2v8h-2V7zm-4 0h2v8H4V7z" clip-rule="evenodd" />
                    </svg>
                </a>
                <form id="delete-form{{$jobworker->id }}" action="/inscription/delete/{{ $jobworker->id }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
            <td class="border px-4 py-2">{{ $jobworker->nom }}</td>
            <td class="border px-4 py-2">{{ $jobworker->prenom }}</td>
            <td class="border px-4 py-2">{{ $jobworker->email }}</td>
            <td class="border px-4 py-2">{{ $jobworker->siret }}</td>
            <td class="border px-4 py-2">{{ $jobworker->activite }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection