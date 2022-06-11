<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mastercv;
use App\Models\Mastercveducation;
use App\Models\Mastercvexperience;
use App\Models\Mastercvskill;
use Dompdf\Dompdf;

class PdfGenerator extends BaseController
{
    protected $cv;
    protected $skill;
    protected $experiences;
    protected $educations;

    public function __construct()
    {
        $this->cv = new Mastercv();
        $this->skill = new Mastercvskill();
        $this->experiences = new Mastercvexperience();
        $this->educations = new Mastercveducation();
    }

    public function index($cvId)
    {
        $dompdf = new Dompdf();

        $data = [
            'profile' => $this->cv->find($cvId),
            'skills' => $this->skill->where(['master_cv_id' => $cvId])->findAll(),
            'experiences' => $this->experiences->where(['master_cv_id' => $cvId])->findAll(),
            'educations' => $this->educations->where(['master_cv_id' => $cvId])->findAll()
        ];
        // var_dump($data);
        // return 0;
        // return view('cv-pdf', $data);
        $dompdf->loadHtml(view('cv/cv-pdf', $data));

        $dompdf->set_option('isRemoteEnabled', true);

        // render html as PDF
        $dompdf->render();
        $dompdf->stream("cv_$cvId.pdf", array("Attachment" => 0));
        exit(0);

        // output the generated pdf
        $dompdf->stream("cv_$cvId");
    }
}