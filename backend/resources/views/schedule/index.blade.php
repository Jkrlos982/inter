<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold">Horarios</h2>
                        <a href="{{ route('schedule.create') }}" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded">
                            Crear Nuevo Horario
                        </a>
                    </div>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Cancha</th>
                                    <th class="py-3 px-6 text-left">Categoría</th>
                                    <th class="py-3 px-6 text-left">Profesor</th>
                                    <th class="py-3 px-6 text-left">Hora de Inicio</th>
                                    <th class="py-3 px-6 text-left">Hora de Finalización</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @forelse ($schedules as $schedule)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6">{{ $schedule->id }}</td>
                                        <td class="py-3 px-6">{{ $schedule->field->name }}</td>
                                        <td class="py-3 px-6">{{ $schedule->category->name }}</td>
                                        <td class="py-3 px-6">{{ $schedule->category->user->name ?? 'N/A' }}</td>
                                        <td class="py-3 px-6">{{ $schedule->start_time }}</td>
                                        <td class="py-3 px-6">{{ $schedule->end_time }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="text-blue-600 hover:underline mr-2">Editar</a>
                                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Estás seguro de eliminar este horario?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">No se encontraron horarios.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>