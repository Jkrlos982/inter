<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg mx-auto w-full bg-purple-200">
                <div class="container mx-auto mt-10 w-full">
                    <form action="{{ route('student.update') }}" method="POST" enctype="multipart/form-data" class="w-full h-full bg-purple-200 p-8 rounded shadow">
                        @csrf
                        @method('patch')

                        <!-- Página 1 -->
                        <div class="form-page w-full" id="page1">
                            <h3 class="text-xl font-semibold mb-4">Información Personal</h3>
                            
                            <div class="grid grid-cols-2 gap-2">
                                <div class="bg-purple-400 p-4">

                                    <div class="mb-4">
                                        <label for="photo" class="block text-white font-medium mb-2">Foto</label>
                                        <input type="file" name="photo" id="photo" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('photo') border-red-500 @enderror">
                                        <!-- Imagen de vista previa -->
                                        <img id="photoPreview" src="#" alt="Vista previa de la foto" class="mt-2 w-32 h-32 object-cover hidden">
                                        @error('photo')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="name" class="block text-white font-medium mb-2">Nombre</label>
                                        <input type="text" name="name" id="name" :value="old('name', $student->name) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="birthDate" class="block text-white font-medium mb-2">Fecha de Nacimiento</label>
                                        <input type="date" name="birthDate" id="birthDate" :value="old('birthDate', $student->birthDate) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('birthDate') border-red-500 @enderror" value="{{ old('birthDate') }}">
                                        @error('birthDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-4">
                                        <label for="bithPlace" class="block text-white font-medium mb-2">Lugar de Nacimiento</label>
                                        <input type="text" name="bithPlace" id="bithPlace" :value="old('bithPlace', $student->bithPlace) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('bithPlace') border-red-500 @enderror" value="{{ old('bithPlace') }}">
                                        @error('bithPlace')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="eps" class="block text-white font-medium mb-2">EPS</label>
                                        <input type="text" name="eps" id="eps" :value="old('eps', $student->eps) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('eps') border-red-500 @enderror" value="{{ old('eps') }}">
                                        @error('eps')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                    
                                <div class="bg-purple-400 p-4">
                                    <div class="mb-4">
                                        <label for="docId" class="block text-white font-medium mb-2">Documento de Identidad</label>
                                        <input type="text" name="docId" id="docId" :value="old('docId', $student->docId) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('docId') border-red-500 @enderror" value="{{ old('docId') }}">
                                        @error('docId')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="address" class="block text-white font-medium mb-2">Dirección</label>
                                        <input type="text" name="address" id="address" :value="old('address', $student->address) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror" value="{{ old('address') }}">
                                        @error('address')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="neighborhood" class="block text-white font-medium mb-2">Barrio</label>
                                        <input type="text" name="neighborhood" id="neighborhood" :value="old('neighborhood', $student->neighborhood) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('neighborhood') border-red-500 @enderror" value="{{ old('neighborhood') }}">
                                        @error('neighborhood')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="city" class="block text-white font-medium mb-2">Ciudad de Residencia</label>
                                        <input type="text" name="city" id="city" :value="old('city', $student->city) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('city') border-red-500 @enderror" value="{{ old('city') }}">
                                        @error('city')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="stratum" class="block text-white font-medium mb-2">Estrato</label>
                                        <input type="text" name="stratum" id="stratum" :value="old('stratum', $student->stratum) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stratum') border-red-500 @enderror" value="{{ old('stratum') }}">
                                        @error('stratum')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" onclick="nextPage()" class="bg-blue-500 text-white px-4 py-2 my-2 rounded hover:bg-blue-600">Siguiente</button>
                            </div>
                        </div>

                        <!-- Página 2 -->
                        <div class="form-page hidden" id="page2">
                            <h3 class="text-xl font-semibold mb-4">Información Familiar</h3>
                            
                            <div class="grid grid-cols-2 gap-2">
                                <div class="bg-purple-400 p-4">
                                    <div class="mb-4">
                                        <label for="fatherName" class="block text-white font-medium mb-2">Nombre del Padre</label>
                                        <input type="text" name="fatherName" id="fatherName" :value="old('fatherName', $student->fatherName) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('fatherName') border-red-500 @enderror" value="{{ old('fatherName') }}">
                                        @error('fatherName')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="fatherProfession" class="block text-white font-medium mb-2">Profesión del Padre</label>
                                        <input type="text" name="fatherProfession" id="fatherProfession" :value="old('fatherProfession', $student->fatherProfession) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('fatherProfession') border-red-500 @enderror" value="{{ old('fatherProfession') }}">
                                        @error('fatherProfession')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="fatherCompanyName" class="block text-white font-medium mb-2">Empresa del Padre</label>
                                        <input type="text" name="fatherCompanyName" id="fatherCompanyName" :value="old('fatherCompanyName', $student->fatherCompanyName) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('fatherCompanyName') border-red-500 @enderror" value="{{ old('fatherCompanyName') }}">
                                        @error('fatherCompanyName')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="fatherPhoneNumber" class="block text-white font-medium mb-2">Teléfono del Padre</label>
                                        <input type="text" name="fatherPhoneNumber" id="fatherPhoneNumber" :value="old('fatherPhoneNumber', $student->fatherPhoneNumber) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('fatherPhoneNumber') border-red-500 @enderror" value="{{ old('fatherPhoneNumber') }}">
                                        @error('fatherPhoneNumber')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="contactPhone" class="block text-white font-medium mb-2">Teléfono de Contacto</label>
                                        <input type="text" name="contactPhone" id="contactPhone" :value="old('contactPhone', $student->contactPhone) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contactPhone') border-red-500 @enderror" value="{{ old('contactPhone') }}">
                                        @error('contactPhone')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="bg-purple-400 p-4">
                            
                                    <div class="mb-4">
                                        <label for="motherName" class="block text-white font-medium mb-2">Nombre de la Madre</label>
                                        <input type="text" name="motherName" id="motherName" :value="old('motherName', $student->motherName) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('motherName') border-red-500 @enderror" value="{{ old('motherName') }}">
                                        @error('motherName')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="motherProfession" class="block text-white font-medium mb-2">Profesión de la Madre</label>
                                        <input type="text" name="motherProfession" id="motherProfession" :value="old('motherProfession', $student->motherProfession) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('motherProfession') border-red-500 @enderror" value="{{ old('motherProfession') }}">
                                        @error('motherProfession')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="motherCompanyName" class="block text-white font-medium mb-2">Empresa de la Madre</label>
                                        <input type="text" name="motherCompanyName" id="motherCompanyName" :value="old('motherCompanyName', $student->motherCompanyName) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('motherCompanyName') border-red-500 @enderror" value="{{ old('motherCompanyName') }}">
                                        @error('motherCompanyName')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="motherPhoneNumber" class="block text-white font-medium mb-2">Teléfono de la Madre</label>
                                        <input type="text" name="motherPhoneNumber" id="motherPhoneNumber" :value="old('motherPhoneNumber', $student->motherPhoneNumber) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('motherPhoneNumber') border-red-500 @enderror" value="{{ old('motherPhoneNumber') }}">
                                        @error('motherPhoneNumber')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="contactEmail" class="block text-white font-medium mb-2">Email de Contacto</label>
                                        <input type="text" name="contactEmail" id="contactEmail" :value="old('contactEmail', $student->contactEmail) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contactEmail') border-red-500 @enderror" value="{{ old('contactEmail') }}">
                                        @error('contactEmail')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between">
                                <button type="button" onclick="prevPage()" class="bg-gray-500 text-white px-4 py-2 my-2 rounded hover:bg-gray-600">Anterior</button>
                                <button type="button" onclick="nextPage()" class="bg-blue-500 text-white px-4 py-2 my-2 rounded hover:bg-blue-600">Siguiente</button>
                            </div>
                        </div>

                        <!-- Página 3 -->
                        <div class="form-page hidden" id="page3">
                            <h3 class="text-xl font-semibold mb-4">Información Adicional</h3>

                            <div class="grid grid-cols-2 gap-2">
                                <div class="bg-purple-400 p-4">
                            
                                    <div class="mb-4">
                                        <label for="school" class="block text-white font-medium mb-2">Escuela</label>
                                        <input type="text" name="school" id="school" :value="old('school', $student->school) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('school') border-red-500 @enderror" value="{{ old('school') }}">
                                        @error('school')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="schoolCity" class="block text-white font-medium mb-2">Ciudad de la Escuela</label>
                                        <input type="text" name="schoolCity" id="schoolCity" :value="old('schoolCity', $student->schoolCity) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('schoolCity') border-red-500 @enderror" value="{{ old('schoolCity') }}">
                                        @error('schoolCity')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="grade" class="block text-white font-medium mb-2">Grado</label>
                                        <input type="text" name="grade" id="grade" :value="old('grade', $student->grade) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('grade') border-red-500 @enderror" value="{{ old('grade') }}">
                                        @error('grade')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="schoolStartHour" class="block text-white font-medium mb-2">Hora de Inicio de Clases</label>
                                        <input type="text" name="schoolStartHour" id="schoolStartHour" :value="old('schoolStartHour', $student->schoolStartHour) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('schoolStartHour') border-red-500 @enderror" value="{{ old('schoolStartHour') }}">
                                        @error('schoolStartHour')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="schoolEndHour" class="block text-white font-medium mb-2">Hora de Fin de Clases</label>
                                        <input type="text" name="schoolEndHour" id="schoolEndHour" :value="old('schoolEndHour', $student->schoolEndHour) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('schoolEndHour') border-red-500 @enderror" value="{{ old('schoolEndHour') }}">
                                        @error('schoolEndHour')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="bg-purple-400 p-4">

                                    <div class="mb-4">
                                        <label for="weight" class="block text-white font-medium mb-2">Peso</label>
                                        <input type="number" step="0.1" name="weight" id="weight" :value="old('weight', $student->weight) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('weight') border-red-500 @enderror" value="{{ old('weight') }}">
                                        @error('weight')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="height" class="block text-white font-medium mb-2">Altura</label>
                                        <input type="number" step="0.1" name="height" id="height" :value="old('height', $student->height) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('height') border-red-500 @enderror" value="{{ old('height') }}">
                                        @error('height')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="blood" class="block text-white font-medium mb-2">Tipo de Sangre</label>
                                        <input type="number" step="0.1" name="blood" id="blood" :value="old('blood', $student->blood) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('blood') border-red-500 @enderror" value="{{ old('blood') }}">
                                        @error('blood')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="position" class="block text-white font-medium mb-2">Posición</label>
                                        <input type="text" name="position" id="position" :value="old('position', $student->position) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('position') border-red-500 @enderror" value="{{ old('position') }}">
                                        @error('position')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="uniformSize" class="block text-white font-medium mb-2">Tallas de Uniforme</label>
                                        <input type="text" name="uniformSize" id="uniformSize":value="old('uniformSize', $student->uniformSize) class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('uniformSize') border-red-500 @enderror" value="{{ old('uniformSize') }}">
                                        @error('uniformSize')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between">
                                <button type="button" onclick="prevPage()" class="bg-gray-500 text-white px-4 py-2 my-2 rounded hover:bg-gray-600">Anterior</button>
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 my-2 rounded hover:bg-green-600">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentPage = 1;

        function showPage(page) {
            document.querySelectorAll('.form-page').forEach((page) => page.style.display = 'none');
            document.getElementById(`page${page}`).style.display = 'block';
        }

        function nextPage() {
            currentPage++;
            showPage(currentPage);
        }

        function prevPage() {
            currentPage--;
            showPage(currentPage);
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('photoPreview');
                output.src = reader.result;
                output.classList.remove('hidden'); // Mostrar la imagen de vista previa
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        document.addEventListener('DOMContentLoaded', () => showPage(currentPage));
    </script>
</x-app-layout>