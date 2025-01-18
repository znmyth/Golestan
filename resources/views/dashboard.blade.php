<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("messages.dashboard_message") }}
                </div>
            </div>
        </div>
    </div>

    <!-- جدول دروس و نمرات -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-end">
            <div class="p-6 text-gray-900">
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                اعتراض</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نمره</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                درس</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $courses = ['صدا در چند رسانه ای', 'کاربرد های وب', 'گرافیک متحرک', 'تجزیه تحلیل', 'هوش مصنوعی', 'تصویر برداری'];
                            $grades = [18, 15, 16, 19, 12, 17];
                        @endphp
                        @foreach($courses as $index => $course)
                            <tr class="bg-white divide-y divide-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <button class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-gray-800 py-2 px-4 rounded-full shadow-lg transform hover:scale-105 transition-transform duration-200 text-sm"
                                        onclick="openObjectionModal('{{ $course }}')">ثبت اعتراض</button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <input type="text" value="{{ $grades[$index] }}" readonly
                                        class="border-none bg-transparent rounded-full text-gray-500 text-right">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">{{ $course }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- پاپ‌آپ اعتراض -->
    <div id="objectionModal" class="fixed z-10 inset-0 overflow-y-auto hidden flex justify-center items-center">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg w-full p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">ثبت اعتراض</h3>
            <textarea id="objection_text" rows="4" class="form-input mt-2 block w-full"
                placeholder="اعتراض خود را وارد کنید..."></textarea>
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="submitObjection()"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-semibold text-green hover:bg-green-600 focus:outline-none sm:w-auto sm:text-sm">ثبت</button>
                <button onclick="closeObjectionModal()"
                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:w-auto sm:text-sm">لغو</button>
            </div>
        </div>
    </div>
    <script>
        function openObjectionModal(course) {
            document.getElementById("objectionModal").classList.remove("hidden");
            document.getElementById("modal-title").innerText = ` ثبت اعتراض برای ${course}`;
        }

        function closeObjectionModal() {
            document.getElementById("objectionModal").classList.add("hidden");
        }

        function submitObjection() {
            closeObjectionModal();
            alert("اعتراض شما با موفقیت ثبت شد");
        }
    </script>
</x-app-layout>