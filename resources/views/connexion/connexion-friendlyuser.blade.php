@extends('layout')

@section('title', 'FriendlyJob')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="flex items-center shadow-lg max-w-lg mx-auto md:flex">
        <!-- <img class="flex-1 w-full h-full md:h-full object-cover" src="assets/img/logo/logo.png" alt=""> -->
        <div class="p-4 flex-1 md:flex md:flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Connexion FriendlyUser</h2>
            @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            <form action="/connexion/connexion-friendlyuser" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-600" for="email">Email</label>
                    <input type="text" id="email" name="email"
                        class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="pwd">Mot de passe</label>
                    <input type="password" id="pwd" name="newPwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-[#87acec] mt-4 mb-20" type="submit">
                    Se Connecter</button>
            </form>
        </div>
    </div>
</div>

@endsection
