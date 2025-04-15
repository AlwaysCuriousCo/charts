<?php

use AlwaysCurious\Charts\Charts\Chart;

it('renders an SVG chart from data', function () {
    $chart = new Chart([1, 5, 3, 6]);
    $svg = $chart->render();

    expect($svg)->toContain('<svg');
    expect($svg)->toContain('<polyline');
});
