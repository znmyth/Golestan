<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('نام و نام خانوادگی')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Student ID -->
        <div class="mt-4">
            <x-input-label for="student_id" :value="__('شماره دانشجویی')" />
            <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id"
                :value="old('student_id')" required maxlength="20" placeholder="شماره دانشجویی" />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" placeholder="example@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Educational Level -->
        <div class="mt-4">
            <x-input-label for="educational_level" :value="__('مقطع تحصیلی')" />
            <select id="educational_level" name="educational_level" class="block mt-1 w-full" required style="border: 1px solid #d1d5db; padding: .5rem .75rem; border-radius: .375rem;">
                <option value="">انتخاب مقطع تحصیلی</option>
                <option value="bachelor">کارشناسی</option>
                <option value="master">کارشناسی ارشد</option>
                <option value="phd">دکترا</option>
            </select>
            <x-input-error :messages="$errors->get('educational_level')" class="mt-2" />
        </div>


        <!-- National ID -->
        <div class="mt-4">
            <x-input-label for="national_id" :value="__('کد ملی')" />
            <x-text-input id="national_id" class="block mt-1 w-full" type="text" name="national_id"
                :value="old('national_id')" required maxlength="10" pattern="\d{10}" placeholder="کد ملی" />
            <x-input-error :messages="$errors->get('national_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('رمز عبور')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تایید رمز عبور')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('قبلا ثبت نام کردی دانشجو؟') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('ثبت نام') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function validateNationalID(input) {
            const value = input.value;
            const length = value.length;

            if (length === 10) {
                const digits = value.split('').map(Number);
                const checksum = digits.pop();

                let sum = 0;
                for (let i = 0; i < 9; i++) {
                    sum += digits[i] * (10 - i);
                }

                const remainder = sum % 11;
                const calculatedChecksum = remainder < 2 ? remainder : 11 - remainder;

                if (checksum !== calculatedChecksum) {
                    input.setCustomValidity('کد ملی نامعتبر است');
                } else {
                    input.setCustomValidity('');
                }
            } else {
                input.setCustomValidity('');
            }
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            const studentIdInput = document.getElementById('student_id');

            studentIdInput.addEventListener('input', () => {
                if (studentIdInput.value.length > 20) {
                    studentIdInput.value = studentIdInput.value.slice(0, 20);
                }
            });
        });
    </script>
</x-guest-layout>