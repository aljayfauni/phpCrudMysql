<?php
include "../interfaces/CRUDInterface.php";

class FormHandler {
    public function __construct($itemCRUD) {
        $this->itemCRUD = $itemCRUD;
    }

    public function handleFormRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["create"])) {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $this->itemCRUD->create($name, $description);
            } elseif (isset($_POST["update"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $description = $_POST["description"];
                $this->itemCRUD->update($id, $name, $description);
            } elseif (isset($_POST["delete"])) {
                $id = $_POST["id"];
                $this->itemCRUD->delete($id);
            }
        }
    }
}
?>
