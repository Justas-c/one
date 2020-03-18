<?php
//namespace App\Controllers;
namespace App\Controllers\Admin;
use App\Core\View;

class BlogC extends \App\Controllers\Authenticated
{

    // Adds blogPost to database
    public function addPost(){
        // redirect to login
        if (!isset($_SESSION['admin_id'])){
            $this->redirect('admin/adminC/aLogin');
        }
        // if data posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // init adminModel
            $this->adminModel = new \App\Models\adminM;

            // Sanitize
            foreach($_POST as $key => $value){
                $postdata[$key] = htmlspecialchars($value);
            }
            // write to db
            $this->adminModel->createBlogPost($postdata);

            // redirect to post and add message
            $this->redirect('admin/BlogC/idvBlogPost?id');
            //http://localhost/one/admin/BlogC/idvBlogPost?id=14
        }

        // message(img video buttons not working)
        \App\Flash::addMessage('Please note: The upload img/video buttons has not been yet implemented', \App\Flash::WARNING);

        // default
        $data['pageTitle'] = 'add BlogPost';
        View::render('blog/addBlogPostV', $data);
    }

    // Blog Index
    public function blogIndex(){
        //models
        $this->model = new \App\Models\AdminM;
        $this->KelionesM = new \App\Models\KelionesM;
        //sidebarnums for sidebar
        $data['sidebarNums']  = $this->KelionesM->getHolidayNums();
        //get all posts
        $data['allBlogPosts'] = $this->model->allBlogPosts();
        //View
        View::render('blog/blogIndexV', $data);
    }

    // Individual blogPost
    public function idvBlogPost() {
        $model = new \App\Models\adminM;
        $data['IdvBlogPost'] = $model->getBlogPostById($_GET['id']);
        View::render('blog/idvPost', $data);
    }









}
