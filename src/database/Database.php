<?php
namespace xxAROX\Playground\database;
use Medoo\Medoo;
use xxAROX\Playground\database\entities\User;
use xxAROX\Playground\utils\Utils;

final class Database {
    private Medoo $medoo;
    /** @var array<int, User> $users */
    public array $users = [];

    public function __construct() {
        $this->medoo = new Medoo([
            "type" => "sqlite",
            "database" => Utils::folder_resources("database.sql"),
        ]);
        $this->initialize();
    }
    public function medoo(): Medoo{
        return $this->medoo;
    }
    private function initialize(): void{
        try {
            $this->createTables();
        } catch (\PDOException $e) {
            echo "PDOException: " . $e->getMessage();
        }
        $this->load();
    }

    private function createTables(): void{
        $this->medoo->create("users", [
            "id" => [
                "INTEGER",
                "NOT NULL",
                "PRIMARY KEY",
                "AUTOINCREMENT"
            ],
            "email" => [
                "VARCHAR(320)", 
                "NOT NULL",
                "UNIQUE"
            ],
            "password" => [
                "VARCHAR(1024)",
                "NOT NULL",
            ],
            "created" => [
                "TIMESTAMP",
                "NOT NULL",
            ],
            "admin" => [
                "VARCHAR(1)",
                "NOT NULL",
                "DEFAULT 'n'",
            ],
            "settings" => [
                "BLOB",
                "DEFAULT '{}'"
            ],
        ]);
    }

    private function load(): void{
        $users = $this->medoo->select("users", ["id", "email", "password", "created", "admin", "settings"]);
        foreach($users as $k => $user) {
            $this->users[$user["id"]] = new User(
                $user["id"],
                $user["email"],
                $user["password"],
                strtotime($user["created"]),
                $user["admin"] == "y",
                json_decode($user["settings"], true),
            );
        }
    }

    public function isUserRegistered(string $email): bool{
        return $this->getUserByEmail($email) !== null;
    }

    public function createUser(string $email, string $password): ?User{
        if ($this->isUserRegistered($email)) return null;
        $this->medoo->insert("users", [
            "email"=> $email,
            "password"=> md5($password),
            "created" => date("Y-m-d H:i:s"),
            "admin" => count($this->users) == 0 ? "y" : "n",
        ]);
        [$id, $created] = $this->medoo->get("users", ["id", "created"], ["email" => $email]);
        $user = new User(
            $id,
            $email,
            md5($password),
            strtotime($created),
            count($this->users) == 0,
            []
        );
        $this->users[$id] = $user;
        return $user;
    }

    public function getUserByEmail(string $email): ?User{
        return array_values(array_filter($this->users, fn (User $user) => mb_strtolower($user->getEmail()) === mb_strtolower($email)))[0] ?? null;
    }
}
