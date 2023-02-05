<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TweetService;
//!①viewヘルパー関数のみを使う場合はview()とする
//use Illuminate\Support\Facades\View; //!②Facadeを用いて呼び出す場合はView::makeとする
//use Illuminate\View\Factory; //!③Factoryをインジェクションして呼び出す場合は$factory->makeとする

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $TweetService = new TweetService();
        $tweets = $TweetService->getTweets();
        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}