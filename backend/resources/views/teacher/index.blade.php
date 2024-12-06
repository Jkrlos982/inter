<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profesores') }}
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
                    <a href="{{ route('teacher.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                        Crear Profesor
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
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Nombre</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                <tr class="bg-gray-100">
                                    <td class="border px-4 py-2">{{ $teacher->id }}</td>
                                    <td class="border px-4 py-2">{{ $teacher->name }}</td>
                                    <td class="border px-4 py-2">{{ $teacher->email }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('teacher.edit', $teacher) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                        <form action="{{ route('teacher.destroy', $teacher) }}" method="POST" style="display:inline-block;">
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
                            {{ $teachers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>