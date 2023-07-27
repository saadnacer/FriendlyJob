@extends('layout')

@section('title', 'Gestion des Utilisateurs')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Gestion des Utilisateurs</h2>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">Prénom</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->nom }}</td>
                        <td class="border px-4 py-2">{{ $user->prenom }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('admin.utilisateurs.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection