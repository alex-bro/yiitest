<?php

/**
 * This is the model class for table "picture".
 *
 * The followings are the available columns in table 'picture':
 * @property integer $id
 * @property integer $book_id
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Book $book
 */
class Picture extends All
{

    public $icon; // атрибут для хранения загружаемой картинки статьи
    public $del_img; // атрибут для удаления уже загруженной картинки

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'picture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('book_id', 'required'),
            array('del_img', 'boolean'),
			array('book_id', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>255),
            array('icon', 'file',
                'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 5, // 5 MB
                'allowEmpty'=>'true',
                'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, book_id, image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'book' => array(self::BELONGS_TO, 'Book', 'book_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'book_id' => 'Книга',
			'image' => 'Картинка',
            'del_img'=>'Удалить картинку?',
            'book.name' => 'Имя книги',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('book_id',$this->book_id);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Picture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @return mixed
     */
    protected function beforeDelete(){
        if(isset($_GET['id'])) $id = $_GET['id'];
        $path = $_SERVER['DOCUMENT_ROOT'].self::model()->findByPk($id)->image;
        if(is_file($path)) unlink($path);
        return parent::beforeDelete();
    }
}
