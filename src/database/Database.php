<?php
namespace xxAROX\Playground\database;
use Medoo\Medoo;
use xxAROX\Playground\utils\Utils;

final class Database {
    private Medoo $medoo;

    public function __construct() {
        $this->medoo = new Medoo([
            "type" => "sqlite",
            "database_name" => Utils::folder_resources("database.db"),
        ]);
    }
    public function medoo(): Medoo{
        return $this->medoo;
    }
    private function initialize(): void{
        $this->medoo->create(
            "users",
            [
                "id" => ["INTEGER", "PRIMARY KEY", "AUTO_INCREMENT", "NOT NULL", "UNIQUE"],
                "email"=> ["VARCHAR(320)", "NOT NULL", "UNIQUE"],
                "password"=> ["VARCHAR(128)", "NOT NULL"],
                "created"=> ["TIMESTAMP", "NOT NULL"],
                "settings"=> ["BLOB", "DEFAULT '{}'"],
            ]
        );
    }
}
