<?php
class MY_Profiler extends CI_Profiler
{
	public function run()
	{
		$output = parent::run();
		file_put_contents('/home/atiab/profiler.html', $output);
	}
}
