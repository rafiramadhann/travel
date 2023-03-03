<?php
session_start();
error_reporting(0);


class Paket extends Controller
{
    public function index($slug = '')
    {
        if ($slug == '') :
            $data = [
                'title' => 'Daftar Paket',
                'active' => 'Daftar Paket',
                'daerah' => $this->model('paket_model')->getAllDaerah(),
                'user' => $this->model('user_model')->getByEmail($_SESSION['data'])
            ];

            $this->view('Templates/header', $data);
            $this->view('Paket/index', $data);
            $this->view('Templates/footer');

        else :

            $data = [
                'title' => 'Detail Paket',
                'active' => 'Daftar Paket',
                'slug' => $slug,
                'daerah' => $this->model('paket_model')->getAllDaerah(),
                'user' => $this->model('user_model')->getByEmail($_SESSION['data']),
                'pakets' => $this->model('paket_model')->getData(),
                'paket' => $this->model('paket_model')->getByDaerah($slug)
            ];

            $this->view('Templates/header', $data);
            $this->view('Paket/index2', $data);
            $this->view('Templates/footer');

        endif;
    }

    public function detail()
    {
        echo json_encode($this->model('paket_model')->seeDetail($_POST['slug']));
    }

    public function manage($menu = '')
    {

        if (isset($_SESSION['user']) && $_SESSION['type'] > 0) :

            $_SESSION['paket_id'] = null;
            if ($menu == '') :

                $data = [
                    'company' => 'Tour Travel Agent',
                    'title' => 'Paket Manager',
                    'active' => 'Daftar Paket',
                    'allPaket' => $this->model("paket_model")->getData(),
                    'daerah' => $this->model('paket_model')->getAllDaerah(),
                ];

                $this->view('PaketDashboard/Templates/header', $data);
                $this->view('PaketDashboard/Templates/sidebar', $data);
                $this->view('PaketDashboard/index', $data);
                $this->view('PaketDashboard/Templates/footer');

            endif;

            if ($menu == 'update') :

                $_SESSION['paket_id'] = $_POST['paket_id'];

                $data = [
                    'company' => 'Tour Travel Agent',
                    'title' => 'Paket Manager',
                    'active' => 'Daftar Paket',
                    'allPaket' => $this->model("paket_model")->getData(),
                    'daerah' => $this->model('paket_model')->getAllDaerah(),
                    'paket' => $this->model("paket_model")->getById($_POST),
                ];

                $_SESSION['paket_name'] = $data['paket']['name'];

                $this->view('PaketDashboard/Templates/header', $data);
                $this->view('PaketDashboard/Templates/sidebar', $data);
                $this->view('PaketDashboard/update', $data);
                $this->view('PaketDashboard/Templates/footer');

            endif;

            if ($menu == 'switch') :

                header("Location: ../manage");

            endif;

            if ($menu == 'add') :

                if ($this->model('paket_model')->add($_POST) > 0) :
                    echo "<script>alert('Paket berhasil ditambahkan!'); document.location.href='../manage'</script>";
                else :
                    echo "<script>alert('Paket gagal ditambahkan!'); document.location.href='../manage'</script>";
                endif;

            endif;

            if ($menu == 'up') :

                if ($this->model('paket_model')->update($_POST) > 0) :

                    echo "<script>alert('Paket berhasil diubah!'); document.location.href='../manage'</script>";
                else :
                    echo "<script>alert('Paket gagal diubah!'); document.location.href='../manage'</script>";
                endif;

            endif;

        else :

            header("Location: ../");

        endif;
    }

    public function drop()
    {

        if ($this->model("paket_model")->drop($_POST) > 0) :
            echo "<script>alert('Paket berhasil dihapus!'); document.location.href='../paket/manage'</script>";
        else :
            echo "<script>alert('Paket gagal dihapus!'); document.location.href='../paket/manage'</script>";
        endif;
    }
}
