<?php
use jenga\db\Models\Model;
use jenga\db\Models\MongoModel;
use jenga\db\fields as f;

/**
 * Either require_once or define your models here
 */
class User extends Model {
	
	public $table_name = 'users';
	
	public function __construct() {
		parent::__construct();
		$this->username = new CharField();
		$this->password = new CharField();
	}
}

class Comment extends Model {

	public $post = array('ForeignKey', 'model'=>'Post');
	public $user = array('ForeignKey', 'model'=>'User', 'null'=>false, 'blank'=>false);
	public $title = array('CharField', 'max_length'=>100);
	public $body = 'TextField';
	
	public $_meta = array('table_name'=>'comment');
}

class Post extends Model {
	
	public $blog = array(f\ForeignKey, 'model'=>'Blog');
	public $title = array(f\TextField);
	public $categories = array(f\ManyToMany, 'model'=>'Category');
}

class Blog extends Model {
	
	public $name = 'CharField';
}

class Category extends Model {
	
	public $name = 'CharField';
}

class Site extends Model {
	
	public $name = array(f\CharField, 'default'=>'iCandy Clothing');
	public $description = array(f\TextField);
	
	public $has_rendered = false;
}

class MongoPost extends MongoModel {
	
	public $blog = array(f\ForeignKey, 'model'=>'MongoBlog');
	public $title = array(f\TextField);
	public $categories = array(f\ManyToMany, 'model'=>'Category');
}

class MongoBlog extends MongoModel {
	
	public $name = array(f\CharField);
}