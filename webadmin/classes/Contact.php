<?php

class Contact
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function contactSubmit($name, $email, $phone, $subject, $message)
    {
        $sql = "INSERT into contacts (name, email, phone, subject, message) values(?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $name, PDO::PARAM_STR);
        $statement->bindParam(2, $email, PDO::PARAM_STR);
        $statement->bindParam(3, $phone, PDO::PARAM_STR);
        $statement->bindParam(4, $subject, PDO::PARAM_STR);
        $statement->bindParam(5, $message, PDO::PARAM_STR);
        $statement->execute();

        if ($statement) {
            // welcomeMail("support@coinhabor.com", $email, $fullname);
            echo "Message sent successfully!";
        } else {
            echo "something went wrong!";
        }
    }
}
