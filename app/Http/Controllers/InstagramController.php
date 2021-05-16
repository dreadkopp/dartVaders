<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use const ud83c\udfaf\ud83d\udcaf\n\nWie;

/**
 * @Middleware ("web")
 * Class InstagramController
 * @package App\Http\Controllers
 */
class InstagramController extends Controller
{

    /**
     * @GET("/galery", as="instagram.feed")
     *
     * @param Client $client
     * @throws GuzzleException
     */
    public function feed(Client $client)
    {

        $images = Cache::get('C_INSTAFEED');
        if (!$images) {
            $url = 'https://www.instagram.com/dart_vaders_2017/?__a=1';
            $data = $client->get($url)->getBody()->getContents();
            $feed = json_decode($data);
            if (!$feed) {
                $feed = json_decode($this->getFallback());
            }
            $images = collect($feed->graphql->user->edge_owner_to_timeline_media->edges)
                ->reject(fn($i) => $i->node->is_video)
                ->map(fn($i) => $i->node)
                ->each(function($i) {
                    $i->b64_img = 'data:image/jpg;base64,'.base64_encode(file_get_contents($i->display_url));
                });
            Cache::put('C_INSTAFEED', $images, 1800);
        }

        return view('layouts.galery')->with('images',$images);
    }

    private function getFallback()
    {
        return file_get_contents(base_path('storage/app/fallback/insta_response.json'));
    }

}
