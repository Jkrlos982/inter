<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estadisticas de Jugador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6">
                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('player_stats.create') }}" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded">
                            Crear Nueva Estadística
                        </a>
                    </div>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Jugador</th>
                                    <th class="py-3 px-6 text-left">Categoría</th>
                                    <th class="py-3 px-6 text-left">Torneo</th>
                                    <th class="py-3 px-6 text-left">Partido</th>
                                    <th class="py-3 px-6 text-left">Posición</th>
                                    <th class="py-3 px-6 text-left">Minutos Jugados</th>
                                    <th class="py-3 px-6 text-left">Titular/Suplente</th>
                                    <th class="py-3 px-6 text-left">Amonestación</th>
                                    <th class="py-3 px-6 text-left">Lesión</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @forelse ($playerStats as $stat)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6">{{ $stat->id }}</td>
                                        <td class="py-3 px-6">{{ $stat->player->name }}</td>
                                        <td class="py-3 px-6">{{ $stat->category->name }}</td>
                                        <td class="py-3 px-6">{{ $stat->tournament->name }}</td>
                                        <td class="py-3 px-6">{{ $stat->match->name }}</td>
                                        <td class="py-3 px-6">{{ $stat->position }}</td>
                                        <td class="py-3 px-6">{{ $stat->minutes_played }}</td>
                                        <td class="py-3 px-6">{{ $stat->is_starter ? 'Titular' : 'Suplente' }}</td>
                                        <td class="py-3 px-6">{{ $stat->received_amonestation ? $stat->amonestation_type : 'N/A' }}</td>
                                        <td class="py-3 px-6">{{ $stat->has_injury ? $stat->injury_duration . ' días' : 'No' }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <a href="{{ route('player_stats.edit', $stat->id) }}" class="text-blue-600 hover:underline mr-2">Editar</a>
                                            <form action="{{ route('player_stats.destroy', $stat->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Estás seguro de eliminar esta estadística?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center py-4">No se encontraron estadísticas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $playerStats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>