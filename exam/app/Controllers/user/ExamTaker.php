<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;


class ExamTaker extends BaseController
{
  use ResponseTrait;
  protected $request;

  public function index(){
    return $this->loadLayout('content/examinee/index', array());
  }

  public function take($id){
    $params['where'] = array("exam.id" => $id);
    $params['join'] = array(
       array(
         "table" => "question",
         "on" => "question.exam_id = exam.id"
       ),
    );
    $data['data'] = $this->model->getData($params, "exam");

    $params1['where'] = array(
      "exam_id" => $id,
      "user_id" => 2
    );
    $data['has_taken'] = (count($this->model->getData($params1, "result")) == 0) ? false : true ;
    if ($data['has_taken']) {
      $data['result'] = $this->model->getData($params1, "result")[0]['result'];
      $data['result_perc'] = ($data['result'] / count($data['data'])) * 100;
      $data['examinee'] = json_decode($this->model->getData($params1, "result")[0]['result_ans']);
    }
    return $this->loadLayout('content/examinee/taker', $data);
  }

  public function gradeExam(){
    if ($this->request->isAjax()) {
      $params['where'] = array("exam.id" => $this->request->getPost('exam_id'));
      $params['join'] = array(
         array(
           "table" => "question",
           "on" => "question.exam_id = exam.id",
           "type"=>"left"
         ),
      );
      $data = $this->model->getData($params, "exam");
      $score = 0;$i=1;
      $answers = [];
      $examinee_answers = [];
      foreach ($data as $key) {
        $title = 'choice' . $i;
        if ($key['answer'] == $this->request->getPost($title)) {
          $score = $score+1;
        }
        array_push($answers,$key['answer']);
        array_push($examinee_answers,$this->request->getPost($title));

        $i++;
      }
      $total = ($score / count($data)) * 100;

      $data_arr = array(
        "exam_id" => $this->request->getPost("exam_id"),
        "user_id" => 2,
        "result"  => $score,
        "did_pass" =>($total >= $data[0]['passing'])?1:0,
        "result_ans" => json_encode($examinee_answers)
      );
      $insert = $this->model->insertData($data_arr,'result');
      $result = array(
        "score" => $score,
        "array" => $answers,
        "did_pass"=> ($total >= $data[0]['passing'])?true:false,
        "rate" => $total,
        "total_q"=>count($data),
        "data"=>$data
      );
      return $this->respond($result, 200);
    }
  }



}


?>
