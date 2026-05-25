<x-app-layout>

    <div class="max-w-5xl mx-auto mt-10">

        <div class="bg-white border border-gray-200 rounded-3xl shadow-xl overflow-hidden">

            <div class="p-6 border-b border-gray-200">

                <h1 class="text-4xl font-bold text-center text-gray-800">
                    Quiz Results
                </h1>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-700">

                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs tracking-wider">

                        <tr>

                            <th class="px-6 py-4">
                                User
                            </th>

                            <th class="px-6 py-4">
                                Score
                            </th>

                            <th class="px-6 py-4">
                                Date
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($results as $result)

                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-200">

                            <td class="px-6 py-4 font-semibold">
                                {{ $result->user->name }}
                            </td>

                            <td class="px-6 py-4">

                                <span class="bg-blue-100 text-black-700 px-3 py-1 rounded-full text-xs font-bold">

                                    {{ $result->score }}

                                </span>

                            </td>

                            <td class="px-6 py-4 text-gray-500">

                                {{ $result->created_at->format('d.m.Y H:i') }}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>