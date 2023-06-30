@extends('layout')

@section('title', 'FriendlyJob')

@section('content')

<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col items-center shadow-lg max-w-lg mx-auto p-4 md:flex-row md:p-0">
        <!-- <img class="flex-1 w-full h-full md:h-full object-cover" src="assets/img/logo/logo.png" alt=""> -->
        <div class="p-4 flex-1 md:flex md:flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Inscription jobworkerlyuser</h2>
            @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            <form action="/inscription/ajouter" method="post" role="form" class="dm-form" data-aos="fade-up" data-aos-delay="100">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @error('nom')
                    {{$message}}
                    @enderror
                    @error('prenom')
                    {{$message}}
                    @enderror
                    @error('email')
                    {{$message}}
                    @enderror
                    @error('pwd')
                    {{$message}}
                    @enderror
                    @error('siret')
                    {{$message}}
                    @enderror
                    @error('activite')
                    {{$message}}
                    @enderror
                    @error('prix')
                    {{$message}}
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600" for="nom">nom</label>
                    <input type="text" id="nom" name="nom" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="prenom">prenom</label>
                    <input type="text" id="prenom" name="prenom" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="email">email</label>
                    <input type="text" id="email" name="email" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="email">confirmer email</label>
                    <input type="text" id="email" name="email" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="pwd">mot de passe</label>
                    <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="pwd">confirmer mot de passe</label>
                    <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="siret">siret</label>
                    <input type="text" id="siret" name="siret" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="activite">activite</label>
                    <input type="text" id="activite" name="activite" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="activite">prix</label>
                    <input type="text" id="prix" name="prix" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="col-span-2">
                    <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                        <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date" />
                        <label for="floatingInput" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Select a date</label>
                    </div>
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-[#87acec] mt-4 mb-20" type="submit">
                    inscription</button>
            </form>
        </div>
    </div>
</div>
@endsection