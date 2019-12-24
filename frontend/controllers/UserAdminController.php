<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\AuthAssignment;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class UserAdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view', 'create', 'update', 'delete'],
                'rules' => [                   
                    [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin']
                    ]                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $request = Yii::$app->request->post();

        $model = new User();

        if(isset($request['User']))
        {
            $request = $request['User'];
            $model->username = $request['username'];
            $model->email = $request['email'];
            $model->status = 10;
            $model->created_at = time();
            $model->updated_at = time();

            $model->setPassword($request['password']);
            $model->generateAuthKey();           

            $auth = new authAssignment();
            $auth->item_name = $request['rol'];
            $auth->user_id = $model->id;
            $auth->created_at = time();
            $auth->save(); 
           
            if($model->save())
            {
                $searchModel = new UserSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,                    
                ]);
            }
        }         

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request->post();        
        
        $model = User::findOne($id);
        
        if(isset($request['User'])){
            $request = $request['User'];
            $model->username = $request['username'];
            $model->email = $request['email'];
            $model->status = 10;        
            $model->updated_at = time();
    
            $model->setPassword($request['password']);
            $model->generateAuthKey();
            
            $auth = authAssignment::find()->where(['user_id' => $model->id])->all();
            
            foreach($auth as $value)
            {
                $value->delete();
            }

            $auth = new authAssignment();
            $auth->item_name = $request['rol'];
            $auth->user_id = $model->id;
            $auth->created_at = time();
            $auth->save();           
    
            if($model->save())
            {
                $searchModel = new UserSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,                    
                ]);
            }
        }  

        return $this->render('update', [
            'model' => $model            
        ]);
    }

    public function actionDelete($id)
    {      

        $model = User::findOne($id)->delete();

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,                    
        ]);
    }
}