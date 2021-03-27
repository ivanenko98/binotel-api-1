<?php

namespace Sashalenz\Binotel;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Sashalenz\Binotel\Exceptions\BinotelException;

final class Request
{
    private const TIMEOUT = 3;
    private const RETRY_TIMES = 3;
    private const RETRY_SLEEP = 100;

    private string $key;
    private string $secret;
    private string $version = '4.0';
    private string $format = 'json';
    private string $url = 'https://api.binotel.com/api/';
    private string $method;
    private Collection $params;

    public function __construct(string $method, Collection $params)
    {
        $this->method = $method;
        $this->params = $params;

        $this->key = Config::get('binotel-api.key');
        $this->secret = Config::get('binotel-api.secret');
        $this->version ??= Config::get('binotel-api.version');
        $this->url ??= Config::get('binotel-api.url');
    }

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function make(): Collection
    {
        $this->params->put('key', $this->key);
        $this->params->put('secret', $this->secret);
        $link = $this->url . $this->version .'/'. $this->method .'.'. $this->format;

        try {
            return Http::timeout(self::TIMEOUT)
                ->retry(
                    self::RETRY_TIMES,
                    self::RETRY_SLEEP
                )
                ->asJson()
                ->post(
                    $link,
                    $this->params->toArray()
                )
                ->throw()
                ->collect();
        } catch (RequestException $e) {
            throw new BinotelException($e);
        }
    }

    public function cache(int $seconds = -1) : Collection
    {
        if ($seconds === -1) {
            return Cache::rememberForever($this->getCacheKey(), fn () => $this->make());
        }

        return Cache::remember($this->getCacheKey(), $seconds, fn () => $this->make());
    }

    private function getCacheKey() : string
    {
        return $this->method.'_'.$this->params->values()->implode('_');
    }
}
