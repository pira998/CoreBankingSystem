<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['employee_id'])) {
            return true;
        } else {
            return false;
        }
    }
    function isCustomerLoggedIn() {
        if (isset($_SESSION['customer_id'])) {
            return true;
        } else {
            return false;
        }
    }
