<?php

class user_model
{
    private
        $db,
        $table = 'tb_user';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id='$id'");
        return $this->db->single();
    }

    public function getByEmail($email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email='$email'");
        return $this->db->single();
    }

    public function getByIdEmail($id, $email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email='$email' AND id!=$id");
        return $this->db->single();
    }

    public function getByIdNo($id, $no_telp)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE no_telp='$no_telp' AND id!=$id");
        return $this->db->single();
    }

    public function getSuperAdmin()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_admin = 2");
        return $this->db->single();
    }

    public function getAdmin()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_admin = 1");
        return $this->db->resultSet();
    }

    public function getNormalUser()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_admin = 0");
        return $this->db->resultSet();
    }

    public function getByUser($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username='$username'");
        return $this->db->single();
    }

    public function signin($data)
    {
        $email = $data['email'];
        $u_password = $data['u_password'];

        // cek user
        $user = $this->getByEmail($email);
        if ($user) :
            // cek password
            $pass = password_verify($u_password, $user['u_password']);
            if ($pass) :
                $username = $user['username'];
                $user_id = 'User ' . $user['id'];
                $user_type = $user['is_admin'];

                $_SESSION['user'] = $username != '' ? $username : $user_id;
                $_SESSION['type'] = $user_type;
                $_SESSION['data'] = $user['email'];
                return 1;
            else :
                return 0;
            endif;
        endif;
    }

    public function update($data)
    {
        $id = $data['id'];
        $u_name = $this->db->filter($data['u_name']);
        $username = $this->db->filter($data['username']);
        $no_telp = $this->db->filter($data['no_telp']);
        $email = $this->db->filter($data['email']);
        $alamat = $this->db->filter($data['alamat']);

        // Filter
        // Cek Email
        $email_user = $this->getByIdEmail($id, $email);

        if ($email_user) :
            echo "<script>alert('Email sudah digunakan'); document.location.href='../profile'</script>";
        else :

            $query = "UPDATE {$this->table} SET 
                u_name = '$u_name',
                username = '$username',
                no_telp = '$no_telp',
                email = '$email',
                alamat = '$alamat'
                WHERE id=$id
                ";

            $_SESSION['user'] = $username;
            $this->db->query($query);
            $this->db->execute();
            return $this->db->rowCount();

        endif;
    }

    public function updatePassword($data)
    {
        $id = $data['id'];
        $u_password = $data['u_password'];
        $n_password = $data['n_password'];
        $cn_password = $data['cn_password'];

        // cek user
        $user = $this->getById($id);

        // cek password
        if (password_verify($u_password, $user['u_password'])) :

            // cek password baru
            if ($cn_password == $n_password) :

                if ($n_password != $u_password) :

                    // hash
                    $pass = password_hash($n_password, PASSWORD_DEFAULT);

                    $query = "UPDATE {$this->table} SET 
                    u_password = '$pass' WHERE id=$id
                    ";

                    $this->db->query($query);
                    $this->db->execute();
                    return $this->db->rowCount();

                else :
                    echo "<script>alert('Password baru tidak boleh sama!'); document.location.href='profil'</script>";
                endif;

            else :
                echo "<script>alert('Konfirmasi Password tidak sama!'); document.location.href='profil'</script>";
            endif;
        else :
            echo "<script>alert('Password Salah'); document.location.href='profil'</script>";
        endif;
    }

    public function updateType($data)
    {
        $id = $data['id'];
        $is_admin = $data['is_admin'];

        $query = "UPDATE {$this->table} SET 
            is_admin = $is_admin WHERE id = $id
        ";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function signup($data)
    {
        $email = $this->db->filter($data['email']);
        $u_password = $data['u_password'];
        $c_password = $data['c_password'];

        // cek user
        $cek = $this->getByEmail($email);
        if ($cek) :
            echo "<script>alert('Email sudah terdaftar'); document.location.href='register'</script>";

        // cek password
        elseif ($c_password != $u_password) :
            echo "<script>alert('Konfirmasi Password tidak sama'); document.location.href='register'</script>";

        // filter complete
        else :
            // hash password
            $u_password = password_hash($u_password, PASSWORD_DEFAULT);

            // query db
            $this->db->query("INSERT INTO {$this->table} VALUES (
            '', '', '', '$email', '$u_password', '', '', 0
            )");

            $this->db->execute();
            return $this->db->rowCount();
        endif;
    }

    public function rememberPassword($data)
    {
        $userdata = $this->getByEmail($data['email']);

        if ($userdata) :

            $id = $userdata['id'];

            $n_password = $data['n_password'];
            $cn_password = $data['cn_password'];

            // cek user
            $user = $this->getById($id);


            // cek password baru
            if ($cn_password == $n_password) :

                // hash
                $pass = password_hash($n_password, PASSWORD_DEFAULT);

                $query = "UPDATE {$this->table} SET 
                    u_password = '$pass' WHERE id=$id
                    ";

                $this->db->query($query);
                $this->db->execute();
                return $this->db->rowCount();
            else :
                if ($_SESSION['user']) :
                    echo "<script>alert('Konfirmasi Password tidak sama!'); document.location.href='profil'</script>";
                else :
                    echo "<script>alert('Konfirmasi Password tidak sama!'); document.location.href='../remember'</script>";
                endif;
            endif;
        else :
            echo "<script>alert('Username tidak ditemukan!'); document.location.href='../remember'</script>";
        endif;
    }
}
