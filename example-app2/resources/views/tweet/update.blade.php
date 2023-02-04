<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no, maximum-scale=1.0, minimum-scale=1.0 ">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tweet App</title>
</head>
<body>
  <h1>Tweetの編集</h1>
  <div>
    <a href="{{ route('tweet.index') }}">🔙 戻る</a>
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
      <p style="color: coral;">{{ session('feedback.success') }}</p>
    @endif
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id])}}" method="post">
      @method('PUT')
      @csrf
      <label for="tweet-content">Tweet</label>
      <span>140字以内</span>
      <textarea name="tweet" id="tweet-content" type="text" placeholder="Edit Tweet">{{ $tweet->content }}</textarea>
      @error('tweet')
        <p style="color:red;">{{ $message }}</p>
      @enderror
      <button type="submit">編集</button>
    </form>
  </div>
</body>
</html>