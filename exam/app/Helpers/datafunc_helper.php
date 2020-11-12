<?php
use App\Models\CoreModel;

function test(){
    echo ("<script>alert('test')</script>");
}

 function autocomplete($table, $data=array(),$data_like){
   $model = new CoreModel();

    $str = "";
    for ($i=0; $i < count($data); $i++) {
      $str .= $data[$i].", ";
    }
    $params['like'] = $data_like;
    $params['select'] = $str;

    return $model->getData($params, $table);
  }


  function stockMovement($table, $data=array()){
    $model = new CoreModel();
    return $model->insertData($data, $table);
  }

  function stockChange($data){
    $model = new CoreModel();
    $params["where"] = array(
      "item_id" => $data["item_id"],
    );
    $qty = $model->getData($params, "stock")[0]["stock"];

    if ($data["is_add"]) {
      $data_to_input = array(
        "stock"=> $qty + $data["qty"]
      );
    }else {
      $data_to_input = array(
        "stock"=> $qty - $data["qty"]
      );
    }

    return $update = $model->updateData($data_to_input,$params["where"],"stock");
  }


  function getBatchNumber(){
    $model = new CoreModel();
    $hasbatch = (count($model->getData(array(),"batch")) == 0) ? true : false;
    if ($hasbatch) {
      $insert = $model->insertData(array("type"=>"inserted"), "batch");
      $batchNumber = $model->getLastDb();
    }else {
      $params['limit'] = 1;
      $params['offset'] = 0;
      $params['order'] = array('id', 'DESC');
      $batchNumber = $model->getData($params,"batch")[0]['id'];
    };

    return $batchNumber;
  }

  function setBatchNumber(){
    $model = new CoreModel();
    $insert = $model->insertData(array("type"=>"inserted"), "batch");
    $batchNumber = $model->getLastDb();

    return $batchNumber;
  }

  function sidebar_content($content = array()){
    $str = "";
    for ($i=0; $i < count($content); $i++) {
        $str .= '<li class="nav-item ">';
            $str .= '<a class="nav-link" href="'.$content[$i]['link'].'">';
                $str .= '<i class="'.$content[$i]['icon'].'"></i>';
                $str .= '<p>'.$content[$i]['text'].'</p>';
            $str .= '</a>';
        $str .= '</li>';
        if (in_array("childItem", $content)) {
          $str .= '<div class="collapse " id="componentsExamples">';
              $str .= '<ul class="nav">';
              foreach ($key->childItem as $keyS ) {
                $str .= '<li class="nav-item ">';
                    $str .= '<a class="nav-link" href="'.$keyS->link.'">';
                        $str .= '<i class="nc-icon nc-chart-pie-35"></i>';
                        $str .= '<p>'.$keyS->text.'</p>';
                    $str .= '</a>';
                $str .= '</li>';
              }
              $str .= '</ul>';
          $str .= '</div>';
        }
    }
    return $str;
  }

  function banner($title)
  {
    $str = '';
    $str .= '<div class="banner-inner">';
      $str .= '<div class="banner-title-inner">';
        $str .= '<h3 style="color:#ffffff">'.$title.'</h3>';
      $str .= '</div>';
    $str .= '</div>';
    $uri =  service('uri');
    if ($uri->getPath() != '/') {
      $str.= "<script>$('.navbar').hide()</script>";
    }
    return $str;

  }
?>
