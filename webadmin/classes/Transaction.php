<?php

class Transaction
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function getUserTransaction($user_id, $status)
    {
        $sql = "SELECT * FROM transaction WHERE user_id=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_INT);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getTransactionsByUser()
    {
        $sql = "SELECT t.*,
        u.full_name as user_fullName
        FROM transaction t INNER JOIN
        users u ON t.user_id = u.id ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getTransactionById($transaction_id)
    {
        $sql = "SELECT t.*,
        u.full_name AS user_fullName, u.id AS userId
        FROM transaction t INNER JOIN
        users u ON t.user_id = u.id WHERE t.id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $transaction_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function editTransaction($transaction_id, $user_Id, $invested_fund, $dividend, $referral, $withdrawn, $status)
    {
        $sql = "UPDATE transaction SET user_id=?, invested_fund=?, dividend=?, referral=?, withdrawn=?, status=? WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$user_Id, $invested_fund, $dividend, $referral, $withdrawn, $status, $transaction_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Transaction Updated Successfully!";
            header("location: ../view-transactions.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-transactions.php");
            exit(0);
        }
    }

    public function uploadPaymentProof($user_id, $image)
    {

        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../../dashboard.php");
                exit(0);
            } else if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../../dashboard.php");
                exit(0);
            } else {
                $destination = "../../img/payments/$filename";
                move_uploaded_file($image_tmp_name, $destination);


                $sql = "INSERT INTO payments (user_id, proof) VALUES(?, ?)";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $user_id, PDO::PARAM_INT);
                $statement->bindParam(2, $filename, PDO::PARAM_STR);
                $statement->execute();

                if ($statement) {
                    $_SESSION['successMessage'] = "Payment Proof Uploaded Successfully!";
                    header("location: ../../dashboard.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../../dashboard.php");
                    exit(0);
                }
            }
        } else {
            $_SESSION['errorMessage'] = "No document found!";
            header("location: ../../dashboard.php");
            exit(0);
        }
    }

    public function getPaymentProof($user_Id)
    {
        $sql = "SELECT * FROM payments WHERE user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_Id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
    public function getAllPaymentProof()
    {
        $sql = "SELECT p.*,
        u.full_name as user_fullName
        FROM payments p INNER JOIN
        users u ON p.user_id = u.id ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
    
    public function updatePaymentStatus($payment_id, $user_id, $payment_status)
    {
        $paymentStatusInfo = $payment_status == 1 ? 'Approved':'Declined';
        $sql = "UPDATE payments SET status=? WHERE id=? AND user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $payment_status, PDO::PARAM_INT);
        $statement->bindParam(2, $payment_id, PDO::PARAM_INT);
        $statement->bindParam(3, $user_id, PDO::PARAM_INT);
        $statement->execute();
        if ($statement) {
            $_SESSION['successMessage'] = "Payment Status $paymentStatusInfo!";
            header("location: ../view-payments.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-payments.php");
            exit(0);
        }
    }
}
