<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle demande de stage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #1c338c;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #1c338c;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        .attachments {
            margin-top: 20px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Nouvelle demande de stage</h1>
    </div>

    <div class="content">
        <p>Une nouvelle demande de stage a été soumise via le site web du Centre Hospitalier Nganda.</p>

        <div class="field">
            <p class="label">Nom complet:</p>
            <p>{{ $internship->name }}</p>
        </div>

        <div class="field">
            <p class="label">Email:</p>
            <p>{{ $internship->email }}</p>
        </div>

        <div class="field">
            <p class="label">Téléphone:</p>
            <p>{{ $internship->phone ?? 'Non renseigné' }}</p>
        </div>

        <div class="field">
            <p class="label">Formation:</p>
            <p>{{ $internship->education }}</p>
        </div>

        <div class="field">
            <p class="label">Domaine souhaité:</p>
            <p>{{ $internship->field }}</p>
        </div>

        <div class="field">
            <p class="label">Période de stage:</p>
            <p>Du {{ $internship->start_date->format('d/m/Y') }} au {{ $internship->end_date->format('d/m/Y') }}</p>
        </div>

        <div class="field">
            <p class="label">Message:</p>
            <p>{{ $internship->message ?? 'Aucun message' }}</p>
        </div>

        <div class="field">
            <p class="label">Date de soumission:</p>
            <p>{{ $internship->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="attachments">
            <p class="label">Pièces jointes:</p>
            <ul>
                @if($internship->cv_path)
                    <li>CV (voir pièce jointe)</li>
                @else
                    <li>Aucun CV fourni</li>
                @endif

                @if($internship->motivation_letter_path)
                    <li>Lettre de motivation (voir pièce jointe)</li>
                @else
                    <li>Aucune lettre de motivation fournie</li>
                @endif
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>Ce message a été envoyé automatiquement depuis le site web du Centre Hospitalier Nganda.</p>
        <p>Pour toute question, veuillez contacter la réception au +243 897 000 133 ou par email à reception@centrehospitaliernganda.com</p>
        <p>© {{ date('Y') }} Centre Hospitalier Nganda - Tous droits réservés</p>
        <p>N°3816, av haute Tension/Nganda, C/Kintambo, Kinshasa, RDC</p>
    </div>
</body>
</html>
