<?php
namespace entities;
Class Tag {
    private string $name;
    private int $id;

    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getId(): int {
        return $this->id;
    }
}
?>