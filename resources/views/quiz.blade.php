<x-app-layout>

    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6 text-center">
            Cyber Security Quiz
        </h1>

        <form method="POST" action="/quiz" id="quizForm">
            @csrf

            @foreach($questions as $question)

            @php

            $correctCount = $question->answers
            ->where('is_correct', 1)
            ->count();

            $inputType = $correctCount > 1
            ? 'checkbox'
            : 'radio';

            $inputName = $correctCount > 1
            ? 'question_'.$question->id.'[]'
            : 'question_'.$question->id;

            @endphp

            <div
                data-question-block
                class="mb-3 p-6 bg-white border border-gray-300 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300">

                <h2 class = mb-4>
                    {{ $question->question }}
                </h2>

                @foreach($question->answers as $answer)

                <div class="mb-4">

                    <input
                        type="{{ $inputType }}"
                        name="{{ $inputName }}"
                        value="{{ $answer->id }}"
                        class="answer-checkbox"
                        data-limit="{{ $correctCount }}"
                        data-question="{{ $question->id }}">

                    {{ $answer->answer_text }}

                </div>

                @endforeach

            </div>

            @endforeach

            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-3 px-16 border border-gray-400 rounded shadow">
                Submit
            </button>

        </form>

    </div>

    <script>
        document.getElementById('quizForm').addEventListener('submit', function(event) {

            const questions = document.querySelectorAll('[data-question-block]');

            let answered = 0;

            questions.forEach(question => {

                const checked = question.querySelectorAll('input:checked');

                if (checked.length > 0) {
                    answered++;
                }

            });

            if (answered < questions.length) {

                event.preventDefault();

                alert('Дайте відповіді на всі запитання');

            }

        });
    </script>

    <script>
        document.querySelectorAll('.answer-checkbox').forEach(input => {

            input.addEventListener('change', function() {

                if (this.type !== 'checkbox') return;

                const questionId = this.dataset.question;

                const limit = parseInt(this.dataset.limit);

                const checked = document.querySelectorAll(
                    'input[data-question="' + questionId + '"]:checked'
                );

                if (checked.length > limit) {

                    this.checked = false;

                }

            });

        });
    </script>
</x-app-layout>