<?php

namespace Bareos\BSock;

use yii\base\Component;
use Bareos\BSock\BareosBSock;

class BareosComponent extends Component {
	private $bsockClass;
	
	public $options = [];
	
	/**
	 * init() called by yii.
	 */
	public function init()
	{
		$this->bsockClass = new BareosBSock($this->options);

		$this->bsockClass->set_config($this->options);
//		$this->bsockClass->set_user_credentials($options['username'], $options['password']);
		$this->bsockClass->init();
	}
	
	public function __call($methodName, $methodParams)
	{
		if (method_exists($this->bsockClass, $methodName)) {
			return call_user_func_array(array($this->bsockClass, $methodName), $methodParams);
		} else {
			return parent::__call($methodName, $methodParams);
		}
	}
}
