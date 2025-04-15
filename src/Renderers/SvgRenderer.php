<?php

namespace AlwaysCurious\Charts\Renderers;

class SvgRenderer
{
    protected int $width;
    protected int $height;

    public function __construct(int $width = 400, int $height = 200)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function render(array $data, array $options = []): string
    {
        // Minimal stub for a line-like chart visualization
        $points = $this->mapDataToPoints($data);

        $polyline = '<polyline fill="none" stroke="black" stroke-width="2" points="' . $points . '" />';

        return <<<SVG
<svg width="{$this->width}" height="{$this->height}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {$this->width} {$this->height}">
    {$polyline}
</svg>
SVG;
    }

    protected function mapDataToPoints(array $data): string
    {
        $count = count($data);
        if ($count === 0) return '';

        $step = $this->width / max($count - 1, 1);
        $maxValue = max($data);
        $scaleY = $this->height / ($maxValue ?: 1);

        $points = [];

        foreach ($data as $i => $value) {
            $x = $i * $step;
            $y = $this->height - ($value * $scaleY);
            $points[] = round($x, 2) . ',' . round($y, 2);
        }

        return implode(' ', $points);
    }
}
