<?php
namespace xxAROX\Playground\database;
use Medoo\Medoo;

final class Database {
    private Medoo $medoo;

    public function __construct(array $credentials) {
        $this->medoo = new Medoo([
            "host" => "0.0.0.0",
            "type" => "mariadb",
            "database" => "mariadb",
            "username" => "mariadb",
            "password" => "mariadb",
        ]);
    }
}
