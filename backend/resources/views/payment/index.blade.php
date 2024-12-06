@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3 py-3">
                <div class="container mx-auto py-8 mt-5">

                    <!-- Submenú -->
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('paymentConcept.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Listar Conceptos de Pago</a>
                            <a href="{{ route('paymentConcept.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Crear Concepto de Pago</a>
                            <a href="{{ route('payment.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Registrar Nuevo Pago</a>
                        </div>
                    </div>

                    <!-- Barra de Búsqueda -->
                    <form method="GET" action="{{ route('payment.index') }}" class="mb-5">
                        <input
                            type="text"
                            name="search"
                            placeholder="Buscar por nombre de estudiante"
                            value="{{ old('search', $search) }}"
                            class="w-full sm:w-1/2 md:w-1/4 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500    ">Buscar</button>
                    </form>

                    <!-- Listado de Pagos -->
                    <table class="w-full bg-white shadow-md rounded overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Estudiante</th>
                                <th class="py-3 px-6 text-left">Concepto de Pago</th>
                                <th class="py-3 px-6 text-left">Concepto de Pago</th>
                                <th class="py-3 px-6 text-left">Valor</th>
                                <th class="py-3 px-6 text-left">Mes de Pago</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm">
                            @forelse ($payments as $payment)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6">{{ $payment->student->name }}</td>
                                    <td class="py-3 px-6">{{ $payment->paymentConcept->concept }}</td>
                                    <td class="py-3 px-6">{{ Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
                                    <td class="py-3 px-6">${{ number_format($payment->value, 0, ',', '.') }}</td>
                                    <td class="py-3 px-6">{{ $payment->month_payment ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">No se encontraron pagos.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $payments->links() }}
                    </div>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>