--TEST--
Disable functions - match on an array using regexp
--SKIPIF--
<?php if (!extension_loaded("snuffleupagus")) die "skip"; ?>
--INI--
sp.configuration_file={PWD}/config/config_disabled_functions_param_r_array.ini
--FILE--
<?php
function foo($arr) {
	 echo $arr["a"]."\n";
}
$a=Array("test2"=>"pof", "pof"=>"pif", "a"=>Array("qwe"=>"bbb"), "a"=>"cccc");
foo($a);

$a=Array("a"=>"abcd", "pof"=>"pif", "bar"=>Array("qwe"=>"bbb"), "b"=>"cccc");
foo($a);
?>
--EXPECTF--
cccc
[snuffleupagus][0.0.0.0][disabled_function][drop] Aborted execution on call of the function 'foo' in %a/tests/disabled_functions_param_array_r.php:3, because its argument 'arr' content (ARRAY) matched the rule '1'.
