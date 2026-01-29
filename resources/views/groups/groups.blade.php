@include('layout.head')
@include('layout.header')

<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-8">
        <div class="flex bg-gray-100 p-1 rounded-xl">
            <a href="{{ route('contacts.index') }}"
                class="flex items-center gap-2 px-4 py-2 text-gray-500 hover:text-gray-700 transition font-medium">
                <i class="fas fa-users text-sm"></i>
                <span>Contacts</span>
            </a>

            <a href="{{ route('groups.index') }}"
                class="flex items-center gap-2 px-4 py-2 bg-white text-blue-600 rounded-lg border border-gray-200 shadow-sm transition font-medium">
                <i class="fas fa-folder text-sm"></i>
                <span>Groupes</span>
            </a>
        </div>

        <button onclick="window.location.href='{{ route('groups.createGroup') }}'"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl flex items-center gap-2 transition">
            <i class="fas fa-plus"></i>
            <span class="font-medium">Créer un groupe</span>
        </button>
    </div>

    <div class="flex flex-col md:flex-row gap-4 mb-8">
        <div class="relative flex-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" placeholder="Rechercher un groupe..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($groups as $group)
            <a href="{{ route('groups.showOne', ['id' => $group->id]) }}" class="bg-white border border-gray-100 p-5 rounded-2xl flex items-center justify-between shadow-sm hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center transition group-hover:bg-blue-600 group-hover:text-white">
                        <i class="fas fa-folder text-xl"></i>
                    </div>
                    <div>
                        <span class="font-bold text-gray-800 block">{{ $group->name }}</span>
                        <span class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Dossier</span>
                    </div>
                </div>

                <div class="flex gap-1">
                    <form action="{{ route('groups.edit', ['group' => $group->id]) }}" method="GET">
                        @csrf
                        <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                            <i class="fas fa-pencil-alt text-sm"></i>
                        </button>

                    </form>
                    <form action="{{ route('groups.destroy',$group->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                            <i class="fas fa-trash-alt text-sm"></i>
                        </button>
                    </form>
                </div>
            </a>
        @endforeach
    </div>
</div>

</body>
</html>