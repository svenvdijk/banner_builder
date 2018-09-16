<?php

class Banner {
    public function fetch_all() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM banners");
        $query->execute();

        return $query->fetchAll();
    }
}

?>
