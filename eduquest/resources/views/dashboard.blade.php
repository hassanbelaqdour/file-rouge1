@auth
    {{-- Formulaire qui ne contient que le bouton de déconnexion --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf {{-- Protection CSRF essentielle --}}

        <button type="submit"
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
            {{-- Vous pouvez utiliser une icône si vous préférez --}}
            {{-- <i class="fas fa-sign-out-alt"></i> --}}
            Déconnexion
        </button>
    </form>
@endauth

{{-- Si l'utilisateur n'est pas connecté, vous pourriez afficher les liens Login/Register --}}
@guest
    <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-black">Connexion</a>
    <a href="{{ route('register') }}" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Inscription</a>
@endguest