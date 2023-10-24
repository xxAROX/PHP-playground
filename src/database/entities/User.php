<?php
namespace xxAROX\Playground\database\entities;

class User {
    protected ?string $id = null;
    protected string $email;
    protected string $hashed_password;
    protected int $created;
    protected array $settings = [];

    public function __construct(
        ?string $id, 
        string $email, 
        string $hashed_password, 
        int $created = null, 
        array $settings = []
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->hashed_password = $hashed_password;
        $this->created = $created;
        $this->settings = $settings;
    }


    public function getId(): ?string {
        return $this->id;
    }
    
}
