<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no maximum-scale=1.0 minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweeter</title>
</head>
<body>
    <h1>Tweeter</h1>
    <div>
        <p>投稿フォーム</p>
        <form action="{{ route('tweet.create')}}" method="post">
            @csrf
            <label for="tweet-content">Tweet</label>
            <span>140字以内</span>
            <textarea name="tweet" id="tweet-content" type="text" placeholder="Tweetを入力"></textarea>
            @error('tweet')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">投稿</button>
        </form>
    </div>
    <div>
    @foreach ($tweets as $tweet)
        <p>{{ $tweet->content }}</p>
    @endforeach
    </div>
</body>
</html>