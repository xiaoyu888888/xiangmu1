<?php

namespace frontend\controllers;
use Yii;

use yii\web\Controller;

use yii\db\query;

use yii\data\Pagination;

use frontend\models\Student;

use DfaFilter\SensitiveHelper;



class IndexController extends Controller
{
	 public $layout=false;
	 public $enableCsrfValidation=false;
	 public function actionIndex()
	
	{

			return $this->render('index.html');

	}


}



?>