<?php
interface CRUDInterface {
    public function create($username, $password,$email);
    public function read();
    public function update($id, $username, $password,$email);
    public function delete($id);
}
?>
