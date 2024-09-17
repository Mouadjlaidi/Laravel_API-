<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des Contacts</h2>
    <ul>
        @foreach ($contacts as $contact)
            <li>
                {{ $contact->nom }} - {{ $contact->telephone }} - {{ $contact->email }}
            </li>
        @endforeach
    </ul>
</body>
</html>
