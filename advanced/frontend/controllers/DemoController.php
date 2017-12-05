<?php
namespace frontend\controllers;

use Yii;

use yii\web\Controller;

use yii\db\query;

use yii\data\Pagination;

use frontend\models\Student;

use DfaFilter\SensitiveHelper;

class DemoController extends Controller
{	
	 public $layout=false;
	 public $enableCsrfValidation=false;

	public function actionIndex()
	{


		$model= new Student();

		// $pagination =new Pagination([
		// 	'defaultPageSize'=>2,
		// 	'totalCount'=>$model->find()->count()
		// ]);

		// $res = $model->find()
		// 			 ->offset($pagination->offset)
		// 			 ->limit($pagination->limit)
		// 			 ->asArray()
		// 			 ->all();
		// return $this->render('index',['res'=>$res,'pagination'=>$pagination]);
		$query = $model->find();  
        $countQuery = clone $query; 
        $pageSize = 3;  
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => $pageSize]);  
        $res = $query->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
		
        return $this->render('index', [  
            'res' => $res,  
            'pages' => $pages,  
        ]);  

	}
	public function actionAdd()
	{
		return $this->render('add');

	}
	public function actionAdd_do()

	{
		$wordData = array(
    			'小宇',
    			'拆迁灭',
    			'车牌隐',
    			'成人电',
   			 	'成人卡通',
			);
		$name=$_POST['name'];
      $name = SensitiveHelper::init()->setTree($wordData)->replace($name, '***');
		$sex=$_POST['sex'];
	  $sex = SensitiveHelper::init()->setTree($wordData)->replace($sex, '***');
		$arr=['name'=>$name,'sex'=>$sex];
		
		$re = Yii::$app->db->createCommand()->insert('student', $arr)->execute();
		if($re)
		{
			return $this->redirect('?r=demo/index');
		}
	}
	public function actionDel()
	{
		$id=$_GET['id'];
		$res=Yii::$app->db->createCommand()->delete('student', ['id' => $id])->execute();
		if($res)
		{
			return $this->redirect('?r=demo/index');

		}

	}
	public function actionXiu()
	{
		$id=$_GET['id'];
		$query = new Query();

		$arr=$query->select('*')->from('student')->where('id="'.$id.'"')->one();

		return $this->render('xiu',['arr' => $arr]);

	}
	public function actionXiugai()
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$sex=$_POST['sex'];

		$res = Yii::$app->db->createCommand()->update('student', ['name' => $name,'sex' => $sex],'id=:id',[':id'=>$id])->execute();

		if($res)
		{
			return $this->redirect('?r=demo/index');
			
		}
	}




}

?>