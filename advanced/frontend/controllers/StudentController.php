<?php

namespace frontend\controllers;

use Yii;

use yii\web\Controller;

use yii\db\query;

use yii\data\Pagination;

use frontend\models\Student;

use DfaFilter\SensitiveHelper;

class StudentController extends Controller
{
 	 public $layout=false;
	 public $enableCsrfValidation=false;

	public function actionIndex()
	{
		$query = new Query();

	$data=$query->select('*')->from(array('zhuce'))->all();
	

		return $this->render('index',['data'=>$data]);

	}
	public function actionAdd()
	{



		return $this->render('add');

	}
	public function actionAdd_do()
	{
		$arr=$_POST;

		$re = Yii::$app->db->createCommand()->insert('zhuce', $arr)->execute();
		if($re)
		{

			return $this->redirect('?r=student/index');

		}
	}
	public function actionDel()
	{

		$id= $_GET['id'];

		$re= Yii::$app->db->createCommand()->delete('zhuce', ['id' => $id])->execute();
		if($re)
		{

			return $this->redirect('?r=student/index');

		}
	}
	public function actionXiu()
	{

		$id= $_GET['id'];	

		$query = new Query();

		$arr=$query->select('*')->from('zhuce')->where('id="'.$id.'"')->one();

		return $this->render('xiu',['arr'=>$arr]);

	}
	public function actionXiu_do()
	{

		$id= $_POST['id'];
		$name=$_POST['name'];
		$moren=$_POST['moren'];
		$ziduan=$_POST['ziduan'];
		$x_one=$_POST['x_one'];
		$x_two=$_POST['x_two'];
		$status=$_POST['status'];	
		$yz=$_POST['yz'];
		$l_one=$_POST['l_one'];
		$l_two=$_POST['l_two'];
		$re=Yii::$app->db->createCommand()->update('zhuce', ['name' => $name,'moren' => $moren,'ziduan' => $ziduan,'x_one' => $x_one,'x_two' => $x_two,'status' => $status,'yz' => $yz,'l_one' => $l_one,'l_two' => $l_two],'id=:id',[':id'=>$id])->execute();
		if($re)
		{

		return 	$this->redirect('?r=student/index'); 
		
		}

	}


}

?>