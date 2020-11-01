<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FeedsController extends Controller
{
    public function index() {
        $articles = Cache::has('nyt-feed') ? json_decode(Cache::get('nyt-feed'), true) : [];

        return view('welcome', ['articles' => $articles]);
    }

    public static function getImgSrcSet($multimedia) {
        $res = '';
        if (is_array($multimedia)) {
            foreach ($multimedia as $media) {
                if ($media['type'] == 'image') {
                    $res .= $res !== '' ? ';' : '';
                    $res .= $media['url'] . '?quality=100&auto=webp ' . $media['width'] . 'w';
                }
            }
        }

        return $res;
    }

    public static function getProperThumbnail($article) {
        $filtered = [];
        if (is_array($article['multimedia'])) {
            $filtered = array_filter($article['multimedia'], function ($media) {
                return $media['format'] == 'Normal' && $media['type'] == 'image';
            });
        }


        if (sizeof($filtered) > 0) {
            $elem = array_shift($filtered)['url'];
            return $elem;
        } else {
            return array_key_exists('thumbnail_standard', $article) ?
                $article['thumbnail_standard'] : null;
        }
    }
}
