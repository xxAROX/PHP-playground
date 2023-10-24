<?php
namespace xxAROX\Playground\database;
use Medoo\Medoo;
use xxAROX\Playground\database\entities\User;
use xxAROX\Playground\utils\Utils;

final class Database {
    private Medoo $medoo;
    /** @var User[] */
    private array $users = [];

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
        $this->load();
    }

    private function load(): void{
        $users = $this->medoo->select("users", ["id", "email", "password", "created", "settings"]);
        var_dump($users);
    }

    public function isUserRegistered(string $email): bool{
        return $this->medoo->has("users", ["email" => $email]);
    }

    public function createUser(string $email, string $password): ?User{
        if ($this->isUserRegistered($email)) return null;
        $this->medoo->create("users", [
            "email"=> $email,
            "password"=> $password,
            "settings" => "{}",
            "created" => date("Y-m-d H:i:s"),
        ]);
        [$id, $created] = $this->medoo->get("users", ["id", "created"], ["email" => $email]);
        $user = new User(
            $id,
            $email,
            md5($password),
            strtotime($created),
            []
        );
        $this->users[$id] = $user;
        return $user;
    }
}
