@extends('layout')

@section('title', 'Connexion')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col items-center shadow-lg max-w-md mx-auto p-4 md:p-0">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Connexion</h2>
        @if($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/connexion/login" method="POST" class="w-full">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required
                    class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="pwd" class="block text-gray-700">Mot de passe:</label>
                <input type="pwd" id="pwd" name="pwd" required
                    class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">Se
                connecter</button>
        </form>
    </div>
</div>
@endsection