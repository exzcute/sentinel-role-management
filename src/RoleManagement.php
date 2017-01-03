<?php
namespace Exzcute\SentinelRoleManagement;

class RoleManagement
{
	public $permissions = array();

	public function __construct()
	{
		$this->view_path = null;
		$this->readonly = false;
	}
	
	public function loadPermissions($name, $permissions)
	{
		$this->permissions[$name] = $permissions;
	}

	public function loadView($view_path)
	{
		$this->view_path = $view_path;
	}

	public function setReadonly($data)
	{
		$this->readonly = (bool)$data;
	}

	public function style()
	{
		ob_start();
	    	if($this->view_path == null)
	    	{
	    		include( dirname ( __FILE__ ) . '/Views/style.css.php' );
	    	}else{
	    		include( $this->view_path );
	    	}
	    return ob_get_clean();
	}

	public function script()
	{
		ob_start();
	    	if($this->view_path == null)
	    	{
	    		include( dirname ( __FILE__ ) . '/Views/script.js.php' );
	    	}else{
	    		include( $this->view_path );
	    	}
	    return ob_get_clean();
	}

	public function render($name, $role, $readonly)
	{

		$permissions = $this->permissions[$name];
		$user_permis= @$role->permissions ? (array)$role->permissions : [];
		$readonly = $this->readonly;

	    ob_start();
	    	if($this->view_path == null)
	    	{
	    		include( dirname ( __FILE__ ) . '/Views/role-management.php' );
	    	}else{
	    		include( $this->view_path );
	    	}
	    return ob_get_clean();
	}

}