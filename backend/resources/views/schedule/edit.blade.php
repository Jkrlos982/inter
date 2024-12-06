<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Horario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg mx-auto w-full bg-purple-200">
                <div class="container mx-auto mt-10 w-full">
                    <form method="POST" action="{{ route('schedule.update', $schedule) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="m-4 w-1/2">
                            <label for="category" class="block text-bold font-medium text-gray-700">Categoria</label>
                            <select id="category_id" name="category_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $schedule->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="m-4 w-1/2">
                            <label for="field" class="block text-bold font-medium text-gray-700">Cancha</label>
                            <select id="field_id" name="field_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($fields as $field)
                                    <option value="{{ $field->id }}" {{ $schedule->field_id == $field->id ? 'selected' : '' }}>{{ $field->name }}</option>
                                @endforeach
                            </select>

                            @error('field_id')
                                <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="m-4 w-1/2">
                            <label for="start_time" class="block text-bold font-medium text-gray-700">Inicio</label>

                            <input 
                                id="start_time" 
                                type="datetime-local" 
                                name="start_time" 
                                value="{{ old('start_time') ?? $schedule->start_time->format('Y-m-d\TH:i') }}" 
                                required 
                                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >

                            @error('start_time')
                                <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="m-4 w-1/2">
                            <label for="start_time" class="block text-bold font-medium text-gray-700">Fin</label>

                            <input 
                                id="end_time" 
                                type="datetime-local" 
                                name="end_time" 
                                value="{{ old('end_time') ?? $schedule->end_time->format('Y-m-d\TH:i') }}" 
                                required 
                                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >

                            @error('end_time')
                                <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end pb-4 m-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{ __('Editar Horario') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>