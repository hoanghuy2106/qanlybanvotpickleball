<?php
class ProductModel {
    public function getAll() { return $_SESSION['products'] ?? []; }

    public function getById($id) {
        foreach ($this->getAll() as $p) { if ($p['id'] == $id) return $p; }
        return null;
    }

    public function save($data) {
        $data['id'] = time();
        $_SESSION['products'][] = $data;
    }

    public function update($id, $data) {
        foreach ($_SESSION['products'] as $key => $p) {
            if ($p['id'] == $id) {
                $data['id'] = $id;
                $_SESSION['products'][$key] = $data;
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        foreach ($_SESSION['products'] as $key => $p) {
            if ($p['id'] == $id) {
                unset($_SESSION['products'][$key]);
                $_SESSION['products'] = array_values($_SESSION['products']);
                return true;
            }
        }
        return false;
    }
}