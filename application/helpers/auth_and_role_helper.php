<?php

function is_logged_in() {
    return !empty($_SESSION['user_id']);
}