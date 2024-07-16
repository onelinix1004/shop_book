<?php
namespace frontend\components;

use Yii;

/**
 * Class Cart
 */
class Cart
{
	public $cartstore;

	public function __construct()
	{
		// Kiểm tra và khởi tạo giỏ hàng trong phiên làm việc nếu chưa tồn tại
		if (!Yii::$app->session->has('cart')) {
			Yii::$app->session->set('cart', []);
		}

		$this->cartstore = Yii::$app->session->get('cart');
	}

	/**
	 * Thêm sản phẩm vào giỏ hàng
	 *
	 * @param object $data Sản phẩm
	 * @param int $quantity Số lượng
	 */
	public function add($data, $quantity)
	{
		if (isset($data->id)) {
			if (isset($this->cartstore[$data->id])) {
				$this->cartstore[$data->id]->quantity += $quantity;
			} else {
				$data->quantity = $quantity;
				$this->cartstore[$data->id] = $data;
			}
			Yii::$app->session['cart'] = $this->cartstore;
		}
	}

	/**
	 * Xóa sản phẩm khỏi giỏ hàng
	 *
	 * @param int $product_id ID sản phẩm
	 */
	public function remove($product_id)
	{
		if (isset($product_id) && isset($this->cartstore[$product_id])) {
			unset($this->cartstore[$product_id]);
			Yii::$app->session['cart'] = $this->cartstore;
		}
	}

	/**
	 * Xóa toàn bộ giỏ hàng
	 */
	public function clear()
	{
		$this->cartstore = [];
		Yii::$app->session['cart'] = $this->cartstore;
	}

	/**
	 * Cập nhật số lượng sản phẩm trong giỏ hàng
	 *
	 * @param object $data Sản phẩm
	 * @param int $quantity Số lượng
	 */
	public function update($data, $quantity)
	{
		if (isset($data->id)) {
			if (isset($this->cartstore[$data->id])) {
				$this->cartstore[$data->id]->quantity = $quantity;
				Yii::$app->session['cart'] = $this->cartstore;
			}
		}
	}

	/**
	 * Tính tổng giá trị của giỏ hàng
	 *
	 * @return float Tổng giá trị
	 */
	public function getCost()
	{
		$cost = 0;
		if ($this->cartstore) {
			foreach ($this->cartstore as $item) {
				$cost += $item->quantity * $item->price;
			}
		}
		return $cost;
	}

	/**
	 * Tính tổng số lượng sản phẩm trong giỏ hàng
	 *
	 * @return int Tổng số lượng
	 */
	public function getTotalItem()
	{
		$total = 0;
		if ($this->cartstore) {
			foreach ($this->cartstore as $item) {
				$total += $item->quantity;
			}
		}
		return $total;
	}
}


 ?>

