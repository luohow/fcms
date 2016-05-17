<?php

namespace apps\admin\models;
!defined( 'APP_ROOT' ) && exit( 'Direct Access Deny!' );

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\SoftDelete;
use enums\SystemEnums;

/**
 * 商品销售总量统计表
 * @author Carey
 *
 */
class StatGoodsSale extends Model{
	/**
	 *
	 * @var integer
	 */
	public $id;
	
	/**
	 *
	 * @var string
	 */
	public $addtime;
	
	/**
	 *
	 * @var string
	 */
	public $uptime;
	
	/**
	 *
	 * @var integer
	 */
	public $delsign;
	
	/**
	 *
	 * @var string
	 */
	public $descr;
	
	
	/**
	 * @var int
	 */
	public $goods_total;
	
	/**
	 * @var int
	 */
	public $unit;
	
	/**
	 * @var string
	 */
	public $p_time;
	
	public function columnMap()
	{
		return array(
				'id'          => 'id',
				'addtime'     => 'addtime',
				'uptime'      => 'uptime',
				'delsign'     => 'delsign',
				'descr'       => 'descr',
				'goods_total' => 'goods_total',
				'unit' 		  => 'unit',
				'p_time'      => 'p_time',
		);
	}
	
	public function initialize()
	{
		$this->useDynamicUpdate( true );
		
		$this->addBehavior( new SoftDelete( array(
            'field' => 'delsign',
            'value' => SystemEnums::DELSIGN_YES,
        ) ) );
		
		$this->setSource( 'stat_sales_goods' );
	}
	
}

?>