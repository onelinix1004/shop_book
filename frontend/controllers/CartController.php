<?php
namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use frontend\components\Cart;
use backend\models\Product;

/**
 * CartController handles the cart-related actions in a Yii2 application.
 */
class CartController extends Controller
{
    /**
     * Overrides the default beforeAction method to disable CSRF validation for all actions in this controller.
     *
     * @param \yii\base\Action $action The action to be executed.
     * @return bool Whether the action should be executed.
     */
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Displays the cart index page with the current cart contents, total cost, and total items.
     *
     * @return string Rendered view of the cart index page.
     */
    public function actionIndex(){
        $cart = new Cart;
        $cartstore = $cart->cartstore;
        $cost = $cart->getCost();
        $total = $cart->getTotalItem();
        return $this->render('index', [
            'cartstore' => $cartstore,
            'cost' => $cost,
            'total' => $total
        ]);
    }

    /**
     * Adds a specified product to the cart with a given quantity.
     *
     * @param int $id The ID of the product to be added to the cart.
     * @return \yii\web\Response Redirects to the cart index page.
     */
    public function actionAddCart($id){
        $cart = new Cart;
        $data = Product::findOne(['id' => $id]);
        $post = Yii::$app->request->post();
        $quantity = $_POST['quantity'];
        $cart->add($data, $quantity);
        return $this->redirect(['index']);
    }

    /**
     * Removes a specified product from the cart.
     *
     * @param int $id The ID of the product to be removed from the cart.
     * @return \yii\web\Response Redirects to the cart index page.
     */
    public function actionRemove($id){
        $cart = new Cart;
        $cart->remove($id);
        return $this->redirect(['index']);
    }

    /**
     * Updates the quantity of a specified product in the cart.
     *
     * @param int $id The ID of the product to be updated in the cart.
     * @return \yii\web\Response Redirects to the cart index page.
     */
    public function actionUpdate($id){
        $cart = new Cart;
        $data = Product::findOne(['id' => $id]);
        $post = Yii::$app->request->post();
        $quantity = $_POST['quantity'];
        $cart->update($data, $quantity);
        return $this->redirect(['index']);
    }

    /**
     * Clears all items from the cart.
     *
     * @return \yii\web\Response Redirects to the cart index page.
     */
    public function actionClear(){
        $cart = new Cart;
        $cart->clear();
        return $this->redirect(['index']);
    }
}
?>
