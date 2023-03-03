<?php

class dashboardHotel_model
{
    private
        $db,
        $table = 'hotel_main';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getData()
    {
        $query = "SELECT * FROM {$this->table} RIGHT JOIN `tb_hotel` ON `{$this->table}`.`hotel_id`=`tb_hotel`.`hotel_id`";

        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function singleHotel($hotel_id)
    {
        // $hotel_id = (int)$hotel_id;
        // die(var_dump($hotel_id));
        // $query = "SELECT * FROM `tb_hotel` RIGHT JOIN {$this->table} ON {$this->table}.hotel_id=`tb_hotel`.hotel_id WHERE `hotel_id`=$hotel_id";

        // die(var_dump($hotel_id));

        $query = "SELECT * FROM {$this->table} RIGHT JOIN tb_hotel ON {$this->table}.hotel_id=`tb_hotel`.hotel_id WHERE tb_hotel.`hotel_id`=$hotel_id";

        $this->db->query($query);

        return $this->db->single();
    }

    public function singleRoomNo($hotel_id, $room_no)
    {
        $query = "SELECT * FROM `hotel_room`WHERE `room_no`=$room_no AND `hotel_id`=$hotel_id";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getDataAllRooms()
    {
        $ids = $_SESSION['hotel_id'];

        $query = "SELECT * FROM {$this->table} LEFT JOIN `hotel_room` ON `{$this->table}`.`hotel_id`=`hotel_room`.`hotel_id` WHERE `hotel_room`.`hotel_id`=$ids";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDataUsedRooms()
    {
        $ids = $_SESSION['hotel_id'];
        $query = "SELECT * FROM {$this->table} LEFT JOIN `hotel_room` ON `{$this->table}`.`hotel_id`=`hotel_room`.`hotel_id` WHERE  `hotel_room`.`terisi`=1 AND {$this->table}.`hotel_id`=$ids";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getActive($hotel_id, $room_no)
    {
        $query = "SELECT * FROM hotel_checkin LEFT JOIN `tb_hotel` ON `hotel_checkin`.`hotel_id`=`tb_hotel`.`id` WHERE `hotel_id`=$hotel_id AND `room_no`=$room_no";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getActiveDesc($hotel_id, $room_no)
    {
        $query = "SELECT * FROM hotel_checkin WHERE `hotel_id`=$hotel_id AND `room_no`=$room_no ORDER BY id DESC";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getHotelFeature($id)
    {
        $query = "SELECT features FROM {$this->table} RIGHT JOIN `tb_hotel` ON `{$this->table}`.`hotel_id`=`tb_hotel`.`hotel_id` WHERE {$this->table}.`hotel_id`=$id";
        $this->db->query($query);
        return $this->db->single();
    }

    public function add()
    {
        $hotel_id = $_POST['hotel_id'];
        $no_kamar = $_POST['no_kamar'];
        $beds = $_POST['beds'];
        $max_adults = $_POST['max_adults'];
        $max_anak = $_POST['max_anak'];
        $feature_1 = $_POST['feature_1'] ?? null;
        $feature_2 = $_POST['feature_2'] ?? null;
        $feature_3 = $_POST['feature_3'] ?? null;
        $feature_4 = $_POST['feature_4'] ?? null;
        $feature_5 = $_POST['feature_5'] ?? null;
        $feature_6 = $_POST['feature_6'] ?? null;
        $feature_7 = $_POST['feature_7'] ?? null;
        $feature_8 = $_POST['feature_8'] ?? null;
        $feature_9 = $_POST['feature_9'] ?? null;

        $feature_list = [$feature_1, $feature_2, $feature_3, $feature_4, $feature_5, $feature_6, $feature_7, $feature_8, $feature_9];

        $features = [];

        foreach ($feature_list as $feature) :

            if ($feature != null) $features[] = $feature;

        endforeach;

        $features = implode(', ', $features);

        // cek kamar
        if ($this->singleRoomNo($hotel_id, $no_kamar)) :

            echo "<script>alert('Kamar sudah terdaftar!'); document.location.href='../manage/room'</script>";

        else :

            $query = "INSERT INTO hotel_room VALUES (
                        '', $hotel_id, $no_kamar, $beds, $max_adults, $max_anak, '$features', 0
                    )";

            $this->db->query($query);
            $this->db->execute();
            return $this->db->rowCount();
        endif;
    }

    public function checkRoom()
    {
        $url = explode('/', $_GET['url']);
        $room = end($url);

        if (is_numeric($room)) :
            $query = "SELECT * FROM hotel_room WHERE room_no=$room";
        else :
            $query = "SELECT * FROM hotel_room WHERE room_no=''";
        endif;
        $this->db->query($query);
        return $this->db->single();
    }

    public function checkRoomOut()
    {
        $hotel_id = $_SESSION['hotel_id'];
        if (isset($hotel_id)) :
            $query = "SELECT * FROM hotel_checkin WHERE hotel_id=$hotel_id AND active=1";
        endif;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function checkin()
    {
        $u_name = $this->db->filter($_POST['u_name']);
        $email = $this->db->filter($_POST['email']);
        $no_telp = $this->db->filter($_POST['no_telp']);
        $total_inap = (int)$this->db->filter($_POST['total_inap']);
        $total_dewasa = $this->db->filter($_POST['total_dewasa']);
        $total_anak = $this->db->filter($_POST['total_anak']);
        $checkinDate = $this->db->filter($_POST['checkinDate']);
        $checkoutDate = $this->db->filter($_POST['checkoutDate']);
        $room_no = $this->db->filter($_POST['room_no']);
        $hotel_id = $this->db->filter($_POST['hotel_id']);
        $hotel_fee = (int)$this->singleHotel($hotel_id)['price'] * $total_dewasa;
        $hotel_fee *= $total_inap;
        $total_price = $hotel_fee;

        $query = "INSERT INTO `hotel_checkin` VALUES (
            '', $hotel_id, $room_no, '$u_name', '$email', '$no_telp', $total_inap, $total_dewasa, $total_anak, $hotel_fee, 0, $total_price, '$checkinDate', '$checkoutDate', 1
        )";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function checkinActive()
    {
        $hotel_id = $this->db->filter($_POST['hotel_id']);
        $room_no = $this->db->filter($_POST['room_no']);

        $query = "UPDATE `hotel_room` SET `terisi`=1 WHERE `hotel_id`=$hotel_id AND `room_no`=$room_no";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function confirm()
    {
        $hotel_id = $this->db->filter($_POST['hotel_id']);
        $room_no = $this->db->filter($_POST['room_no']);

        $query = "UPDATE `hotel_room` SET `terisi`=0 WHERE `hotel_id`=$hotel_id AND `room_no`=$room_no";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function confirm2()
    {
        $hotel_id = $this->db->filter($_POST['hotel_id']);
        $room_no = $this->db->filter($_POST['room_no']);

        $query = "UPDATE `hotel_checkin` SET `active`=0 WHERE `hotel_id`=$hotel_id AND `room_no`=$room_no";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
