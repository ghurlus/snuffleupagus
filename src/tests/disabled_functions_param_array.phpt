--TEST--
Disable functions
--SKIPIF--
<?php if (!extension_loaded("snuffleupagus")) die "skip"; ?>
--INI--
sp.configuration_file={PWD}/config/config_disabled_functions_param_array.ini
--FILE--
<?php
function foo($arr) {
	 echo $arr["a"]."\n";
}
$a=Array("a"=>"test1");
foo($a);

$a=Array("a"=>"abcde");
foo($a);

$a=Array("a"=>"abcd");
foo($a);
?>
--EXPECTF--
test1
abcde
[snuffleupagus][0.0.0.0][disabled_function][drop] Aborted execution on call of the function 'foo' in %a/disabled_functions_param_array.php:3, because its argument '$arr' content (abcd) matched the rule '1'.
