<?php

namespace Rrrz\YShoppingClient;

use YConnect\Credential\ClientCredential;
use YConnect\YConnectClient;

class Client {
	protected $configuration;
    protected $accessToken;
    protected $refreshToken;
    protected $client;

    public function __construct(Configuration $configuration) {
		$this->configuration = $configuration;

        $cred = new ClientCredential($this->configuration->getAppId(), $this->configuration->getSecret());
        $this->client = new YConnectClient($cred);
	}

	public function runOperation(Operation $operation) {
		$operation->setAppId($this->configuration->getAppId());
		$method = $operation->getMethod();
		$url = $operation->getUrl();

        $retry = 1;
        while ($retry >= 0) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            ));
            if ($operation->needsAuth()) {
                $header = [
                    "Authorization:Bearer " . $this->accessToken
                ];
                curl_setopt_array($curl, array(
                    CURLOPT_HTTPHEADER => $header
                ));
            }
            if ($method === Operation::METHOD_POST) {
                curl_setopt_array($curl, array(
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $operation->getParams()
                ));
            }
            $result = curl_exec($curl);
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if ($statusCode === 401) {
                $xml = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($this->invalidToken($xml)) {
                    $this->refreshAccessToken();
                }
            }

            $retry--;
        }

        return $result;
	}

    public function getAccessToken() {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken) {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getRefreshToken() {
        return $this->refreshToken;
    }

    public function setRefreshToken($refreshToken) {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    private function invalidToken($xml) {
        if (property_exists($xml, "Message") && preg_match("/invalid_token/", (string) $xml->Message)) {
            return true;
        } else {
            return false;
        }
    }

    private function refreshAccessToken() {
        $this->client->refreshAccessToken($this->refreshToken);
        $this->accessToken = $this->client->getAccessToken();
    }
}
