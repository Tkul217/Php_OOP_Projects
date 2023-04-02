<?php

class Button extends HtmlElement
{
    public string $text;
    public array $attributes;

    /**
     * Button constructor.
     *
     * @param string $text
     * @param array $attrributes
     */

    public function __construct(string $text, array $attrributes = [])
    {
        $this->text = $text;
        $this->attributes = $attrributes;
    }

    public function render(): string
    {
        $attributes = implode(PHP_EOL, $this->attributes);
        return sprintf('<button %s>%s</button>', $attributes, $this->text);
    }
}