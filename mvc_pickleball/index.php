<?php
session_start();

require_once 'controller/ProductController.php';
$controller = new ProductController();
$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'add': $controller->add(); break;
    case 'edit': $controller->edit(); break;
    case 'delete': $controller->delete(); break;
    case 'add_to_cart': $controller->add_to_cart(); break;
    case 'view_cart': $controller->view_cart(); break;
    case 'update_cart': $controller->update_cart(); break;
    case 'remove_from_cart': $controller->remove_from_cart(); break;
    default: $controller->index(); break;
}