@component('mail::message')

# 昨日は{{ $count }}件のTweetが追加されました!

{{ $toUser->name }}さんこんにちは!

昨日は{{ $count }}件のTweetが追加されましたよ!最新のTweetを見にいきましょう。

@component('mail::button', ['url' => route('tweet.index')])
    Tweetを見にいく
@endcomponent

@endcomponent