<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Css extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('database');
    }

    public function index(){
        $this->load->view('home');
    }

    public function members(){
        $this->load->view('members');
    }

    public function comment_suggestion(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('include/header1');
            $year = $this->input->get('year');
            $month = $this->input->get('month');

            $form = $this->database->cssComment($year,$month);
            $this->load->view('commentPdf',['form' => $form]);
        }
        else
            redirect('css');
    }

    public function staff_filter(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('include/header1');
            $this->load->view('staff_filter');
        }
        else
            redirect('css');
    }

    public function staff_rendered(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('include/header1');
            $year = $this->input->get('year');
            $month = $this->input->get('month');
            $division = $this->input->get('division');

            $form = $this->database->cssDivision($division,$year,$month);
            $this->load->view('staff_rendered',['form' => $form]);
        }
        else
            redirect('css');
    }

    public function commentFilter(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('include/header1');
            $this->load->view('commentFilter');
        }
        else
            redirect('css');
    }

    public function purpose_others(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('include/header1');
            $year = $this->input->get('year');
            $month = $this->input->get('month');

            $form = $this->database->cssPurpose($year,$month);
            $this->load->view('purpose_others',['form' => $form]);
        }
        else
            redirect('css');
    }

    public function purposeFilter(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('include/header1');
            $this->load->view('purposeFilter');
        }
        else
            redirect('css');
    }

    public function table(){
        $this->load->view('table');
    }

    public function register(){
        $this->load->view('register');
    }

    public function ajax(){
        $this->load->view('ajax');
    }

    public function db(){
        $this->load->view('db');
    }

    public function cssAdd(){
        $this->database->cssAdd();
        //header("refresh:0;url=survey");
    }

    public function survey(){
        $sectionAll = $this->database->section();
        $this->load->view('survey',[
            "sectionAll" => $sectionAll
        ]);
    }

    public function thankyou(){
        if(isset($_SESSION['ok'])){
            $this->load->view('thankyou');
        }
        else
            redirect('css');
    }

    public function form(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('form');
        }
        else
            redirect('css');
    }

    public function formWeb(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('formWeb');
        }
        else
            redirect('css/LoginPage');
    }

    public function formValidation(){
        $this->load->view('formValidation');
    }

    public function pdf(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('pdf');
        }
        else
            redirect('css/LoginPage');
    }

    public function LoginPage(){
        $this->load->view('LoginPage');
        if(isset($_SESSION['user']))
            redirect('css/user');
        elseif(isset($_SESSION['superuser']))
            redirect('css/admin');
    }

    public function view(){
        $_SESSION['userappr']=$this->database->userappr();
        if(isset($_SESSION['superuser']))
            $this->load->view('view');
        else
            redirect('css/LoginPage');
    }

    public function userlist(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('userlist');
        }
        else
            redirect('css/LoginPage');
    }

    public function user(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('user');
        }
        else
            redirect('css/LoginPage');
    }

    public function admin(){
        if(isset($_SESSION['superuser'])){
            $this->load->view('admin');
        }
        else
            redirect('css/LoginPage');
    }

    public function archievedsection(){
        $_SESSION['sections']=$this->database->section();
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('archievedsection');
        }
        else
            redirect('css/LoginPage');
    }

    public function archieveddivision(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('archieveddivision');
        }
        else
            redirect('css/LoginPage');
    }

    public function archievedregion(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('archievedregion');
        }
        else
            redirect('css/LoginPage');
    }

    public function archievednegative(){
        if(isset($_SESSION['user']) or isset($_SESSION['superuser'])){
            $this->load->view('archievednegative');
        }
        else
            redirect('css/LoginPage');
    }

    public function reportsection(){
        $_SESSION['sections']=$this->database->section();
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('reportsection');
        }
        else
            redirect('css/LoginPage');
    }

    public function reportdivision(){
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('reportdivision');
        }
        else
            redirect('css/LoginPage');
    }

    public function ro7_select(){
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('ro7_select');
        }
        else
            redirect('css/LoginPage');
    }

    public function ro7_report(){
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('ro7_report');
        }
        else
            redirect('css/LoginPage');
    }

    public function reportregional(){
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('reportregional');
        }
        else
            redirect('css/LoginPage');
    }

    public function sectionweb(){
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('sectionweb');
        }
        else
            redirect('css/LoginPage');
    }

    public function generateweb(){
        if(isset($_SESSION['superuser']) or isset($_SESSION['user'])){
            $this->load->view('generateweb');
        }
        else
            redirect('css/LoginPage');
    }

    public function LoginAccess(){
        $uname=$_POST['username'];
        $pword=$_POST['password'];
        $_SESSION['wew']=$this->database->section();
        $row=$this->database->login($uname,$pword);
        if($row['username']==$uname and $row['userpassword']==$pword and $row['userstat']==1 and $row['usertype']==1){
            $_SESSION['prepname']=$row['userfname'].' '.$row['usermname'].'. '.$row['userlname'];
            $_SESSION['preppos']=$row['userposition'];
            $_SESSION['fname']=$row['userfname']; $_SESSION['mname']=$row['usermname']; $_SESSION['lname']=$row['userlname'];
            $_SESSION['section']=$row['usersection'];
            $_SESSION['division']=$row['userdivision'];
            $_SESSION['superuser']=true;
            $_SESSION['user']=null;
            redirect('css/admin');
        }
        elseif($row['username']==$uname and $row['userpassword']==$pword and $row['userstat']==1 and $row['usertype']==0)
        {
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['prepname']=$row['userfname'].' '.$row['usermname'].'. '.$row['userlname'];
            $_SESSION['preppos']=$row['userposition'];
            $_SESSION['fname']=$row['userfname']; $_SESSION['mname']=$row['usermname']; $_SESSION['lname']=$row['userlname'];
            $_SESSION['section']=$row['usersection'];
            $_SESSION['division']=$row['userdivision'];
            $_SESSION['superuser']=null;
            $_SESSION['user']=true;
            redirect('css/user');
        }
        elseif($row['username']==$uname and $row['userpassword']==$pword and $row['userstat']==0){
            $_SESSION['stat']=true;
            redirect('css/LoginPage');
        }
        else{
            $_SESSION['error']=true;
            redirect('css/LoginPage');
        }
    }

    public function update(){
        $id=$_POST['id'];
        $row=$this->database->userid($id);
        $stat=$row['userstat'];
        if($stat==0)
            $stats++;
        else
            $stats--;
        if($this->database->userupdate($stats,$id)){
            redirect('css/view');
        }
    }

    public function registerSave(){
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $sec=$_POST['sec'];
        $div=$this->database->deptdivision($_POST['sec']);
        $pos=$_POST['pos'];
        $uname=$_POST['uname'];
        $pword=$_POST['pword'];
        $type=0;
        $stat=1;
        $this->database->useradd($fname,$mname,$lname,$sec,$div['division'],$pos,$uname,$pword,$type,$stat);
        redirect('css/LoginPage');
    }

    public function logout(){
        session_regenerate_id();
        session_destroy();
        redirect('css');
    }
}

