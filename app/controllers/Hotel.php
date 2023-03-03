<?php
session_start();
error_reporting(0);

class Hotel extends Controller
{
    public function index($slug = '')
    {
        if ($slug == '') :
            $data = [
                'title' => 'Daftar Hotel',
                'active' => 'Daftar Hotel',
                'daerah' => $this->model('hotel_model')->getAllDaerah(),
                'user' => $this->model('user_model')->getByEmail($_SESSION['data']),
            ];

            $this->view('Templates/header', $data);
            $this->view('Hotel/index', $data);
            $this->view('Templates/footer');

        else :

            $data = [
                'title' => 'Daftar Hotel',
                'active' => 'Daftar Hotel',
                'slug' => $slug,
                'daerah' => $this->model('hotel_model')->getAllDaerah(),
                'user' => $this->model('user_model')->getByEmail($_SESSION['data']),
                'hotels' => $this->model('hotel_model')->getData(),
                'hotel' => $this->model('hotel_model')->getByDaerah($slug)
            ];

            $this->view('Templates/header', $data);
            $this->view('Hotel/index2', $data);
            $this->view('Templates/footer');

        endif;
    }

    public function detail()
    {
        echo json_encode($this->model('hotel_model')->seeDetail($_POST['slug']));
    }

    public function select()
    {

        // var_dump($_POST);
        // var_dump($_SESSION);
        // die(var_dump($_POST));

        if (isset($_SESSION['user']) && $_SESSION['type'] > 0) :

            if ($_SESSION['hotel_id'] == null) :
                $data = [
                    'company' => 'Tour Travel Agent',
                    'title' => 'Hotel Manager',
                    'active' => 'Daftar Hotel',
                    'daerah' => $this->model('paket_model')->getAllDaerah(),
                    'hotels' => $this->model('dashboardHotel_model')->getData(),
                ];

                // die(var_dump($data['hotels']));

                $this->view('HotelDashboard/templates/header', $data);
                $this->view('HotelDashboard/templates/sidebar', $data);
                $this->view('HotelDashboard/choice', $data);
                $this->view('HotelDashboard/templates/footer', $data);

            else :

                header("Location: ../hotel/manage");

            endif;


        else :
            header("Location: ../../");
        endif;
    }

    public function sync()
    {
        // var_dump($_POST);

        $hotel_id = (int)$_POST['hotel_id'];

        $hotel = $this->model("dashboardHotel_model")->singleHotel($hotel_id);

        // $hotel = $this->model("dashboardHotel_model")->getData();

        $_SESSION['hotel_id'] = $hotel['hotel_id'];
        $_SESSION['hotel_name'] = $hotel['name'];

        // var_dump($hotel_id);
        // var_dump($hotel);
        // die(var_dump($_SESSION));

        header("Location: ../hotel/manage");
    }

    public function switch()
    {
        $_SESSION['hotel_id'] = $_POST[''];

        header("Location: ../hotel/select");
    }

