<?php

require_once __DIR__ . '/vendor/autoload.php';

use Jacquesbh\Eater\Eater;

$eat = new Eater;

// Set sample data
$eat->setData([
    'foo' => 'FOO',
    'fooBar' => 'FOO_BAR',
    'foobar' => 'FOOBAR',
    'bar' => ['baz' => 'BAZ']
], null, true);

// print FOO
echo $eat->getFoo();
echo $eat['foo'];
echo $eat->getData('foo');

echo "\n\n";

// print FOO_BAR
echo $eat->getFooBar();
echo $eat['fooBar'];
echo $eat['foo_bar'];
echo $eat->getData('fooBar');
echo $eat->getData('foo_bar');

echo "\n\n";

// print FOOBAR
echo $eat->getFoobar();
echo $eat['foobar'];
echo $eat->getData('foobar');

echo "\n\n";

// print BAZ
echo $eat->getBar()->getBaz();
echo $eat['bar']->getBaz();
$bar = $eat->getBar(); echo $bar['baz'];
echo $eat['bar']['baz'];
echo $eat->getData('bar')->getData('baz');
echo $eat['bar']->getData('baz');

echo "\n\n";

// Unset bar
$eat->unsBar();
$eat->unsetBar();
unset($eat['bar']);
$eat->unsetData('bar');

// print FOO FOO_BAR FOOBAR
foreach ($eat as $str) {
	echo $str, ' ';
}

echo "\n\n";

// Add 'QUX'
$eat->setQux(); // null by default
$eat->setQux('QUX');
$eat['qux'] = 'QUX';
$eat->setData('qux', 'QUX');

// Serialize
$serial = serialize($eat);
echo $serial, "\n\n";
$eat = unserialize($serial);
echo $eat, "\n\n";

// Clean
print_r($eat->getData());
$eat->unsetData();
print_r($eat->getData());
