<?php

namespace app\controllers;

use app\models\AccessRule;
use app\models\Coche;
use app\models\Persona;
use app\models\Usuario;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'coches'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['coches'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return date('d-m') < '31-12';
                        }
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ]
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSaluda($get = "<h1>Tutorial Yii</h1>"){
        $mensaje = "Hola mundo";
        $numeros = [0,1,2,3,4,5];
        return $this->render("saluda",
            [
                "saluda" => $mensaje,
                "array" => $numeros,
                "get" => $get, // Ponzoña asquerosa que genera XSS
            ]);
    }

    public function actionFormulario($mensaje = null){
        return $this->render("formulario", ["mensaje" => $mensaje]);
    }

    public function actionRequest(){
        $mensaje = null;
        if (isset($_REQUEST ["nombre"])){

            $mensaje = "Bien, has enviado tu nomber correctamente: " . $_REQUEST["nombre"];
        }
        $this-> redirect(["site/formulario","mensaje" => $mensaje]);
    }

    public function actionCoches() {
        $user = Persona::find()->where(['nombre' => 'asd'])->All();
        $coches = Coche::find()->where(['nombre' => 'ferrari'])-> All();
        return $this->render('coches', [
            'user' => $user,
            'coche' => $coches
        ]);
    }
}