    public function manage($menu = '')
    {
        if (isset($_SESSION['user']) && $_SESSION['type'] > 0) :

            if ($menu == '') :

                if ($_SESSION['hotel_id'] != null) :

                    $data = [
                        'company' => 'Tour Travel Agent',
                        'title' => 'Hotel Manager',
                        'active' => 'Daftar Hotel',
                        'submenu' => 'dashboard',
                        'hotels' => $this->model('dashboardHotel_model')->getData(),
                        'activeHotel' => $this->model('dashboardHotel_model')->singleHotel($_SESSION['hotel_id']), ($_SESSION['hotel_id']),
                        'allrooms' => $this->model("dashboardHotel_model")->getDataAllRooms(),
                        'usedrooms' => $this->model('dashboardHotel_model')->getDataUsedRooms(),
                    ];

                    $this->view('HotelDashboard/templates/header', $data);
                    $this->view('HotelDashboard/templates/sidebar', $data);
                    $this->view('HotelDashboard/index', $data);
                    $this->view('HotelDashboard/templates/footer', $data);

                else :

                    header("Location: ../hotel/select");

                endif;

            endif;

            if ($menu == 'tambah') :
                // Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolores laudantium quas corporis cum! Dicta ex reprehenderit dolorum necessitatibus! Vitae quae minima facere aliquam nisi error quibusdam eaque, dolor obcaecati a sed et voluptatum rerum ad delectus at sapiente excepturi optio. Possimus harum optio voluptatum eaque iusto excepturi ut voluptas tempora nihil placeat ullam necessitatibus assumenda tempore facere libero voluptatibus nisi quam hic, odio deleniti aliquid quos quas non nobis. Neque molestias, explicabo accusantium, quo iure laborum quas omnis blanditiis ipsa corrupti voluptatibus, labore odio totam cupiditate mollitia excepturi a? Inventore ipsam enim provident rerum minus eligendi earum doloremque rem.

                if ($this->model('hotel_model')->add($_POST) > 0) :
                    echo "<script>alert('Hotel berhasil ditambahkan!'); document.location.href='../manage'</script>";
                else :
                    echo "<script>alert('Hotel gagal ditambahkan!'); document.location.href='../manage'</script>";
                endif;

            endif;

            if ($menu == 'add') :

                if ($_SESSION['hotel_id'] != null) :

                    if ($this->model("dashboardHotel_model")->add($_POST) > 0) {
                        echo "<script>alert('Kamar berhasil ditambahkan!'); document.location.href='../manage'</script>";
                    } else {
                        echo "<script>alert('Kamar gagal ditambahkan!'); document.location.href='../manage'</script>";
                    }

                else :

                    header("Location: ../hotel/select");

                endif;

            endif;

            if ($menu == 'room') :

                if ($_SESSION['hotel_id'] != null) :

                    $data = [
                        'company' => 'Tour Travel Agent',
                        'title' => 'Hotel Manager',
                        'active' => 'Daftar Hotel',
                        'submenu' => 'room',
                        'hotels' => $this->model('dashboardHotel_model')->getData(),
                        'activeHotel' => $this->model('dashboardHotel_model')->singleHotel($_SESSION['hotel_id']),
                        'allrooms' => $this->model("dashboardHotel_model")->getDataAllRooms(),
                        'usedrooms' => $this->model('dashboardHotel_model')->getDataUsedRooms(),
                        'roomFeatures' => explode(', ', $this->model('dashboardHotel_model')->getHotelFeature($_SESSION['hotel_id'])['features']),
                    ];

                    $this->view('HotelDashboard/templates/header', $data);
                    $this->view('HotelDashboard/templates/sidebar', $data);
                    $this->view('HotelDashboard/rooms', $data);
                    $this->view('HotelDashboard/templates/footer', $data);

                else :

                    header("Location: ../hotel/select");

                endif;

            endif;

            if ($menu == 'checkin') :

                if ($_SESSION['hotel_id'] != null) :

                    $url = explode('/', $_GET['url']);
                    $room = end($url);

                    $access = is_numeric($room);
                    $full = $this->model('dashboardHotel_model')->checkRoom()['terisi'];

                    $ada = $this->model('dashboardHotel_model')->checkRoom();

                    if (is_numeric($room) && !$ada) {
                        echo "<script>alert('Room Tidak Ditemukan!'); document.location.href='../checkin'</script>";
                    }

                    if ($full) {
                        echo "<script>alert('Room Full!'); document.location.href='../checkin'</script>";
                    }

                    if ($access && $ada) :

                        $data = [
                            'company' => 'Tour Travel Agent',
                            'title' => 'Hotel Manager',
                            'active' => 'Daftar Hotel',
                            'submenu' => 'check in',
                            'hotels' => $this->model('dashboardHotel_model')->getData(),
                            'activeHotel' => $this->model('dashboardHotel_model')->singleHotel($_SESSION['hotel_id']),
                            'allrooms' => $this->model("dashboardHotel_model")->getDataAllRooms(),
                            'usedrooms' => $this->model('dashboardHotel_model')->getDataUsedRooms(),
                            'roomCheck' => $this->model('dashboardHotel_model')->checkRoom(),
                        ];

                        $data['roomAccess'] = true;
                        $data['selectedRoom'] = $room;

                        $this->view('HotelDashboard/templates/header', $data);
                        $this->view('HotelDashboard/templates/sidebar', $data);
                        $this->view('HotelDashboard/checkin', $data);
                        $this->view('HotelDashboard/templates/footer', $data);

                    else :

                        $data = [
                            'company' => 'Tour Travel Agent',
                            'title' => 'Hotel Manager',
                            'active' => 'Daftar Hotel',
                            'submenu' => 'check in',
                            'hotels' => $this->model('dashboardHotel_model')->getData(),
                            'activeHotel' => $this->model('dashboardHotel_model')->singleHotel($_SESSION['hotel_id']),
                            'allrooms' => $this->model("dashboardHotel_model")->getDataAllRooms(),
                            'usedrooms' => $this->model('dashboardHotel_model')->getDataUsedRooms(),
                            'roomCheck' => $this->model('dashboardHotel_model')->checkRoom(),
                            'roomAccess' => false,
                        ];


                        $this->view('HotelDashboard/templates/header', $data);
                        $this->view('HotelDashboard/templates/sidebar', $data);
                        $this->view('HotelDashboard/checkin', $data);
                        $this->view('HotelDashboard/templates/footer', $data);

                    endif;

                    if ($room == 'apply') :
                        if ($this->model("dashboardHotel_model")->checkin($_POST) > 0) :
                            if ($this->model("dashboardHotel_model")->checkinActive($_POST) > 0) :
                                echo "<script>alert('Check in berhasil!!'); document.location.href='../checkin'</script>";
                            endif;
                        else :
                            echo "<script>alert('Check in gagal!!'); document.location.href='../checkin'</script>";
                        endif;
                    endif;

                else :

                    header("Location: ../hotel/select");

                endif;

            endif;

            if ($menu == 'checkout') :

                if ($_SESSION['hotel_id'] != null) :

                    $url = explode('/', $_GET['url']);
                    $room = end($url);

                    $data = [
                        'company' => 'Tour Travel Agent',
                        'title' => 'Hotel Manager',
                        'active' => 'Daftar Hotel',
                        'submenu' => 'check out',
                        'hotels' => $this->model('dashboardHotel_model')->getData(),
                        'activeHotel' => $this->model('dashboardHotel_model')->singleHotel($_SESSION['hotel_id']),
                        'allrooms' => $this->model("dashboardHotel_model")->getDataAllRooms(),
                        'usedrooms' => $this->model('dashboardHotel_model')->getDataUsedRooms(),
                        'roomCheck' => $this->model('dashboardHotel_model')->checkRoomOut(),
                        // 'berisi' => $this->model('')
                    ];

                    // die(var_dump($data['roomCheck']));


                    // $hotel_id = $data['activeHotel']['hotel_id'];

                    // $data['guest'] = $this->model('dashboardHotel_model')->getActive($hotel_id, 107);

                    $this->view('HotelDashboard/templates/header', $data);
                    $this->view('HotelDashboard/templates/sidebar', $data);
                    $this->view('HotelDashboard/checkout', $data);
                    $this->view('HotelDashboard/templates/footer', $data);

                    if ($room == 'confirm') :
                        if ($this->model('dashboardHotel_model')->confirm() > 0) :
                            if ($this->model('dashboardHotel_model')->confirm2() > 0) :
                                echo "<script>alert('Check Out berhasil!!'); document.location.href='../checkout'</script>";
                            endif;
                        else :
                            echo "<script>alert('Check Out gagal!!'); document.location.href='../checkout'</script>";
                        endif;
                    endif;

                else :

                    header("Location: ../hotel/select");

                endif;



            endif;


            $url = explode('/', $_GET['url']);
            $room = end($url);

            if ($room == 'detail') :
                echo json_encode($this->model('dashboardHotel_model')->getActive($_POST['hotel_id'], $_POST['room_no']));
            endif;

        else :
            header("Location: ../../");
        endif;
    }

    public function details()
    {
        echo json_encode($this->model('dashboardHotel_model')->getActiveDesc($_POST['hotel_id'], $_POST['room_no']));
    }
}
