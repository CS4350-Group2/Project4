<?php
echo __FILE__.PHP_EOL;
	class Post
	{
		private $username;
		private $password;
		private $autherizedSelect;
		
		public function __construct($posting)
		{
			if(!isset($posting['username'])) {
				throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: there is no username');
			}
			
			if(!isset($posting['password'])) {
				throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: there is no password');
			}
			$this->username = $posting['username'];
			$this->password = $posting['password'];
			$this->authSelect = $posting['authSelect'];
			
			if ($posting['authSelect'] == 'FileBased') 
			{
				$this->authSelect = true;
			}
			else if ($posting['authSelect'] == 'InMemory')
			{
				$this->authSelect = false;
			}			
		}
		
		public function getUsername()
		{
			return $this->username;
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		public function getCredauthSelect()
		{
			return $this->authSelect;
		}
		
	}