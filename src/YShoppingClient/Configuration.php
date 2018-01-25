<?php

namespace Rrrz\YShoppingClient;

class Configuration {
	protected $appId;
    protected $secret;

	function setAppId($appId) {
		$this->appId = $appId;
		return $this;
	}

	function getAppId() {
		return $this->appId;
	}

    function setSecret($secret) {
        $this->secret = $secret;
        return $this;
    }

    function getSecret() {
        return $this->secret;
    }
}
