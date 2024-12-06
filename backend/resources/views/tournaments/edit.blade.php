<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Torneo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3 py-3">
                <form action="{{ route('tournament.update', $tournament->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre del Torneo -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Torneo</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ old('name', $tournament->name) }}" 
                            required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lugar del Torneo -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Lugar del Torneo</label>
                        <input 
                            type="text" 
                            name="address" 
                            id="address" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ old('address', $tournament->address) }}" 
                            required>
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Categorías -->
                    <div class="mb-4">
                        <label for="categories" class="block text-sm font-medium text-gray-700">Categorías</label>
                        <select 
                            name="categories[]" 
                            id="categories" 
                            multiple 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ in_array($category->id, old('categories', $tournament->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-gray-500">Mantén presionada la tecla Ctrl (o Cmd en Mac) para seleccionar múltiples categorías.</small>
                        @error('categories')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Fechas del Torneo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
                            <input 
                                type="date" 
                                name="start_date" 
                                id="start_date" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                value="{{ old('start_date', $tournament->start_date) }}" 
                                required>
                            @error('start_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de Finalización</label>
                            <input 
                                type="date" 
                                name="end_date" 
                                id="end_date" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                value="{{ old('end_date', $tournament->end_date) }}" 
                                required>
                            @error('end_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de Enviar -->
                    <div>
                        <button 
                            type="submit" 
                            class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Actualizar Torneo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>