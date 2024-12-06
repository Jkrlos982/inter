<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva estadistica de Jugador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6">

                    <form action="{{ route('player_stats.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="player_id" class="block text-sm font-medium text-gray-700">Jugador</label>
                                <select id="player_id" name="player_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($players as $player)
                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                                <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tournament_id" class="block text-sm font-medium text-gray-700">Torneo</label>
                                <select id="tournament_id" name="tournament_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($tournaments as $tournament)
                                        <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="match_id" class="block text-sm font-medium text-gray-700">Partido</label>
                                <select id="match_id" name="match_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($matches as $match)
                                        <option value="{{ $match->id }}">{{ $match->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700">Posición</label>
                                <input type="text" id="position" name="position" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="minutes_played" class="block text-sm font-medium text-gray-700">Minutos Jugados</label>
                                <input type="number" id="minutes_played" name="minutes_played" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="is_starter" class="block text-sm font-medium text-gray-700">¿Fue Titular?</label>
                                <select id="is_starter" name="is_starter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div>
                                <label for="received_amonestation" class="block text-sm font-medium text-gray-700">¿Recibió Amonestación?</label>
                                <select id="received_amonestation" name="received_amonestation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div>
                                <label for="amonestation_type" class="block text-sm font-medium text-gray-700">Tipo de Amonestación</label>
                                <input type="text" id="amonestation_type" name="amonestation_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="has_injury" class="block text-sm font-medium text-gray-700">¿Sufrió Lesión?</label>
                                <select id="has_injury" name="has_injury" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div>
                                <label for="injury_duration" class="block text-sm font-medium text-gray-700">Duración de la Lesión (días)</label>
                                <input type="number" id="injury_duration" name="injury_duration" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Estadística</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>