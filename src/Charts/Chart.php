<?php

namespace AlwaysCurious\Charts;

use AlwaysCurious\Charts\Renderers\SvgRenderer;

class Chart
{
    protected array $data = [];
    protected array $options = [];

    public function __construct(array $data = [], array $options = [])
    {
        $this->data($data);
        $this->options($options);
    }

    public function data(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function options(array $options): static
    {
        $this->options = $options;
        return $this;
    }

    public function render(): string
    {
        return (new SvgRenderer())->render($this->data, $this->options);
    }
}
