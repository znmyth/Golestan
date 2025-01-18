<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" rtl>
                    {{ ("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 flex justify-end">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full max-w-4xl">
            <!-- Dropdown برای انتخاب درس -->
            <div class="mb-4 p-6 text-gray-900 flex justify-end">

                <select id="course"
                    class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    @php
                        $courses = ['صدا در چند رسانه ای', 'کاربرد های وب', 'گرافیک متحرک', 'تجزیه تحلیل', 'هوش مصنوعی', 'تصویر برداری'];
                    @endphp
                    @foreach($courses as $course)
                        <option>{{ $course }}</option>
                    @endforeach
                </select>
                <label for="course" class="block text-sm font-medium text-gray-700 text-right px-3 pt-3">:انتخاب
                    درس</label>
            </div>
            <div class="p-6 text-gray-900 flex justify-end">


                <!-- جدول ورود نمرات دانشجویان -->
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>

                            <th
                                class="px-2 py-1 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ثبت نمره</th>

                            <th
                                class="px-2 py-1 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نمره</th>

                            <th
                                class="px-2 py-1 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نام دانشجو</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $students = ['علی حسینی', 'سارا محمدی', 'مریم نوری', 'احمد کریمی', 'زهرا رضایی'];
                        @endphp
                        @foreach($students as $student)
                            <tr class="bg-white divide-y divide-gray-200">


                                <td class="px-2 py-1 whitespace-nowrap text-right">
                                    <button
                                        class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-gray-800 py-2 px-4 rounded-full shadow-lg transform hover:scale-105 transition-transform duration-200 text-sm"
                                        onclick="submitGrade()">ثبت </button>
                                <td class="px-2 py-1 whitespace-nowrap text-right">
                                    <input type="number"
                                        class="border border-gray-300 rounded-md px-2 py-1 w-full max-w-[100px] rtl text-right"
                                        placeholder="نمره را وارد کنید">
                                </td>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap text-right">{{ $student }}</td>
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