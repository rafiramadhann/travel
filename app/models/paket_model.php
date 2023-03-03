<?php

class paket_model
{
    private
        $db,
        $table = 'tb_paket';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getAllDaerah()
    {
        $this->db->query("SELECT * FROM daerah");
        return $this->db->resultSet();
    }

    public function getById()
    {
        $id = $_POST['paket_id'];

        $query = "SELECT * FROM {$this->table} WHERE id=$id";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getByDaerah($slug)
    {
        $query = "SELECT {$this->table}.`name`, {$this->table}.`slug`, {$this->table}.`daerah_id`, {$this->table}.`price`, {$this->table}.`promosi`, {$this->table}.`description`, {$this->table}.`image` FROM `{$this->table}` LEFT JOIN `daerah` ON `{$this->table}`.`daerah_id` = `daerah`.`daerah_id` WHERE `daerah`.`slug` = '$slug'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getBySlug($slug)
    {
        $query = "SELECT * FROM `{$this->table}` WHERE `slug` = '$slug'";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getDataLimit($lim)
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY id DESC LIMIT $lim");
        return $this->db->resultSet();
    }

    public function seeDetail($slug)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE slug='$slug'");
        return $this->db->single();
    }

    public function add()
    {
        $name = $this->db->filter($_POST['name']);
        $slug = $_POST['slug'];
        $price = $_POST['price'];
        $daerah_id = $_POST['daerah_id'];
        $promotion = $this->db->filter($_POST['promotion']);
        $description = $this->db->filter($_POST['description']);

        $img_name = $_FILES['image']['name'];
        $img_full_path = $_FILES['image']['full_path'];
        $img_type = explode('/', $_FILES['image']['type']);
        $img_type = end($img_type);
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];
        $img_error = $_FILES['image']['error'];

        // die(var_dump($_FILES['image']));

        // filter image

        $target = "img/";
        $check = getimagesize($img_tmp_name);

        if ($check) :

            // filter size
            if ($img_size < 1000000) :

                // rename
                $img_name = "IMG_";
                $img_name .= date("Ymd_", time());
                $img_name .= time();
                $img_name .= ".$img_type";

                move_uploaded_file($img_tmp_name, $target . "$img_name");

                $query = "INSERT INTO tb_paket VALUES (
                            '',
                            '$name',
                            '$slug',
                            $daerah_id,
                            $price,
                            '$promotion',
                            '$description',
                            '$img_name'
                            )";

                $this->db->query($query);
                $this->db->execute();
                return $this->db->rowCount();

            else :

                echo "<script>alert('Size Image terlalu besar!'); document.location.href='../manage'</script>";

            endif;

        else :

            echo "<script>alert('File bukan gambar!'); document.location.href='../manage'</script>";

        endif;
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $this->db->filter($_POST['name']);
        $slug = $_POST['slug'];
        $price = $_POST['price'];
        $daerah_id = $_POST['daerah_id'];
        $promotion = $this->db->filter($_POST['promotion']);
        $description = $this->db->filter($_POST['description']);
        $old_image = $this->db->filter($_POST['old_image']);

        $img_name = $_FILES['image']['name'];
        $img_full_path = $_FILES['image']['full_path'];
        $img_type = explode('/', $_FILES['image']['type']);
        $img_type = end($img_type);
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];
        $img_error = $_FILES['image']['error'];

        // var_dump($_POST);
        // die(var_dump($_FILES['image']));

        // filter image

        $target = "img/";
        // $check = getimagesize($img_tmp_name);

        // die(var_dump($old_image));
        // var_dump($img_error);

        if ($img_error == 4) :

            $img_name = $old_image;

        else :


            // filter size
            if ($img_size < 1000000) :

                // rename
                $img_name = "IMG_";
                $img_name .= date("Ymd_", time());
                $img_name .= time();
                $img_name .= ".$img_type";

                unlink("img/$old_image");

                move_uploaded_file($img_tmp_name, $target . "$img_name");

            else :

                echo "<script>alert('Size Image terlalu besar!'); </script>";

                return 0;

            endif;

        endif;

        $query = "UPDATE tb_paket SET 
                            `name` = '$name',
                            `slug` = '$slug',
                            `daerah_id` = $daerah_id,
                            `price` = $price,
                            `promosi` = '$promotion',
                            `description` = '$description',
                            `image` = '$img_name'
                        WHERE id=$id";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function drop()
    {
        $id = $_POST['paket_id'];
        $old_image = $_POST['old_image'];


        unlink("img/$old_image");

        $query = "DELETE FROM tb_paket WHERE id = $id";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
