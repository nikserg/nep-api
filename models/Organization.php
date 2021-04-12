<?php
namespace nikserg\NepApi\models;

class Organization extends AbstractModel {
    public int $id;
    public string $name;
    public ?string $inn;
}