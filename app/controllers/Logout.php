<?php
session_start();

class Logout extends Controller
{
    public function index()
    {
        session_destroy();
        session_unset();

        echo "<script>alert('Logout Berhasil');document.location.href='login'</script>";
    }
}
