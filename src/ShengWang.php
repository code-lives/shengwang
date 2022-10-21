<?php

namespace ShengWangSdk;

class ShengWang
{
	const ROLE_PUBLISHER = 1;
	const ROLE_SUBSCRIBER = 2;
	private $appId;
	private $appCertificate;
	public static function init($config)
	{
		if (empty($config['appId'])) {
			throw new \Exception('not empty appId');
		}
		if (empty($config['appCertificate'])) {
			throw new \Exception('not empty appCertificate');
		}
		$class = new self();
		$class->appId = $config['appId'];
		$class->appCertificate = $config['appCertificate'];
		return $class;
	}

	public function getToken($channelName, $account, $role, $tokenExpire, $privilegeExpire = 0)
	{
		$token = new AccessToken2($this->appId, $this->appCertificate, $tokenExpire);
		$serviceRtc = new ServiceRtc($channelName, $account);

		$serviceRtc->addPrivilege($serviceRtc::PRIVILEGE_JOIN_CHANNEL, $privilegeExpire);
		if ($role == self::ROLE_PUBLISHER) {
			$serviceRtc->addPrivilege($serviceRtc::PRIVILEGE_PUBLISH_AUDIO_STREAM, $privilegeExpire);
			$serviceRtc->addPrivilege($serviceRtc::PRIVILEGE_PUBLISH_VIDEO_STREAM, $privilegeExpire);
			$serviceRtc->addPrivilege($serviceRtc::PRIVILEGE_PUBLISH_DATA_STREAM, $privilegeExpire);
		}
		$token->addService($serviceRtc);
		return $token->build();
	}
}
