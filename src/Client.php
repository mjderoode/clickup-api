<?php

namespace Mjderoode\ClickupApi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Client
{
    protected string $api_key = '';

    protected string $base_url = '';

    protected string $extended_base = '';

    public $connector = null;

    public function __construct()
    {
        $this->api_key = config('clickup-api.api_key');

        $this->base_url = config('clickup-api.base_url').$this->extended_base;

        $this->connector = $this->createConnector();
    }

    protected function createConnector(): PendingRequest
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $this->api_key,
        ])
            ->baseUrl($this->base_url)
            ->asJson();
    }

    protected function getData(string $endpoint, array $query_parameters = []): Response
    {
        $response = $this->connector->get($endpoint, $query_parameters);

        if (! $response->successful()) {
            throw new \Exception('Response unsuccessful.');
        }

        return $response;
    }

    protected function postData(string $endpoint, array $data = []): Response
    {
        $response = $this->connector->post($endpoint, $data);

        if (! $response->successful()) {
            throw new \Exception('Response unsuccessful.');
        }

        return $response;
    }

    protected function putData(string $endpoint, array $data = []): Response
    {
        $response = $this->connector->put($endpoint, $data);

        if (! $response->successful()) {
            throw new \Exception('Response unsuccessful.');
        }

        return $response;
    }

    protected function deleteData(string $endpoint): Response
    {
        $response = $this->connector->delete($endpoint);

        if (! $response->successful()) {
            throw new \Exception('Response unsuccessful.');
        }

        return $response;
    }

    // keep on experimenting, mitsol, keep on experimenting....
    // public function getTeams(): Collection
    // {
    //     $response = $this->getData(endpoint: 'team');
    //     $teams = collect();

    //     foreach (collect($response->json())->get('teams') as $team) {
    //         $teamObj = new Team([
    //             'api_id' => $team['id'],
    //             'name' => $team['name'],
    //             'color' => $team['color'],
    //             'avatar' => $team['avatar'],
    //             'members' => $team['members'],
    //         ]);

    //         $teams->push($teamObj);
    //     }

    //     return $teams;
    // }
}
