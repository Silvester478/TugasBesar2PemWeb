<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mastercv;
use App\Models\Mastercveducation;
use App\Models\Mastercvexperience;
use App\Models\Mastercvskill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelGenerator extends BaseController
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
        $spreadsheet = new Spreadsheet();
        $dummy_variable = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B5', 'Tanggal Lahir')
                    ->setCellValue('B6', 'No Telepon')
                    ->setCellValue('B7', 'Email')
                    ->setCellValue('B8', 'Alamat')
                    ->setCellValue('B10', 'Description')
                    ->setCellValue('B12', 'Experiences')
                    ->setCellValue('B13', 'Perusahaan')
                    ->setCellValue('B14', 'jabatan')
                    ->setCellValue('B15', 'Tanggal Mulai')
                    ->setCellValue('B16', 'Tanggal Selesai')
                    ->setCellValue('B17', 'Description')
                    ->setCellValue('B19', 'Skill')
                    ->setCellValue('B21', 'Educations')
                    ->setCellValue('B22', 'Nama Institusi')
                    ->setCellValue('B23', 'Jurusan')
                    ->setCellValue('B24', 'Tanggal Mulai')
                    ->setCellValue('B25', 'Tanggal Selesai');

        $profile = $this->cv->find($cvId);
        $skills = $this->skill->where(['master_cv_id' => $cvId])->findAll();
        $experiences = $this->experiences->where(['master_cv_id' => $cvId])->findAll();
        $educations = $this->educations->where(['master_cv_id' => $cvId])->findAll();

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('B2', $profile['name'])
                        ->setCellValue('B3', $profile['title'])
                        ->setCellValue('C5', $profile['date_of_birth'])
                        ->setCellValue('C6', $profile['phone'])
                        ->setCellValue('C7', $profile['email'])
                        ->setCellValue('C8', $profile['address'])
                        ->setCellValue('C10', $profile['description']);

        $index_exp = 2;
        foreach($experiences as $experience) {
            $col_exp = substr($dummy_variable, $index_exp, 1);         
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue( $col_exp.'13', $experience['company_name'])
                        ->setCellValue( $col_exp.'14', $experience['title'])
                        ->setCellValue( $col_exp.'15', $experience['start_date'])
                        ->setCellValue( $col_exp.'16', $experience['end_date'])
                        ->setCellValue( $col_exp.'17', $experience['description']);  
            $index_exp++;
        }

        $skill_string = "";  
        foreach($skills as $skill) {                
            $skill_string .= "-> ".$skill['name']."\n";
        }
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue( 'B20', $skill_string);
                        $spreadsheet->getActiveSheet()->getStyle('B20')->getAlignment()->setWrapText(true);

        $index_edu = 2;
       foreach($educations as $education) {                
            $col_edu = substr($dummy_variable, $index_edu, 1);         
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue( $col_edu."22", $education['name'])
                            ->setCellValue( $col_edu."23", $education['title'])
                            ->setCellValue( $col_edu."24", $education['start_date'])
                            ->setCellValue( $col_edu."25", $education['end_date']); 
            $index_edu++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'CV';
                    
    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');

        }
    }