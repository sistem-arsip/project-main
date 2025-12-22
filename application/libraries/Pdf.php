<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    protected $dompdf;

    public function __construct() {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Times New Roman');

        $this->dompdf = new Dompdf($options);
    }

    public function load_view($view, $data = [], $filename = 'laporan.pdf') {
        $CI =& get_instance();
        $html = $CI->load->view($view, $data, true);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream($filename, ['Attachment' => true]);
    }
}
