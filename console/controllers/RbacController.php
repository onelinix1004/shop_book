<?php 
namespace console\controllers;
use yii\console\Controller;
use Yii;

/**
* 
*/
class RbacController extends Controller
{
	public function actionInit(){
		$auth = Yii::$app->authManager;
        //$auth->removeAll();
        
        // add "createPost" permission
        $viewOrders = $auth->createPermission('viewOrders');
        $viewOrders->description = 'Xem đơn hàng';
        $auth->add($viewOrders);

        // add "updatePost" permission
        $deleteOrders = $auth->createPermission('deleteOrders');
        $deleteOrders->description = 'Xóa đơn hàng';
        $auth->add($deleteOrders);

        // add "updatePost" permission
        $indexOrders = $auth->createPermission('indexOrders');
        $indexOrders->description = 'Xem danh sách đơn hàng';
        $auth->add($indexOrders);

        // add "updatePost" permission
        $updateOrders = $auth->createPermission('updateOrders');
        $updateOrders->description = 'Cập nhật đơn hàng';
        $auth->add($updateOrders);



        $viewOrdersItem = $auth->createPermission('viewOrdersItem');
        $viewOrdersItem->description = 'Xem thực đơn đã orders';
        $auth->add($viewOrdersItem);

        // add "updatePost" permission
        $deleteOrdersItem = $auth->createPermission('deleteOrdersItem');
        $deleteOrdersItem->description = 'Xóa thực đơn đã orders';
        $auth->add($deleteOrdersItem);

        // add "updatePost" permission
        $indexOrdersItem = $auth->createPermission('indexOrdersItem');
        $indexOrdersItem->description = 'Xem danh sách thực đơn đã Orders';
        $auth->add($indexOrdersItem);

        // add "updatePost" permission
        $updateOrdersItem = $auth->createPermission('updateOrdersItem');
        $updateOrdersItem->description = 'Cập nhật đơn hàng';
        $auth->add($updateOrdersItem);

        // add "createPost" permission
        $viewContact = $auth->createPermission('viewContact');
        $viewContact->description = 'Xem liên hệ';
        $auth->add($viewContact);

        // add "updatePost" permission
        $deleteContact = $auth->createPermission('deleteContact');
        $deleteContact->description = 'Xóa liên hệ';
        $auth->add($deleteContact);

        // add "updatePost" permission
        $indexContact = $auth->createPermission('indexContact');
        $indexContact->description = 'Xem danh sách liên hệ';
        $auth->add($indexContact);

        // add "updatePost" permission
        $updateContact = $auth->createPermission('updateContact');
        $updateContact->description = 'Cập nhật đơn hàng';
        $auth->add($updateContact);

        // add "author" role and give this role the "viewOrders" permission
        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $auth->addChild($manager, $viewOrders);
        $auth->addChild($manager, $deleteOrders);
        $auth->addChild($manager, $updateOrders);
        $auth->addChild($manager, $indexOrders);

        $auth->addChild($manager, $viewOrdersItem);
        $auth->addChild($manager, $deleteOrdersItem);
        $auth->addChild($manager, $updateOrdersItem);
        $auth->addChild($manager, $indexOrdersItem);

        $auth->addChild($manager, $viewContact);
        $auth->addChild($manager, $deleteContact);
        $auth->addChild($manager, $updateContact);
        $auth->addChild($manager, $indexContact);


        // add "createPost" permission
        $viewCategory = $auth->createPermission('viewCategory');
        $viewCategory->description = 'Xem Category';
        $auth->add($viewCategory);

        // add "updatePost" permission
        $deleteCategory = $auth->createPermission('deleteCategory');
        $deleteCategory->description = 'Xóa đơn hàng';
        $auth->add($deleteCategory);

        // add "updatePost" permission
        $indexCategory = $auth->createPermission('indexCategory');
        $indexCategory->description = 'Xem danh sách đơn hàng';
        $auth->add($indexCategory);

        // add "updatePost" permission
        $updateCategory = $auth->createPermission('updateCategory');
        $updateCategory->description = 'Cập nhật đơn hàng';
        $auth->add($updateCategory);

        // add "updatePost" permission
        $createCategory = $auth->createPermission('createCategory');
        $createCategory->description = 'Cập nhật đơn hàng';
        $auth->add($createCategory);


        // add "createPost" permission
        $viewProduct = $auth->createPermission('viewProduct');
        $viewProduct->description = 'Xem đơn hàng';
        $auth->add($viewProduct);

        // add "updatePost" permission
        $deleteProduct = $auth->createPermission('deleteProduct');
        $deleteProduct->description = 'Xóa đơn hàng';
        $auth->add($deleteProduct);

        // add "updatePost" permission
        $indexProduct = $auth->createPermission('indexProduct');
        $indexProduct->description = 'Xem danh sách đơn hàng';
        $auth->add($indexProduct);

        // add "updatePost" permission
        $updateProduct = $auth->createPermission('updateProduct');
        $updateProduct->description = 'Cập nhật đơn hàng';
        $auth->add($updateProduct);

        // add "updatePost" permission
        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Cập nhật đơn hàng';
        $auth->add($createProduct);


        $viewUser = $auth->createPermission('viewUser');
        $viewUser->description = 'Xem đơn hàng';
        $auth->add($viewUser);

        // add "updatePost" permission
        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = 'Xóa đơn hàng';
        $auth->add($deleteUser);

        // add "updatePost" permission
        $indexUser = $auth->createPermission('indexUser');
        $indexUser->description = 'Xem danh sách đơn hàng';
        $auth->add($indexUser);

        // add "updatePost" permission
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Cập nhật đơn hàng';
        $auth->add($updateUser);

        // add "updatePost" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Cập nhật đơn hàng';
        $auth->add($createUser);



        


        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $auth->addChild($admin, $viewCategory);
        $auth->addChild($admin, $deleteCategory);
        $auth->addChild($admin, $updateCategory);
        $auth->addChild($admin, $indexCategory);
        $auth->addChild($admin, $createCategory);

        $auth->addChild($admin, $viewProduct);
        $auth->addChild($admin, $deleteProduct);
        $auth->addChild($admin, $updateProduct);
        $auth->addChild($admin, $indexProduct);
        $auth->addChild($admin, $createProduct);

        $auth->addChild($admin, $viewUser);
        $auth->addChild($admin, $deleteUser);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $indexUser);
        $auth->addChild($admin, $createUser);

        
        $auth->addChild($admin, $manager);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($manager, 3);
        $auth->assign($admin, 1);
	}
	
}


 ?>