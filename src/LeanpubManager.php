<?php

namespace Unicodeveloper\Leanpub;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Unicodeveloper\Leanpub\Exceptions\SlugDoesNotExist;
use Unicodeveloper\Leanpub\Exceptions\BookDoesNotExist;

class LeanpubManager
{
    /**
     * Leanpub Api Key
     * @var string
     */
    public $apiKey;

    /**
     *  Instance of Guzzle Client
     * @var object
     */
    public $client;

    /**
     * Response from the Leanpub API Service
     * @var object
     */
    public $response;

    /**
     * Leanpub base Url
     * @var string
     */
    protected $baseUrl = 'https://leanpub.com';

    /**
     * Set the Api Key and Request Options to make a request here in the constructor
     */
    public function __construct()
    {
        $this->setApiKey();
        $this->setRequestOptions();
    }

    /**
     * Get apiKey from Config file
     * @return void
     */
    public function setApikey()
    {
        $this->apiKey = Config::get('leanpub.API_KEY');
    }

    /**
     * Set options for making the Client request
     * @return  void
     */
    private function setRequestOptions()
    {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    /**
     * Make the client request and get the response
     * @param string $relativeUrl
     * @return  void
     */
    public function setResponse($relativeUrl)
    {
        $this->response = $this->client->get($this->baseUrl . $relativeUrl . "?api_key={$this->apiKey}", []);
    }

    /**
     * Get my book
     * @param  string $slug
     * @return object
     */
    public function getBook($slug)
    {
        if(empty($slug))
        {
            throw new SlugDoesNotExist('No slug was found. Please enter the book slug');
        }

        $this->setResponse("/{$slug}.json");

        return $this->data();
    }

    public function getSalesInfo($slug)
    {
        if(empty($slug))
        {
            throw new SlugDoesNotExist('No slug was found. Please enter the book slug');
        }

        $this->setResponse("/{$slug}/sales.json");

        return $this->data();
    }

    /**
     * Get the details of the required request
     * @return object
     */
    private function data()
    {
        $result = json_decode($this->response->getBody());

        $mediatorResult = (isset($result->minimum_price)) ? $result->minimum_price : 'absent';

        if($mediatorResult == 'absent')
        {
            return $result;
        }

        $result->isFree = number_format($mediatorResult, 2) == 0.0;

        return $result;
    }
}