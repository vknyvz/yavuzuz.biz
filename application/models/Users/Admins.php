<?php
class Model_Users_Admins extends Model_DbTable_Abstract
{
    protected $_name = 'users_admins';
	protected $_primary	= 'userId';
    
	/**
	 * reference map info
	 * 
	 * @var array
	 */
	protected $_referenceMap    = array(
        'Admin' => array(
            'columns'           => array('userId'),
            'refTableClass'     => 'Model_Admin_Users',
            'refColumns'        => array('userId')
        )
    );	   

	/**
	 * update a user's permissions
	 * 
	 * @params int $userId
	 * @params array $data
	 */
	public function update($userId, $data) 
	{
		$where = $this->getAdapter()->quoteInto('userId = ?', $userId);
		
		parent::update($data, $where);
	}	

	/**
	 * delete a user
	 *
	 * @param int $userId
	 */	
	public function delete($userId)
	{
		$where = $this->getAdapter()->quoteInto('userId = ?', $userId);
		
		parent::delete($where);
	}
}