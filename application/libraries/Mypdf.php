<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;


class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'portrait')
    {
        define("DOMPDF_ENABLE_REMOTE", false);
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->setPaper($paper, $orientation);
        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
}

/* End of file Mypdf.php */
