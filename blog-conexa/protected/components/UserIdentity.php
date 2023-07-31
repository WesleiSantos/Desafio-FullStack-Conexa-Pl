<?php

use Yii;

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		try {
			$users = Yii::app()->apiService->getAllUsersData();
        } catch (\Exception $e) {
			Yii::log($e->getMessage(), 'error', 'application');
            echo 'Ocorreu um erro: ' . $e->getMessage();
        }
		$user = $this->getUserByUsername($users, $this->username);
		if (!isset($user))
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		elseif ($user->password !== $this->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode = self::ERROR_NONE;
		return !$this->errorCode;
	}

	private function getUserByUsername(Array $users, string $username) {
		foreach ($users as $user) {
			if (isset($user->username) && $user->username === $username) {
				return $user;
			}
		}
		return null;
	}
}
