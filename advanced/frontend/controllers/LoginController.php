<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\db\query;	

use  yii\web\Session;
class LoginController extends Controller{
	 public $layout=false;
	 public $enableCsrfValidation=false;

	public function actionLogin()
	{

		return $this->render('login');

	}
	public function actionLogin_do()
	{
		
		$query = new Query();

		$username=$_POST['username'];

		$pwd=$_POST['pwd'];

		$data=$query->select(['username'])->from('user')->all();
		
		if($username==$data[0]['username'])
		{
			$aa=$query->select(['pwd'])->from('user')->all();	
			if($pwd==$aa[0]['pwd'])
			{
				$session = Yii::$app->session;
				$session->set('username',$username);
				return $this->redirect('?r=demo/index');

			}
			else
			{

				echo '密码有误';die;
	
			}


		}
		else
		{

			echo '账户名有误';die;

		}
	

	}


}

?>