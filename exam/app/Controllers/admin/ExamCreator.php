<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

class ExamCreator extends BaseController
{
  use ResponseTrait;
  protected $request;

  public function index(){
    return $this->loadLayout('content/exam/index', array());
  }

  public function addExamUrl(){
    return $this->loadLayout('content/exam/addExam', array());
  }

  public function examanduser(){
    return $this->loadLayout('content/exam/userScore', array());
  }

  public function addExam(){
    if ($this->request->isAjax()) {
      $data = array(
        "title" =>$this->request->getPost("title"),
        "description"=>$this->request->getPost("description"),
        "passing"=>$this->request->getPost("score")
      );
      $insert = $this->model->insertData($data,"exam");
      $lastid = $this->model->getLastID();
      for ($i=0; $i < count($this->request->getPost("question")); $i++) {
        $title = "choice" . ($i+1);
        $data_question = array(
          "answer" =>$this->request->getPost("answer")[$i],
          "choices"=>json_encode($this->request->getPost($title)),
          "question"=>$this->request->getPost("question")[$i],
          "exam_id" => $lastid
        );
        $insert = $this->model->insertData($data_question,"question");
      }
      return $this->respond($insert, 200);
    }
  }

  public function viewThisExam($id){
    $params['where'] = array("exam.id" => $id);
    $params['join'] = array(
       array(
         "table" => "question",
         "on" => "question.exam_id = exam.id"
       ),
    );
    $data['data'] = $this->model->getData($params, "exam");

    return $this->loadLayout('content/exam/viewExam', $data);
  }

  public function updateExam()
  {
    if ($this->request->isAjax()) {
      $where = array(
        "id" => $this->request->getPost("id")
      );
      $data = array(
        "title" =>$this->request->getPost("title"),
        "description"=>$this->request->getPost("description"),
        "passing"=>$this->request->getPost("score")
      );
      $insert = $this->model->updateData($data,$where,"exam");
      $q_id = explode(',',$this->request->getPost('question_delete'));
      for ($i=0; $i < count($q_id); $i++) {
        $data = array(
          "id" => $q_id[$i]
        );
        $this->model->deleteData($data,'question');
      }
      for ($i=0; $i < count($this->request->getPost("question")); $i++) {
        $title = "choice" . ($i+1);

        if (isset($this->request->getPost("q-id")[$i]) && $this->request->getPost("q-id")[$i] != "null") {
          $data_question = array(
            "answer" =>$this->request->getPost("answer")[$i],
            "choices"=>json_encode($this->request->getPost($title)),
            "question"=>$this->request->getPost("question")[$i],
          );
          $where_question = array(
            'id' => $this->request->getPost("q-id")[$i]
          );
          $insert = $this->model->updateData($data_question,$where_question,"question");
        }else {
          $data_question = array(
            "answer" =>$this->request->getPost("answer")[$i],
            "choices"=>json_encode($this->request->getPost($title)),
            "question"=>$this->request->getPost("question")[$i],
            "exam_id" => $this->request->getPost("id")
          );
          $insert = $this->model->insertData($data_question,"question");
        }
      }
      return $this->respond($this->request->getPost(), 200);
    }
  }

  public function editThisExam($id){
    $params['where'] = array("exam.id" => $id);
    $params['join'] = array(
       array(
         "table" => "question",
         "on" => "question.exam_id = exam.id"
       ),
    );
    $data['data'] = $this->model->getData($params, "exam");

    return $this->loadLayout('content/exam/editexam', $data);
  }

  public function viewExamsAdmin(){
    if ($this->request->isAjax()) {
      $params['where'] = array("exam.is_deleted"=>0);
      $params['select'] = "exam.id,exam.title,exam.description,exam.passing,exam.is_deleted,result.result";
      $params['limit'] = $this->request->getPost("per_page");
      $params['order'] = array('id', 'ASC');
      $params['offset'] = ($this->request->getPost("offset") != 0) ? ($params['limit']*$this->request->getPost("offset")):0;
      $params['join'] = array(
         array(
           "table" => "result",
           "on" => "result.exam_id = exam.id",
           "type" => "left"
         ),
      );
      $data = $this->model->getData($params, "exam");
      $params1['where'] = array("is_deleted"=>0);
      $data_lock = count($this->model->getData($params1, "exam"));
      $return = array(
        'tableReturn' => $data,
        'totalTable' =>ceil($data_lock / $params['limit']),
      );
      return $this->respond($return,200);
    }
  }

  public function viewExamsScore(){
    if ($this->request->isAjax()) {
      $params['select'] = "exam.id,exam.title,exam.description,exam.passing,exam.is_deleted,result.result,result.did_pass,user_info.first_name,user_info.last_name";
      $params['limit'] = $this->request->getPost("per_page");
      $params['order'] = array('id', 'ASC');
      $params['offset'] = ($this->request->getPost("offset") != 0) ? ($params['limit']*$this->request->getPost("offset")):0;
      $params['join'] = array(
         array(
           "table" => "exam",
           "on" => "exam.id = result.exam_id",
           "type" => "left"
         ),
         array(
           "table" => "user_info",
           "on" => "user_info.user_credentials = result.user_id",
           "type" => "left"
         ),
      );
      $data = $this->model->getData($params, "result");
      $params1['where'] = array("is_deleted"=>0);
      $data_lock = count($this->model->getData($params1, "exam"));
      $return = array(
        'tableReturn' => $data,
        'totalTable' =>ceil($data_lock / $params['limit']),
      );
      return $this->respond($return,200);
    }
  }

  public function removeExam()
  {
    $where = array(
      "id" => $this->request->getPost('id')
    );
    $data= array(
      "is_deleted" => 1
    );
    $update = $this->model->updateData($data,$where, "exam");
    return $this->respond($update, 200);
  }
}


?>
