<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tweet App</title>
</head>
<body>
  <h1>Tweet App</h1>
  
  @auth
      
    <div>
      <h3>投稿フォーム</h3>

      @if (session('feedback.success'))
          <p style="color:gold;">{{ session('feedback.success') }}</p>
      @endif

      <form action="{{ route('tweet.create') }}" method="post">
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140文字以内</span>
        <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力"></textarea>
        @error('tweet')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <button type="submit">投稿</button>
      </form>
    </div>

  @endauth

  <div>
    @foreach ($tweets as $tweet) 
      <details>
        <summary>{{ $tweet->content }}</summary>
        <div>
          <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">Edit</a>
          <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit">削除</button>
          </form>
        </div>
      </details>
    @endforeach
  </div>
</body>
</html>