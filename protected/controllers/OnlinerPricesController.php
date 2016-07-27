<?php

class OnlinerPricesController extends Controller
{
    public $layout='//layouts/column2';

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Yii::app()->clientScript->registerPackage('main');
            return true;
        }
        return false;
    }

    public function actionIndex()
    {

        $dataProvider = new CActiveDataProvider(
            'OnlinerItems',
            array(
                'pagination' => false,
                'criteria' => array(
                    'order' => 'sort ASC, id DESC'
                )
            )
        );
        $this->render(
            'index',
            array(
                'dataProvider' => $dataProvider,
            )
        );
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id)
    {
        if($id)
            $model = $this->loadModel($id);
        else
            $model = new OnlinerItems();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['OnlinerItems']))
        {
            $model->attributes=$_POST['OnlinerItems'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }


    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MyText the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=OnlinerItems::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}