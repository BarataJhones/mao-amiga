<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            <div class="text-center"
                style="font-family: 'Montserrat Alternates', sans-serif;
                    font-size: 1em;
                    font-weight: bold;
                    font-style: italic;
                    color: #00AEEF">
                Editar <br> dados
            </div>

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-label for="birthday" :value="__('Data de nascimento')" />

                <div class="form-group row">
                    <div class="col-10">
                        <input class="form-control" type="date" id="birthday" name="birthday" value="{{ $user->birthday }}" required>
                    </div>
                </div>
            </div>
                
            <!-- Gender -->
            <div class="mt-4">
                <x-label for="gender" :value="__('Gênero')" />

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Masculino">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Feminino">
                        Feminino
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Não-binário">
                        Não-binário
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Outro">
                        Outro
                    </label>
                </div>
            </div>
            
            <!-- Deaf -->
            <div class="mt-4">
                <x-label for="deaf" :value="__('Você é surdo?')" />

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="deaf" id="deaf" value="Sim" required>
                        Sim
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="deaf" id="deaf" value="Não" required>
                        Não
                    </label>
                </div>
            </div>

            <!-- Institution -->
            <div class="mt-4">
                <x-label for="institution" :value="__('Você estuda em alguma instituição? Se sim, qual o nome?')" />

                <x-input id="institution" class="block mt-1 w-full" type="text" name="institution" value="{{ $user->institution }}"/>
            </div>

            <!-- Grade -->
            <div class="mt-4">
                <x-label for="grade" :value="__('Qual área de ensino você está atualmente?')" />
            
                <select name="grade" class="form-select" aria-label="Default select example" id="grade">
                    <option value="Infantil">Infantil</option>
                    <option value="Fundamental">Fundamental</option>
                    <option value="Médio">Médio</option>
                    <option value="Superior">Superior</option>
                    <option selected value="Livre">Livre</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" style="background-color: #00AEEF">
                    {{ __('Atualizar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
