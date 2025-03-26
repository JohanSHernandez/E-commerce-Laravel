<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Comment Notification</title>
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
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .comment-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Comment on Your Article</h1>
    </div>
    <div class="content">
        <p>Hello,</p>
        
        <p>You have received a new comment on your article <strong>"{{ $article->title }}"</strong>.</p>
        
        <div class="comment-info">
            <p><strong>From:</strong> {{ $comment->username }} ({{ $comment->email }})</p>
            <p><strong>Date:</strong> {{ $comment->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Comment:</strong></p>
            <p>{{ $comment->content }}</p>
        </div>
        
        <p>You can view all comments on your article by clicking the button below:</p>
        
        <a href="{{ route('articles.show', $article) }}" class="button">View Article</a>
    </div>
</body>
</html>