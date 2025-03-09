<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Type de Compétence</title>
</head>
<body>
    <h1>Créer un Nouveau Type de Compétence</h1>

    <form action="{{ route('competence_types.store') }}" method="POST">
        @csrf

        <label for="competence">Compétence</label>
        <input type="text" name="competence" id="competence" required>

        <label for="type_competence">Type de Compétence</label>
        <select name="type_competence" id="type_competence" required>
            @foreach($competences as $competence)
                <option value="{{ $competence->id }}">{{ $competence->name }}</option>
            @endforeach
        </select>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
