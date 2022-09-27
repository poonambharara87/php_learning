<?php
include '../../config.php';
class blogs{
    private $db;
    function __construct($db){
        $this->db = $db;
    }

    public function blogs_data_view($query){
        $stmt = $this->db->prepare($query); //refrence object
        $stmt->execute(); //to execute prepare statement
        return $stmt;

    }

    public function add_blog($blogFormData){

        $tittle = $blogFormData['tittle'];
        $description = $blogFormData['description'];
        $content = $blogFormData['content'];

        if(isset($_FILES['uploadFile'])){
    
            $filename = $_FILES['uploadFile']['name'];
            $tempname = $_FILES['uploadFile']['tmp_name'];
            $folder = "blogImgs/" . $filename;

            move_uploaded_file($tempname, $folder);
            // echo "<img height='100px' width='100px' src='$folder'>";
        }

        try{
            $stmt = $this->db->prepare("insert into blogs(blog_tittle, blog_description,
            blog_imgSource, content) values(:tittle, :description, :uploadFile, :content)");
            $stmt->bindparam(":tittle", $tittle);
            $stmt->bindparam(":description", $description);
            $stmt->bindparam(":uploadFile", $folder);
            $stmt->bindparam(":content", $content);
            $stmt->execute();
            // header("location:blogs.php");
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function edit_blog($editedBlogData){

        $id = $editedBlogData['id'];
        $tittle = $editedBlogData['tittle'];
        $description = $editedBlogData['description'];

        if(isset($_FILES['uploadFile'])){
    
            $filename = $_FILES['uploadFile']['name'];
            $tempname = $_FILES['uploadFile']['tmp_name'];
            $folder = "blogImgs/" . $filename;

            move_uploaded_file($tempname, $folder);
            // echo "<img height='100px' width='100px' src='$folder'>";
        }        
        $content = $editedBlogData['content']; 
        
        try{
            $query = "UPDATE blogs SET 
            blog_id=:id,
            blog_tittle=:tittle,
            blog_description=:descript,
            blog_imgSource=:folder,
            content=:content WHERE blog_id=:id LIMIT 1";
            $stmt = $this->db->prepare($query);
            $data = [
                ':id'      => $id,
                ':tittle' => $tittle,
                ':descript' => $description,
                ':folder' => $folder,
                ':content' => $content

            ];
            $query_executed = $stmt->execute($data);
            if($query_executed){
                header("location:blogs.php");
            }
            
        }catch(Exception $excep){
            $excep->getMessage();
        }
    }
  
    
    public function delete($id){

        $stmt = $this->db->prepare("delete from blogs where blog_id = :blog_id");
        $stmt->bindparam(":blog_id", $id);
        $stmt->execute();
        return true;
        
    }
}