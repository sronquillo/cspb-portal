<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use Input;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('welcome');
    }

    public function announcements() {
        $announcement = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
//                ->join('is_readTB', 'announcementNotif.anID', '=', 'is_readTB.announcementID')
                ->where('announcementNotif.is_approved', '=', 1)
                ->where('announcementNotif.type', '=', 0)
                ->where('announcementNotif.status', '=', 1)
                ->where('announcementNotif.recipient_userLevel', '=', 0)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);
        return view('announcements', compact('announcement'));
    }

    public function view_announcement($anID) {
//        $user=Auth::user()->IDno;
        $view_announcement = DB::table('announcementNotif')
                ->join('users', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.anID', '=', $anID)
                ->simplePaginate(1);
//        DB::table('is_readTB')->where ('IDno', $user)->where ('announcementID', $anID)
//            ->update (['is_read'=>1]);
        return view('view_announcement', compact('view_announcement'));
    }

    public function notifications() {
        $userLevel = Auth::user()->userLevel;
        $notification = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.is_approved', '=', 1)
                ->where('announcementNotif.type', '=', 1)
                ->where('announcementNotif.status', '=', 1)
                ->where('announcementNotif.recipient_userLevel', '=', $userLevel)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);

        return view('notifications', compact('notification'));
    }

    public function allnotifications() {
        $notification = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.type', '=', 1)
                ->where('announcementNotif.status', '=', 1)
                ->where('announcementNotif.is_approved', '=', 1)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);

        return view('update_notifications', compact('notification'));
    }

    public function allapprovednotifications() {
        $notification = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.type', '=', 1)
                ->where('announcementNotif.status', '=', 1)
                ->where('announcementNotif.is_approved', '=', 1)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);

        return view('update_notifications', compact('notification'));
    }

    public function grades() {

        $user = Auth::user()->IDno;
        $grade = DB::Select("Select *, AVG(g.q1+g.q2+g.q3+g.q4)/4 as avg from users as u, grades as g where u.IDno = g.IDno and u.IDno like '$user' and g.is_approved=1 group by g.gID order by g.subjectName ");
        $userInfo = DB::table('users')->where('IDno', $user)->first();

        return view('grades', compact('grade', 'userInfo'));
    }

    public function viewgradeslist() {

        $input = $_POST['IDno'];
        $grade = DB::Select("select * from users where concat_ws(' ',IDno, firstname, lastname, section) like '%$input%' and userLevel=1 order by firstname ASC, lastname ASC;");
        $userInfo = DB::table('users')->where('IDno', $input)->first();

        if (count($grade) == null) {

            return view('viewgrades');
        } else {

            return view('gradelist', compact('grade', 'userInfo'));
        }
    }

    public function modifyGrades($input) {

        $grade = DB::Select("Select *, AVG(g.q1+g.q2+g.q3+g.q4)/4 as avg from users as u, grades as g where u.IDno = g.IDno and u.IDno like '$input' group by g.gID order by g.subjectName ");
        $userInfo = DB::table('users')->where('IDno', $input)->first();


        return view('modifygrades', compact('grade', 'userInfo'));
    }

    public function addGrades() {

        $subject = $_POST['subject'];
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $IDno = $_POST['IDno'];
        $select = DB::table('grades')->where('IDno', $IDno)->where('subjectName', $subject)->get();
        if (count($select) == 0) {
            DB::table('grades')->insertGetId([
                'IDno' => $IDno,
                'subjectName' => $subject,
                'q1' => $q1,
                'q2' => $q2,
                'q3' => $q3,
                'q4' => $q4,
                'is_approved' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function viewgrades($input) {

        $grade = DB::Select("Select *, AVG(g.q1+g.q2+g.q3+g.q4)/4 as avg from users as u, grades as g where u.IDno = g.IDno and u.IDno like '$input' and g.is_approved=1 group by g.gID order by g.subjectName ");
        $userInfo = DB::table('users')->where('IDno', $input)->first();

        if (count($grade) == null) {

            return view('viewgrades');
        } else {

            return view('gradesview', compact('grade', 'userInfo'));
        }
    }

    public function viewuserslist() {

        $input = $_POST['IDno'];
        $user = DB::Select("select * from users where concat_ws(' ',IDno, firstname, lastname, section) like '%$input%' order by firstname ASC, lastname ASC;");

        if (count($user) == null) {

            return view('users');
        } else {

            return view('userlist', compact('user'));
        }
    }

    public function viewusers($input) {


        $user = DB::Select("select * from users where concat_ws(' ',IDno, firstname, lastname, section) like '%$input%' limit 0, 1;");

        if (count($user) == null) {

            return view('users');
        } else {

            return view('userview', compact('user'));
        }
    }

    public function modusers($input) {


        $user = DB::Select("select * from users where concat_ws(' ',IDno, firstname, lastname, section) like '%$input%' limit 0, 1;");

        if (count($user) == null) {

            return view('users');
        } else {

            return view('moduser', compact('user'));
        }
    }

    public function submit() {


        $target_dir = "upload-images/";
        $filename = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $recipient = $_POST['recipient'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $is_approved = $_POST['is_approved'];
        $status = $_POST['status'];
        $type = $_POST['type'];
        $action = $_POST['action'];

        $creator_IDno = Auth::user()->IDno;

        DB::table('announcementNotif')->insertGetId([
            'creator_IDno' => $creator_IDno,
            'recipient_userLevel' => $recipient,
            'subject' => $subject,
            'message' => $message,
            'image' => $filename,
            'is_approved' => $is_approved,
            'status' => $status,
            'type' => $type,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return redirect()->action($action);
    }

    public function update_announcement($anID) {

        $update_announcement = DB::table('announcementNotif')
                ->join('users', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.anID', '=', $anID)
                ->simplePaginate(1);

        return view('updateannouncements', compact('update_announcement'));
    }

    public function approved_announcement($anID) {

        $update_announcement = DB::table('announcementNotif')
                ->join('users', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.anID', '=', $anID)
                ->simplePaginate(1);

        return view('approvedannouncements', compact('update_announcement'));
    }

    public function delete_announcement($anID) {

        DB::table('announcementNotif')
                ->where('anID', $anID)
                ->update([
                    'status' => 0
        ]);

        return redirect('home');
    }

    public function delete_notification($anID) {

        DB::table('announcementNotif')
                ->where('anID', $anID)
                ->update([
                    'status' => 0
        ]);

        return redirect('view/notifications');
    }

    public function update_notification($anID) {

        $update_announcement = DB::table('announcementNotif')
                ->join('users', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.anID', '=', $anID)
                ->simplePaginate(1);

        return view('updatenotifications', compact('update_announcement'));
    }

    public function approved_notification($anID) {

        $update_announcement = DB::table('announcementNotif')
                ->join('users', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.anID', '=', $anID)
                ->simplePaginate(1);

        return view('approvednotifications', compact('update_announcement'));
    }

    public function update() {

        $target_dir = "upload-images/";
        //$filename = basename($_FILES["fileToUpload"]["name"]);
        if (($_FILES["fileToUpload"]["size"]) == 0) {
            $filename = $_POST ['imagedefault'];
        } else {
            $filename = basename($_FILES["fileToUpload"]["name"]);
        }
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $recipient = $_POST['recipient'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $is_approved = $_POST['is_approved'];
        //$status = $_POST['status'];
        $type = $_POST['type'];
        $anID = $_POST['anID'];
        $action = $_POST['action'];

        $creator_IDno = Auth::user()->IDno;

        DB::table('announcementNotif')
                ->where('anID', $anID)
                ->update([
                    'recipient_userLevel' => $recipient,
                    'subject' => $subject,
                    'message' => $message,
                    'image' => $filename,
                    'is_approved' => $is_approved,
                    'type' => $type,
                    'created_at' => date('Y-m-d H:i:s')
        ]);

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return redirect()->action($action);
    }

    public function pending_announcement() {
        $announcement = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.is_approved', '=', 0)
                ->where('announcementNotif.type', '=', 0)
                ->where('announcementNotif.status', '=', 1)
                ->where('announcementNotif.recipient_userLevel', '=', 0)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);
        return view('pending_announcement', compact('announcement'));
    }

    public function pending_notification() {
        $notification = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
                ->where('announcementNotif.is_approved', '=', 0)
                ->where('announcementNotif.type', '=', 1)
                ->where('announcementNotif.status', '=', 1)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);
        return view('pending_notification', compact('notification'));
    }

    public function confirmModifyGrades() {

        $IDno = $_POST['IDno'];
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $subject = $_POST['subject'];

        DB::table('grades')
                ->where('IDno', $IDno)
                ->where('subjectName', $subject)
                ->update([
                    'q1' => $q1,
                    'q2' => $q2,
                    'q3' => $q3,
                    'q4' => $q4,
                    'is_approved' => 0
        ]);
        return redirect()->back();
    }

    public function lockGrades() {

        $IDno = $_POST['IDno'];
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $subject = $_POST['subject'];

        DB::table('grades')
                ->where('IDno', $IDno)
                ->where('subjectName', $subject)
                ->update([
                    'q1' => $q1,
                    'q2' => $q2,
                    'q3' => $q3,
                    'q4' => $q4,
                    'is_approved' => 1
        ]);
        return redirect()->back();
    }

    public function unlockGrades() {

        $IDno = $_POST['IDno'];

        $subject = $_POST['subject'];

        DB::table('grades')
                ->where('IDno', $IDno)
                ->where('subjectName', $subject)
                ->update([
                    'is_approved' => 0
        ]);
        return redirect()->back();
    }

    public function allUnlockGrades() {

        DB::Select("update grades set is_approved=0");

        return view('welcome');
    }

    public function modifyuser() {
        $x_id = $_POST['id'];
        $x_IDno = $_POST['IDno'];
        $x_firstname = $_POST['firstname'];
        $x_middlename = $_POST['middlename'];
        $x_lastname = $_POST['lastname'];
        $x_department = $_POST['department'];
        $x_level = $_POST['level'];
        $x_section = $_POST['section'];
        $x_email = $_POST['email'];
        $x_address = $_POST['address'];
        $x_contactno = $_POST['contactno'];
        DB::table('users')->where('id', $x_id)->where('email', $x_email)
                ->update(['firstname' => $x_firstname,
                    'middlename' => $x_middlename,
                    'lastname' => $x_lastname,
                    'department' => $x_department,
                    'level' => $x_level,
                    'section' => $x_section,
                    'address' => $x_address,
                    'contactno' => $x_contactno]);
        return redirect()->back();
    }

}
