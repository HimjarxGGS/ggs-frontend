<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission - Green Generation</title>
</head>

<body>
    <h2>📧 New Contact Form Submission</h2>

    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
        <p><strong>👤 Name:</strong> {{ $name }}</p>
        <p><strong>📧 Email:</strong> {{ $email }}</p>
        <p><strong>💬 Message:</strong></p>
        <div style="background: white; padding: 15px; border-radius: 5px; border-left: 4px solid #10B981;">
            {{ $userMessage }}
        </div>
    </div>

    <br>
    <p><em>Sent from Green Generation Surabaya website</em></p>
    <p><em>Time: {{ now()->format('F j, Y \a\t g:i A') }}</em></p>
</body>

</html>
