<!DOCTYPE html>
<html>
<head>
    <title>New Blog Submission</title>
</head>
<body>
    <h2>You have received a new blog submission!</h2>
    <p><strong>From:</strong> {{ $data['email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <hr>
    <div>
        <p><strong>Content:</strong></p>
        <p>{!! nl2br(e($data['content'])) !!}</p>
    </div>
</body>
</html>