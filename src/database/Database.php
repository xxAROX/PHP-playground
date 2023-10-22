<?php
namespace xxAROX\Playground\database;
use Medoo\Medoo;
use xxAROX\Playground\utils\Utils;

final class Database {
    private Medoo $medoo;

    public function __construct() {
        $this->medoo = new Medoo([
            "type" => "sqlite",
            "database_name" => Utils::folder_resources("database.db")
        ]);
    }
}
