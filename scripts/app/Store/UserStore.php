<?php

namespace App\Store;

class UserStore
{
    private $users = [];

    /**
     * @param string $name
     * @param string $mail
     * @param string $pass
     * @return bool
     * @throws \Exception
     */
    public function addUser(string $name, string $mail, string $pass): bool
    {
        // проверка на существование юзера с таким же email
        if (isset($this->users[$mail])) {
            throw new \Exception('Есть уже такой юзер с таким email');
        }

        // проверка на длину пароля
        if (strlen($pass)<5) {
           throw new \Exception('Пароль слишком короткий');
        }

        $this->users[$mail] = [
            'pass' => $pass,
            'mail' => $mail,
            'name' => $name,
        ];

        return true;
    }

    /**
     * @param string $mail
     * @return void
     */
    public function notifyPasswordFailure(string $mail): void
    {
        if (isset($this->users[$mail])) {
            $this->users[$mail]['failed'] = time();
        }
    }

    /**
     * @return array
     */
    public function getUser(string $mail): array
    {
        return $this->users[$mail];
    }
}