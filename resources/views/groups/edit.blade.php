@include('layout.head')
@include('layout.header')
<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-xl w-full max-w-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Modifier un groupe</h2>
        <form action="{{ route('groups.update', ['group' => $group->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nom du groupe *</label>
                <input type="text" name="name" value="{{$group->name}}" placeholder="Ex: Famille, Travail..." required
                       class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div class="flex justify-end gap-3">
                <button onclick="window.location.href='{{ route('groups.index') }}'" type="button" class="px-4 py-2 border border-gray-300 text-gray-600 rounded-xl hover:bg-gray-50 font-medium">Annuler</button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 font-medium transition">Modifier</button>
            </div>
        </form>
    </div>
</div>