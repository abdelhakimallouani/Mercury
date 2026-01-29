@include('layout.head')
@include('layout.header')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-8">
        <div class="flex bg-gray-100 p-1 rounded-xl">
            <a href="{{ route('contacts.index') }}"
                class="flex items-center gap-2 px-4 py-2 bg-white text-blue-600 rounded-lg border  shadow-sm transition">
                <i class="fas fa-users text-sm"></i>
                <span>Contacts</span>
            </a>

            <a href="{{ route('groups.index') }}"
                class="flex items-center gap-2 px-4 py-2 text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-folder text-sm"></i>
                <span>Groupes</span>
            </a>
        </div>

        <button onclick="window.location.href='{{ route('contacts.createContact') }}'"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl flex items-center gap-2 transition">
            <i class="fas fa-plus"></i>
            <span class="font-medium">Ajouter un contact</span>
        </button>
    </div>

    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="relative flex-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" placeholder="Rechercher un contact par nom..."
                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <select class="border border-gray-200 rounded-xl px-4 py-2 outline-none bg-white text-gray-600">
            <option>Tous les groupes</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($contacts as $contact)
            <div
                class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-start justify-between group hover:shadow-md transition">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-bold">
                        {{ substr($contact->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $contact->name }}</h3>
                        <p class="text-sm text-gray-500"><i class="far fa-envelope mr-1"></i> {{ $contact->email }}</p>
                        <p class="text-sm text-gray-500"><i class="fas fa-phone-alt mr-1"></i> {{ $contact->phone }}</p>
                        <span
                            class="inline-block mt-2 px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                            {{ $contact->group->name }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <form action="{{ route('contacts.edit', ['contact' => $contact->id]) }}" method="GET">
                        @csrf
                        <button class="text-gray-400 hover:text-blue-600"><i class="far fa-edit"></i></button>

                    </form>
                    <form action="{{route('contacts.destroy',$contact->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-400 hover:text-red-600"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>

</html>
