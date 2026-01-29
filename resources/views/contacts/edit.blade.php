@include('layout.head')
@include('layout.header')
<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Modifier un contact</h2>
                <button class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <form action="{{ route('contacts.update', ['contact' => $contact->id]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nom *</label>
                    <input type="text" name="name" value="{{ $contact->name }}" placeholder="Jean Dupont" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" value="{{ $contact->email }}" placeholder="jean.dupont@email.com" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Téléphone</label>
                    <input type="text" name="phone" value="{{ $contact->phone }}" placeholder="+33 6 12 34 56 78"
                           class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Groupe</label>
                    <select name="group_id" value="{{ $contact->group_id }}" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ $contact->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <button onclick="window.location.href='{{ route('contacts.index') }}'" type="button" class="px-6 py-2 border border-gray-300 text-gray-600 rounded-xl hover:bg-gray-50 font-medium">Annuler</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 font-medium shadow-lg shadow-blue-200">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>