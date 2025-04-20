<?php

class Package
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createPackage($name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $image, $status)
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
                header("location: ../create-package.php");
                exit(0);
            } else if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../create-package.php");
                exit(0);
            } else {
                $destination = "../../img/packages/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "INSERT INTO packages(name, slug, caption, color, percentage, daily_profit, currency, bonus, days, amount, description, image, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $filename, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Packages Created Successfully!";
                    header("location: ../view-packages.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-packages.php");
                    exit(0);
                }
            }
        } else {

            $sql = "INSERT INTO packages(name, slug, caption, color, percentage, daily_profit, currency, bonus, days, amount, description, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $statement = $this->db->prepare($sql);
            $statement->execute([$name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $status]);

            if ($statement) {
                $_SESSION['successMessage'] = "Speaker Created Successfully!";
                header("location: ../view-packages.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../view-packages.php");
                exit(0);
            }
        }
    }

    public function editPackage($package_id, $name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $image, $old_image, $status)
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
                header("location: ../edit-package.php?pId=$package_id");
                exit(0);
            } else if ($image_size > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../edit-package.php?pId=$package_id");
                exit(0);
            } else {
                $olDestination = "../../img/packages/$old_image";

                if (file_exists($olDestination)) {
                    unlink($olDestination);
                }

                $destination = "../../img/packages/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "UPDATE packages SET name=?, slug=?, caption=?, color=?, percentage=?, daily_profit=?, currency=?, bonus=?, days=?, amount=?, description=?, image=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $filename, $status, $package_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Package Updated Successfully!";
                    header("location: ../view-packages.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-packages.php");
                    exit(0);
                }
            }
        } else {
            $sql = "UPDATE packages SET name=?, slug=?, caption=?, color=?, percentage=?, daily_profit=?, currency=?, bonus=?, days=?, amount=?, description=?, status=? WHERE id=?";
            $statement = $this->db->prepare($sql);
            $statement->execute([$name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $status, $package_id]);

            if ($statement) {
                $_SESSION['successMessage'] = "Package Updated Successfully!";
                header("location: ../view-packages.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../view-packages.php");
                exit(0);
            }
        }
    }

    public function getPackages($table = "packages")
    {
        $sql = "SELECT * FROM $table ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getPackagesStatus($table = "packages")
    {
        $sql = "SELECT * FROM $table WHERE status=0 ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getLatestPackage($table = "packages")
    {
        $sql = "SELECT * FROM $table WHERE status=0 ORDER BY date DESC LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getPackageBySlug($table = "packages", $slug)
    {
        $sql = "SELECT * FROM $table WHERE slug=? AND status=0";
        $statement = $this->db->prepare($sql);
        $statement->execute([$slug]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
}
