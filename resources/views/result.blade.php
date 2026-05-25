<x-app-layout>

    <div class="max-w-2xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6 text-center">
            Quiz Result
        </h1>

        <div class="text-3xl">
            Your score: <p class="font-semibold text-heading underline decoration-brand decoration-double">{{ $score }}<p> 
        </div>

    </div>

    <div class="flex justify-center mt-6">

    <a
        href="{{ url('/quiz') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
    >
        Next try →
    </a>

   </div>

</x-app-layout>