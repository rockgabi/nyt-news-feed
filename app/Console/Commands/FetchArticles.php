<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class FetchArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch articles using Times Newswire API';

    protected $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.nytimes.com?api-key=YlUAhF41RhaZa6NWe44nDwoXs7fXUc1p',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiKey = config()->get('app.nyt_api_key');
        $perPage = 20;
        $offset = 0;
        $res = [];

        while ($offset < 81) {
            $response = $this->client->request('GET', '/svc/news/v3/content/all/all.json', [
                'query' => ['api-key' => $apiKey, 'offset' => $offset]
            ]);
            $body = $response->getBody();

            if ($body) {
                $parsed = json_decode($body, true);
                $res = array_merge($res, $parsed['results']);

            } else {
                $this->info('error');
            }
            $offset += $perPage;
        }

        if (sizeof($res) > 0) {
            Cache::put('nyt-feed', json_encode($res), 6000);
        }

    }
}
