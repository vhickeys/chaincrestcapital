<?php

class WalletAddress
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createWalletAddress($name, $wallet_address, $status)
    {
        $sql = "INSERT INTO wallet_addresses(name, wallet_address, status) VALUES(?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->execute([$name, $wallet_address, $status]);

        if ($statement) {
            $_SESSION['successMessage'] = "Wallet Address Created Successfully!";
            header("location: ../view-wallet-address.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-wallet-address.php");
            exit(0);
        }
    }

    public function editWalletAddress($name, $wallet_address, $status, $wallet_id)
    {
        $sql = "UPDATE wallet_addresses SET name=?, wallet_address=?, status=? WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$name, $wallet_address, $status, $wallet_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Wallet Address Updated Successfully!";
            header("location: ../view-wallet-address.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-wallet-address.php");
            exit(0);
        }
    }


    public function getWalletAddresses($table = "wallet_addresses")
    {
        $sql = "SELECT * FROM $table ORDER BY created_at DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getWalletsAddrStatus($table = "wallet_addresses")
    {
        $sql = "SELECT * FROM $table WHERE status=0 ORDER BY created_at DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
}
