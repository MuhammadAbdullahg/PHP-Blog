<?php
require "./autoload.php";
use App\Core\Database;
class Migration {
    public function selMigOrByDesc() {
        return "SELECT migration FROM migrations ORDER BY id DESC";
    }

    public function addFileInMig() {
        return "INSERT INTO migrations (migration) VALUES (?)";
    }
    public function delFileInMig() {
        return "DELETE FROM migrations WHERE migration = ?";
    }
    public function getMigrationAndSqlFiles() {
        echo "file tracking system on \n";

        $stmt = (new Database())->getConnection()->prepare("CREATE TABLE IF NOT EXISTS `migrations` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `migration` varchar(50) DEFAULT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp()
            );");
        $stmt->execute();

        $sql = self::selMigOrByDesc();

        $stmt = (new Database())->getConnection()->prepare($sql);
        $stmt->execute();
        $executedFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
        $newFiles = [];
    
        $files = glob("migrations/*.php");

        return [$executedFiles, $newFiles, $files];
    }

    public function execFileCheck() {
        if(empty($newFiles)) {
            echo "no file for exec\n";
            exit();
        }
    }
}