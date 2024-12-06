<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $tournament->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">

                    <!-- Detalles del Torneo -->
                    <div class="mb-4">
                        <h3 class="text-lg leading-6 font-medium text-white bg-blue-500 p-2 rounded-md">Detalles del Torneo</h3>
                        <div class="mt-1 text-sm text-gray-600 flex space-x-4">
                            <p><strong>Fecha de Inicio:</strong> {{ $tournament->start_date }}</p>
                            <p><strong>Fecha de Finalización:</strong> {{ $tournament->end_date }}</p>
                            <p><strong>En</strong> {{$tournament->address}}</p>
                        </div>
                    </div>

                    <!-- Listado de Partidos por Categoría -->
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-white bg-blue-500 p-2 rounded-md mb-4">Partidos por Categoría</h3>

                        @forelse ($tournament->categories as $category)
                            <div class="mb-6">
                                <h4 class="text-md font-semibold text-blue-600">{{ $category->name }}</h4>

                                @if ($category->games->isNotEmpty())
                                    <div class="overflow-x-auto mt-2">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo Local</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo Visitante</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($category->games as $match)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $match->home_team }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $match->away_team }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $match->date }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $match->time }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-sm text-gray-600">No hay partidos registrados para esta categoría.</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-sm text-gray-600">No hay categorías asociadas a este torneo.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
