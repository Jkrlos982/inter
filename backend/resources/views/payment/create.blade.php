<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3 py-3">
                <div class="container mx-auto py-8 mt-5">
                <form action="{{ route('payment.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="student_id" class="block text-gray-700">Estudiante</label>
                        <select name="student_id" id="student_id" class="form-select mt-1 w-full" required>
                            <option value="">Seleccione un estudiante</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="payment_concept_id" class="block text-gray-700">Concepto de Pago</label>
                        <select name="payment_concept_id" id="payment_concept_id" class="form-select mt-1 w-full" required>
                            <option value="">Seleccione un concepto</option>
                            @foreach($concepts as $concept)
                                <option value="{{ $concept->id }}" {{ old('payment_concept_id') == $concept->id ? 'selected' : '' }}>
                                    {{ $concept->concept }}
                                </option>
                            @endforeach
                        </select>
                        @error('payment_concept_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="value" class="block text-gray-700">Valor a Pagar</label>
                        <input type="text" name="value" id="value" class="form-input mt-1 w-full" value="{{ old('value') }}" required>
                        @error('value')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="payment_date" class="block text-gray-700">Fecha de Pago</label>
                        <input type="date" name="payment_date" id="payment_date" class="form-input mt-1 w-full" value="{{ old('payment_date') }}" required>
                        @error('payment_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4" id="month_payment_field" style="display: none;">
                        <label for="month_payment" class="block text-gray-700">Mes de Pago</label>
                        <select name="month_payment" id="month_payment" class="form-select mt-1 w-full" required>
                            <option value="">Seleccione un concepto</option>
                            <option value="Enero" {{ old('month_payment') == "Enero" ? 'selected' : '' }}>Enero</option>
                            <option value="Febrero" {{ old('month_payment') == "Febrero" ? 'selected' : '' }}>Febrero</option>
                            <option value="Marzo" {{ old('month_payment') == "Marzo" ? 'selected' : '' }}>Marzo</option>
                            <option value="Abril" {{ old('month_payment') == "Abril" ? 'selected' : '' }}>Abril</option>
                            <option value="Mayo" {{ old('month_payment') == "Mayo" ? 'selected' : '' }}>Mayo</option>
                            <option value="Junio" {{ old('month_payment') == "Junio" ? 'selected' : '' }}>Junio</option>
                            <option value="Julio" {{ old('month_payment') == "Julio" ? 'selected' : '' }}>Julio</option>
                            <option value="Agosto" {{ old('month_payment') == "Agosto" ? 'selected' : '' }}>Agosto</option>
                            <option value="Septiembre" {{ old('month_payment') == "Septiembre" ? 'selected' : '' }}>Septiembre</option>
                            <option value="Octubre" {{ old('month_payment') == "Octubre" ? 'selected' : '' }}>Octubre</option>
                            <option value="Noviembre" {{ old('month_payment') == "Noviembre" ? 'selected' : '' }}>Noviembre</option>
                            <option value="Diciembre" {{ old('month_payment') == "Diciembre" ? 'selected' : '' }}>Diciembre</option>
                        </select>
                        @error('month_payment')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Registrar Pago
                        </button>
                        <a href="{{ route('teacher.index') }}" class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const paymentConceptSelect = document.getElementById('payment_concept_id');
        const monthPaymentField = document.getElementById('month_payment_field');

        paymentConceptSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.text === 'Mensualidad') {
                monthPaymentField.style.display = 'block';
            } else {
                monthPaymentField.style.display = 'none';
            }
        });
    </script>

</x-app-layout>