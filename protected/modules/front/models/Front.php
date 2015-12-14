<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.12.15
 * Time: 11:30
 */

class Front extends All {

    public static function getBookAll($id){
        $book = array();
        $modelBook = Book::model()->findByPk($id);
        $book['name'] = $modelBook->name;
        $book['date'] = $modelBook->date;
        $modelAuthor = Author::model()->findByPk($modelBook->author_id);
        $book['author'] = $modelAuthor->name;
        $modelPublisher = Publishing::model()->findByPk($modelAuthor->publishing_id);
        $book['publisher'] = $modelPublisher->name;
        $modelCategory = Category::model()->findByPk($modelBook->category_id);
        $book['category'] = $modelCategory->name;
        $criteria = new CDbCriteria();
        $criteria->compare('book_id', $modelBook->id);
        $bookPicture = Picture::model()->findAll($criteria);
        $book['pictures'] = array();
        foreach($bookPicture as $pic){
            $book['pictures'][]= $pic->image;
        }
        return $book;
    }

    public static function getBooksAll(){
        $criteria = new CDbCriteria([]);
        $pages=new CPagination(Book::model()->count($criteria));
        $pages->pageSize=4;
        $pages->applyLimit($criteria);

        $model = Book::model()->findAll($criteria);
        $books = array();
        foreach($model as $item){
            $books[] = self::getBookAll($item->id);
        }
        return $books;
    }

    public static function getCategory(){

    }
}