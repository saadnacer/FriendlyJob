@extends('layout')

@section('title', 'Contact')

@section('content')
<div class="flex justify-between items-start w-[92%] mx-auto mt-10">
    <div class="w-1/2">
        <form class="w-full max-w-lg" method="POST" action="{{ route('envoyer-mail') }}">
            @csrf
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            <div class="flex justify-between items-start w-[92%] mx-auto mt-10">
                <div class="w-1/2">
                    <form class="w-full max-w-lg">
                        @endif
                        <div class="mb-4">
                            <label class="block text-lg font-semibold mb-2" for="nom">Nom</label>
                            <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-indigo-500" type="text" id="nom" name="nom" placeholder="Votre nom">
                        </div>
                        <div class="mb-4">
                            <label class="block text-lg font-semibold mb-2" for="email">Email</label>
                            <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-indigo-500" type="email" id="email" name="email" placeholder="Votre adresse email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-lg font-semibold mb-2" for="message">Message</label>
                            <textarea class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-indigo-500" id="message" name="message" rows="5" placeholder="Votre message"></textarea>
                        </div>
                        <button class="bg-indigo-500 text-white px-6 py-2 rounded hover:bg-indigo-700" type="submit">Envoyer</button>
                    </form>
                </div>
                <div class="w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        <img class="w-full h-auto" src="/assets/img/rightbox/administratif.jpg" alt="Photo 1">
                        <img class="w-full h-auto" src="/assets/img/rightbox/demenagement.jpg" alt="Photo 2">
                        <img class="w-full h-auto" src="/assets/img/rightbox/repas.jpg" alt="Photo 3">
                        <img class="w-full h-auto" src="/assets/img/rightbox/informatique1.jpg" alt="Photo 4">
                    </div>
                </div>
            </div>
            @endsection