<?php
namespace FabianCernota\TwitterHelper\Eel;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Configuration\ConfigurationManager;

/**
 * Eel helper as a wrapper around Twitter API
 */
class TwitterHelper implements ProtectedContextAwareInterface {
	/**
	* @Flow\InjectConfiguration(package="FabianCernota.TwitterHelper")
	* @var array
	*/
	protected $settings = array();



	/**
	 * @param string $requestType
	 * @param string $get
	 * @return array
	 */
	public function getRequest(string $requestType, string $get) {

		$settings = array(
			'oauth_access_token' => $this->settings['oauthAccessToken'],
			'oauth_access_token_secret' => $this->settings['oauthAccessTokenSecret'],
			'consumer_key' => $this->settings['consumerKey'],
			'consumer_secret' => $this->settings['consumerSecret']
		);


		$twitter = new \TwitterAPIExchange($settings);
		$response = $twitter->setGetfield('?' . $get)
			->buildOauth('https://api.twitter.com/1.1/' . $requestType . '.json', 'GET')
			->performRequest();


		return json_decode($response);
	}

	/**
	 * All methods are considered safe
	 *
	 * @param string $methodName
	 * @return boolean
	 */
	public function allowsCallOfMethod($methodName) {
		return true;
	}
}
