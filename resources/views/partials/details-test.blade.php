@extends('voyager::master')

@section('content')

@php
use App\Constants\English;
@endphp

<div id="edit-test-form">
    <h3>{{ English::Update_text }} {{ $banks->planification->name }}</h3>
    <input type="hidden" id="bank-id" value="{{ $banks->id }}">
    <div id="edit-questions-container">
        <!-- Aquí se cargarán las preguntas desde el JSON -->
    </div>
    <button type="button" class="btn btn-warning" onclick="addQuestion()">{{ English::Add_text }}</button>
    <button type="button" class="btn btn-info" onclick="saveChanges()">{{ English::Save_text }}</button>
    <pre style="display: none" id="json-output"></pre> <!-- Para mostrar el JSON generado -->
    <div id="error-message" style="color: red;"></div> <!-- Para mostrar el mensaje de error -->
</div>

<!-- Plantilla para las preguntas -->
<script type="text/template" id="question-template">
    <div class="question-block mb-4">
        <div class="form-group">
            <label for="question-title">{{ English::Questions_text }}</label>
            <input type="text" class="form-control question-title" placeholder="{{ English::Enter_question_title }}">
        </div>
        <div class="form-group">
            <label>{{ English::Answer_text }}</label>
            <div class="answers-container">
            </div>
            <button type="button" class="btn btn-primary" onclick="addAnswer(this)">{{ English::Add_text }} {{ English::Answer_text }}</button>
        </div>

        <button type="button" class="btn btn-danger" onclick="removeQuestion(this)">{{ English::Delete_text }} {{ English::Questions_text }}</button>

        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 100%"></div>
        </div>

    </div>
</script>

<script src="{{ asset('js/edit-test.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var questionsJson = @json($questionsJson);
        loadQuestions(questionsJson);
    });
</script>


@endsection
