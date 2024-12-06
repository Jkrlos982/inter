<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asignar Estudiante A Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-2xl mx-auto mt-6">
                    <h2 class="text-xl font-semibold mb-4">Asignar Categoría con Historial a {{ $student->name }}</h2>

                    <form action="{{ route('student.assignCategory', $student->id) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">Seleccionar Categoría</label>
                            <select name="category_id" id="category_id" class="form-input mt-1 block w-full">
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="year" class="block text-gray-700">Año</label>
                            <input type="number" name="year" id="year" class="form-input mt-1 block w-full" value="{{ old('year', date('Y')) }}">
                            @error('year')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Asignar Categoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>