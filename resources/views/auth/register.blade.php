<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome*')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email*')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-label for="birthday" :value="__('Data de nascimento*')" />

                <div class="form-group row">
                    <div class="col-10">
                        <input class="form-control" type="date" id="birthday" name="birthday":value="old('birthday')" required>
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
                <x-label for="deaf" :value="__('Você é surdo?*')" />

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

                <x-input id="institution" class="block mt-1 w-full" type="text" name="institution" :value="old('institution')"/>
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

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha*')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar senha*')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
