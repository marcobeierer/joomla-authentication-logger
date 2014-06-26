<?php
defined('_JEXEC') or die();

class PlgSystemAuthenticationlogger extends JPlugin {

	private function log(JLogEntry $logEntry) {

		$date = JFactory::getDate()->format('Y-m-d');

		JLog::addLogger(
			array(
				'text_file' => sprintf('authentication.%s.php', $date),
				'text_entry_format' => '{TIME} | {PRIORITY} | {EVENT} | {USERNAME} | {MESSAGE} | {CLIENTIP}'
			),
			JLog::ALL,
			array('authentication')
		);

		JLog::add($logEntry);
	}

	public function onUserAfterLogin($options) { // JAuthenticationResponse array

		$logEntry = new JLogEntry('Successfull login.', JLog::INFO, 'authentication');
		$logEntry->event = 'Login';
		$logEntry->username = $options['user']->username;

		$this->log($logEntry);
	}

	public function onUserLoginFailure($response) { // JAuthenticationResponse array

		$logEntry = new JLogEntry($response['error_message'], JLog::WARNING, 'authentication');
		$logEntry->event = 'Login';
		$logEntry->username = $response['username'];

		$this->log($logEntry);
	}

	public function onUserAfterLogout($options) {

		$logEntry = new JLogEntry('Successfull logout.', JLog::INFO, 'authentication');
		$logEntry->event = 'Logout';
		$logEntry->username = $options['username'];

		$this->log($logEntry);
	}

	public function onUserLogoutFailure($parameters) {

		$logEntry = new JLogEntry('Erroneous logout.', JLog::WARNING, 'authentication');
		$logEntry->event = 'Logout';
		$logEntry->username = $parameters['username'];

		$this->log($logEntry);
	}

}
