<?php
class user {
    public string $name;
    public string $lastname;
    public string $email;
    public string $password;
    public int $yob;
    public int $id_hobby;
    public function __construct(string $name, string $lastname, string $email, string $password, int $yob, int $id_hobby) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->yob = $yob;
        $this->id_hobby = $id_hobby;
    }
    public function _construct(array $data) {
        $this->name = $data["name"];
        $this->lastname = $data["lastname"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->yob = $data["yob"];
        $this->id_hobby = $data["hobby"];
    }
}