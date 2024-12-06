<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3 py-3">
                <div class="container mx-auto py-8">
                    <a href="{{ route('category.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold mx-2 py-2 px-4 rounded mb-3">
                        Crear Categoria
                    </a>
                </div>
                <div class="container mx-auto py-8">
                    @if(session('success'))
                        <div 
                            x-data="{ show: true }" 
                            x-init="setTimeout(() => show = false, 5000)" 
                            x-show="show" 
                            class="bg-green-500 text-white p-4 rounded-lg mb-4 transition-opacity duration-1000 ease-out"
                            x-transition:leave="transition-opacity ease-in duration-500"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto bg-white border border-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Id</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Categoria</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Año</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Profe</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr class="bg-gray-100">
                                    <td class="border px-4 py-2">{{ $category->id }}</td>
                                    <td class="border px-4 py-2">{{ $category->name }}</td>
                                    <td class="border px-4 py-2">{{ $category->year }}</td>
                                    <td class="border px-4 py-2">{{ $category->user->name }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('category.edit', $category) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                        <form action="{{ route('category.destroy', $category) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <div class="mt-4">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>