<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ ("Welcome to the Teacher Dashboard") }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <!-- Dropdown برای انتخاب درس -->
                <div class="mb-4">
                    <label for="course" class="block text-sm font-medium text-gray-700">انتخاب درس:</label>
                    <select id="course"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        @php
                            $courses = ['صدا در چند رسانه ای', 'کاربرد های وب', 'گرافیک متحرک', 'تجزیه تحلیل', 'هوش مصنوعی', 'تصویر برداری'];
                        @endphp
                        @foreach($courses as $course)
                            <option>{{ $course }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- جدول ورود نمرات دانشجویان -->
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نام دانشجو</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نمره</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ثبت نمره</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $students = ['علی حسینی', 'سارا محمدی', 'مریم نوری', 'احمد کریمی', 'زهرا رضایی'];
                        @endphp
                        @foreach($students as $student)
                            <tr class="bg-white divide-y divide-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap text-right">{{ $student }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <!-- فیلد ورودی نمره -->
                                    <input type="text" class="border border-gray-300 rounded-md px-2 py-1"
                                        placeholder="نمره را وارد کنید">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <!-- دکمه ثبت نمره -->
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="submitGrade()">ثبت نمره</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script>
        function submitGrade() {
            alert('نمره با موفقیت ثبت شد');
        }
    </script>
</x-app-layout>


