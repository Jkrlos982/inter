<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Torneos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3 py-3">
                <div class="container mx-auto py-8 mt-5">
                    <form action="{{ route('teacher.index') }}" method="GET" class="mb-5">
                        <div class="flex items-center justify_center">
                            <input
                                type="text"
                                name="search"
                                placeholder="Buscar por documento o nombre"
                                class="w-full sm:w-1/2 md:w-1/4 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ request('search') }}"
                            />
                            <button
                                type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>

                <div class="container mx-auto py-8">
                    <a href="{{ route('tournament.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                        Crear Torneo
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
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Id</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Nombre</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Categoria</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Inicia</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Termina</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @forelse($tournaments as $tournament)
                                <tr class="bg-gray-100">
                                    <td class="border px-4 py-2">{{ $tournament->id }}</td>
                                    <td class="border px-4 py-2">{{ $tournament->name }}</td>
                                    <td class="border px-4 py-2">
                                        @foreach($tournament->categories as $category)
                                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 rounded">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2">{{ $tournament->start_date }}</td>
                                    <td class="border px-4 py-2">{{ $tournament->end_date }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('tournament.show', $tournament) }}" class="text-blue-500 hover:text-blue-700">Ver | </a>
                                        <a href="{{ route('tournament.edit', $tournament) }}" class="text-blue-500 hover:text-blue-700">Editar | </a>
                                        <form action="{{ route('tournament.destroy', $tournament) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">No se encontraron torneos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        <div class="mt-4">
                            {{ $tournaments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>