<?php

namespace frontend\controllers;

use Yii;

use yii\web\Controller;

use yii\db\query;

class ZhouController extends Controller
{
 	 public $layout=false;
	 public $enableCsrfValidation=false;

	 public function actionRegister()
	 {

	 	return $this->render('register');

	 }
	 public function actionRegister_do()
	 {
	 	$data= $_POST;
	 	$re= Yii::$app->db->createCommand()->insert('shouji',$data)->execute();
	 	if($re)
	 	{

	 		return $this->redirect('?r=zhou/ye');

	 	}

	 }
	 public function actionRegister_f()
	 {
	 	return $this->render('register_f');

	 }
	 public function actionYe()
	 {
	 	return $this->render('ye');

	 }
	 public function actionYe_do()
	 {

	 	return $this->render('ye_do');

	 }

	 public function actionRegister_n()
	 {
	 	$data= $_POST;
	 	$re= Yii::$app->db->createCommand()->insert('name',$data)->execute();
	 	if($re)
	 	{

	 		return $this->redirect('?r=zhou/xq');

	 	}

	 }
	 public function actionXq()
	 {


	 	$query= new Query();

	 	$data= $query->select('*')->from(array('xq'))->all();


	 	return $this->render('xq',['data'=>$data]);

	 }





}

?>