# yii2-bconsole
Bareos Connector for Yii2 Framework. Clone from Bareos Web User Interface - https://github.com/bareos/bareos-webui

<h2>Компонент для подключения к Bareos Director</h2>

Компонент позоляет подключаться к директору Bareos, аналогично утилите bconsole. Исходные коды взяты из проекта - https://github.com/bareos/bareos-webui


<strong>Установка:</strong>
<pre>composer require bareos/bsock</pre>

<strong>Подключение:</strong>
<pre>
'components' => [
  ...
    	'bsock' => [
    			'class' => 'Bareos\BareosComponent',
    			'options' => [
						'host' => 'bareos.server.director',
    					'console_name' => <User>,
    					'password' => <Password>,
    					'port' => '9101',
    			]
    	],
  ...
]
</pre>

<strong>Использование:</strong>
Получение списка клиентов
<pre>
...
    $bsock = Yii::$app->bsock;
    $cmd = 'llist clients current';
    $result = $bsock->send_command($cmd, 2, null);
...
</pre>
