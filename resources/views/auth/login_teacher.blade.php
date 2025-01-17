<x-guest-layout>
    <form method="POST" action="{{ route('login.teacher') }}">
        @csrf

        <!-- National ID -->
        <div class="mt-4">
            <x-input-label for="national_id" :value="__('کد ملی')" />
            <x-text-input id="national_id" class="block mt-1 w-full" type="text" name="national_id"
                          :value="old('national_id')" required autofocus autocomplete="off" placeholder="کد ملی" maxlength="10" pattern="\d{10}" />
            <x-input-error :messages="$errors->get('national_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('رمز عبور')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ ('مرا به خاطر بسپار') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ ('رمز عبور خود را فراموش کرده‌اید؟') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                <a href="{{ route('register', ['type' => 'teacher']) }}">

                    ثبت نام
                </a>
 
            </x-primary-button>
            <x-primary-button class="ms-3">
                {{ __('ورود') }}
            </x-primary-button>
        </div>
        </div>
    </form>
</x-guest-layout>

