<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conceptos de Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6">
                    <!-- Título y botón de creación -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold">Conceptos de Pago</h2>
                        <a href="{{ route('paymentConcept.create') }}" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded">
                            Crear Nuevo Concepto
                        </a>
                    </div>

                    <!-- Tabla de conceptos de pago -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Concepto</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @forelse ($concepts as $concept)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6">{{ $concept->id }}</td>
                                        <td class="py-3 px-6">{{ $concept->concept }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <!-- Botones de acciones (Editar y Eliminar) -->
                                            <a href="{{ route('paymentConcept.edit', $concept->id) }}" class="text-blue-600 hover:underline mr-2">Editar</a>
                                            
                                            <form action="{{ route('paymentConcept.destroy', $concept->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Estás seguro de eliminar este concepto?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">No se encontraron conceptos de pago.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $concepts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>