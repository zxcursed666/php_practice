<x-app-layout>

    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6 text-center">
            Cyber Security Quiz
        </h1>

        <form method="POST" action="/quiz" id="quizForm">

            @csrf

            @foreach($questions as $question)

                <div class="mb-6 p-6 bg-white border border-gray-300 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300">

                    <h2 class="text-xl font-semibold mb-4">
                        {{ $question->question }}
                    </h2>

                    <div class="mb-3">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="a"
                        >

                        {{ $question->option_a }}

                    </div>

                    <div class="mb-3">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="b"
                        >

                        {{ $question->option_b }}

                    </div>

                    <div class="mb-3">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="c"
                        >

                        {{ $question->option_c }}

                    </div>

                </div>

            @endforeach

            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    Submit
            </button>

        </form>

    </div>

    <script>
        document.getElementById('quizForm').addEventListener('submit', function(event) {
            const totalQuestions = 10;

            let answered = 0;

            for(let i = 1; i <= totalQuestions; i++) {
                const checked = document.querySelector('input[name="question_' + i + '"]:checked');

                if(checked) {
                    answered++;
                }
            }

            if(answered < totalQuestions) {
                event.preventDefault();

                alert('Дайте відповіді на всі запитання');

            }
        });

    </script>
</x-app-layout>