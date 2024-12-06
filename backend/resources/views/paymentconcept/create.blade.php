<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Concepto de Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">

                    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
                        <form action="{{ route('paymentConcept.store') }}" method="POST">
                            @csrf

                            <!-- Nombre del Concepto -->
                            <div class="mb-4">
                                <label for="concept" class="block text-gray-700 font-medium mb-2">Concepto de Pago</label>
                                <input 
                                    type="text" 
                                    name="concept" 
                                    id="concept" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('concept') border-red-500 @enderror" 
                                    value="{{ old('concept') }}" 
                                    required
                                >
                                @error('concept')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Guardar Concepto</button>
                                <a href="{{ route('paymentConcept.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>