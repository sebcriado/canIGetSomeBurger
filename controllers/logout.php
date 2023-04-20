<?php


if (isConnected()) {
    $_SESSION = [];
    session_destroy();
    header('Location: ' . constructUrl('/'));
}
