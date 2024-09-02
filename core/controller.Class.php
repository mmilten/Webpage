<?php
class Connect extends PDO
{
    public function __construct()
    {
        parent::__construct(
            "mysql:host=localhost;dbname=webpage",
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    }
}

class Controller
{
    // print data
    function printData($id)
    {
        $db = new Connect;
        $user = $db->prepare('SELECT * FROM google_login WHERE id=:id');
        $user->execute([':id' => intval($id)]);
        $content = '
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Avatar</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>';
        while ($userInfo = $user->fetch(PDO::FETCH_ASSOC)) {
            $content .= '
            <tr>
                <td>' . $userInfo["name"] . '</td>
                <td><img style="max-width: 100px;" src="' . $userInfo["avatar"] . '" alt="User Avatar"></td>
                <td>' . $userInfo["email"] . '</td>
            </tr>
            ';
        }
        $content .= '</tbody></table>
        ';
        return $content;
    }
    // check if user is logged in
    function checkUserStatus($id, $sess)
    {
        $db = new Connect;
        $user = $db->prepare("SELECT id FROM google_login WHERE id=:id AND session=:session");
        $user->execute([
            ':id'      => intval($id),
            ':session' => $sess
        ]);
        $userInfo = $user->fetch(PDO::FETCH_ASSOC);
        if (!$userInfo["id"]) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    // generate char
    function generateCode($length)
    {
        $chars = "vwyzABC01256";
        $code = " ";
        $clean = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clean)];
        }
        return $code;
    }
    // insert data
    function insertData($data)
    {
        $db = new Connect;
        $checkUser = $db->prepare("SELECT * FROM google_login WHERE email=:email");
        $checkUser->execute(['email' => $data["email"]]);
        $info = $checkUser->fetch(PDO::FETCH_ASSOC);

        if (!$info["id"]) {
            $session = $this->generateCode(10);
            $inserUser = $db->prepare("INSERT INTO google_login (name, avatar, email, session) 
                                        VALUES (:name, :avatar, :email, :session)");

            $inserUser->execute([
                ':name' => $data["name"],
                ':avatar' => $data["avatar"],
                ':email' => $data["email"],
                ':session' => $session
            ]);

            if ($inserUser) {
                setcookie("id", $db->lastInsertId(), time() + 60 * 60 * 24 * 30, "/", NULL);
                setcookie("sess", $session, time() + 60 * 60 * 24 * 30, "/", NULL);
                header('location: ../pages/index.php');
                exit();
            } else {
                return "Error inserting user!";
            }
        } else {
            setcookie("id", $info["id"], time() + 60 * 60 * 24 * 30, "/", NULL);
            setcookie("sess", $info["session"], time() + 60 * 60 * 24 * 30, "/", NULL);
            header('location: ../pages/index.php');
            exit();
        }
    }
}
