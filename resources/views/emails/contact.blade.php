<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact</title>
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
    </style>
</head>
<body>
    <div class="header">
        <h1>Nouveau message de contact</h1>
    </div>

    <div class="content">
        <p>Un nouveau message a été envoyé depuis le formulaire de contact du site web du Centre Hospitalier Nganda.</p>

        <div class="field">
            <p class="label">Nom:</p>
            <p>{{ $contact->name }}</p>
        </div>

        <div class="field">
            <p class="label">Email:</p>
            <p>{{ $contact->email }}</p>
        </div>

        <div class="field">
            <p class="label">Message:</p>
            <p>{{ $contact->message }}</p>
        </div>

        <div class="field">
            <p class="label">Date d'envoi:</p>
            <p>{{ $contact->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="field">
            <p class="label">Adresse IP:</p>
            <p>{{ $contact->ip_address }}</p>
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
