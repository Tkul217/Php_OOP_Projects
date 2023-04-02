<?php

class TextInput extends BaseInput
{
    /**
     * Class TextInput
     */
    public function renderInput(): string
    {
        return sprintf('<input type="text" name="%s" value="%s">', $this->name, $this->value);
    }
}