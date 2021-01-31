<?php
namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{

    protected $table = "blog";
    // private static $instancia;

    // private $id;
    // private $title;
    // private $blog;
    // private $imagen;
    // private $author;
    // private $tags;
    // private $created;
    // private $updated;

    // public static function getInstancia() {
    //     if (!isset(self::$instancia)) {
    //         $miClase = __CLASS__;
    //         self::$instancia = new $miClase;
    //     }
    //     return self::$instancia;
    // }

    // public function __clone() {
    //     trigger_error('La clonación no es permitida.', E_USER_ERROR);
    // }

    // public function guardarBD(){    //HACERLO ASI
    //     $this->query = "INSERT INTO blog (title, blog, imagen, author, tags) VALUES 
    //         (:title, :blog, :imagen, :author, :tags)";
    //     $this->parametros["title"] = $this->title;
    //     $this->parametros["blog"] = $this->blog;
    //     $this->parametros["imagen"] = $this->imagen;
    //     $this->parametros["author"] = $this->author;
    //     $this->parametros["tags"] = $this->tags;
    //     // $this->parametros["created"] = $this->created;
    //     // $this->parametros["updated"] = $this->updated;
    //     $this->get_results_from_query();
    //     $this->mensaje = 'Blog agregado exitosamente';
    // }
    // public function set(){

    // }
    // public function get(){

    // }
    // public function edit(){
        
    // }
    // public function delete(){
        
    // }
    // public function setTitle($title){
    //     $this->title = $title;
    // }
    // public function getTitle(){
    //     return $this->title;
    // }
    // public function setBlog($blog){
    //     $this->blog = $blog;
    // }
    // public function getBlog()
    // {
    //     return $this->blog;
    // }
    // public function setImagen($imagen){
    //     $this->imagen = $imagen;
    // }
    // public function getImagen()
    // {
    //     return $this->imagen;
    // }
    // public function setAuthor($author){
    //     $this->author = $author;
    // }
    // public function getAuthor()
    // {
    //     return $this->author;
    // }
    // public function setTags($tags){
    //     $this->tags = $tags;
    // }
    // public function getTags(){
    //     return $this->tags;
    // }
    // public function setCreated($created){
    //     $this->created = $created;
    // }
    // public function getCreated(){
    //     return $this->created;
    // }
    // public function setUpdated($uptaded){
    //     $this->uptaded = $uptaded;
    // }
    // public function getUpdated(){
    //     return $this->updated;
    // }
    
}
?>