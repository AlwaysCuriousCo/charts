<?php

use AlwaysCurious\Charts\Chart;

it('creates a basic chart instance', function () {
    $chart = new Chart();
    expect($chart)->toBeInstanceOf(Chart::class);
});
