<?php
class Pipeline
{
    public static function make_pipeline(...$funcs)
    {
        return function($arg) use ($funcs)
        {
              $current_result = $arg;
              foreach ($funcs as $func) {
                $current_result = $func($current_result);
              }
              return $current_result;
        };
    }
}

$fun = Pipeline::make_pipeline(function($x) { return $x * 3; }, function($x) { return $x + 1; },
                          function($x) { return $x / 2; });
echo $fun(3); # should print 5
