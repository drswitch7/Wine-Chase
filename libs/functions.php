<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '512M');

@session_start();
@$er='';
include "dbplayer.php";

function myException($e) {
    $users='';
    $m='Error generated by ['.$users. '] on '.date('(D) d-M-Y').PHP_EOL;
    $m.='FILE:: '.$e->getFile().PHP_EOL;
    $m.='LINE:: '.$e->getLine().PHP_EOL;
    $m.='ERROR MESSAGE:: '.$e->getMessage().PHP_EOL. PHP_EOL;
    $pat=LOCALPAT.'errlog/uncaughterror'.date('d-m-y').'.txt';
    file_put_contents($pat, $m, FILE_APPEND | LOCK_EX);
}
set_exception_handler('myException');

class conn{
    protected $db;      
    function __construct(){
        $sd=new connect;
        $this->db=$sd->con('projects_charity');
    }

    function logerror($e,$users){
        $m='Error generated by ['.$users.'] on ['.date('D-M-Y').'] '.PHP_EOL;
        $m.='FILE:: '.$e->getFile().PHP_EOL;
        $m.='LINE:: '.$e->getLine().PHP_EOL;
        $m.='ERROR MESSAGE:: '.$e->getMessage().PHP_EOL.PHP_EOL;
        $pat=LOCALPAT.'errlog/usererror'.date('d-m-y').'.txt';
        file_put_contents($pat, $m, FILE_APPEND | LOCK_EX);
    }
}


class Utilities extends conn{

    public function Chg_Gender($a){
        if($a==1){echo 'MALE';}elseif($a==2){echo 'FEMALE';}
    }

    function Chg_Drink($a){
        if($a==1){echo '1 - 5';}
        elseif($a==2){echo '6 - 10';}
        elseif($a==3){echo '11 and above';}
    }

    function Chg_Goal($a){
        if($a==1){echo 'Stop drinking altogether';}
        elseif($a==2){echo 'Cut down number of drinks per day';}
        elseif($a==3){echo "I'm not sure what my goal is at this point";}
    }


    function CallCategory(){
        $sel= $this->db->query("SELECT * FROM submenu WHERE status=1");
        if($sel->rowCount()>0){ 
            $ft= $sel->fetchAll(PDO::FETCH_OBJ); 
            return $ft;
        }
    }


    function Chg_Category($cat){ 
         $a= $this->db->quote($cat,PDO::PARAM_STR);
         $sel= $this->db->query("SELECT * FROM submenu WHERE (id=$a || category=$a) LIMIT 1");
        if($sel->rowCount()>0){ 
            $ft= $sel->fetch(PDO::FETCH_OBJ); 
            return $ft;
        }
    }

     function Chag_QuestID($id){
        try{
        $sel= $this->db->query("SELECT * FROM questions WHERE id='$id'");
            if($sel->rowCount()>0){ 
            $ft= $sel->fetch(PDO::FETCH_OBJ); 
            return $ft;
        }else{ throw new Exception('NO RESULT FOUND!');}
    }catch(PDOException $e){ throw new Exception( $e->getMessage());}
    }

    public function create_Member(){
        $this->db->query("CREATE TABLE IF NOT EXISTS member(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,name VARCHAR(150),email VARCHAR(50),acex TEXT,dname VARCHAR(30),sex INT(1),dob VARCHAR(15),amt VARCHAR(10), rate INT(1), goal INT(1), img TEXT,dated DATETIME,stage INT(1) NOT NULL DEFAULT 0, status INT(1))");
        $this->db->query("CREATE TABLE IF NOT EXISTS loginrec(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,user VARCHAR(50),attempttime TIMESTAMP,status INT(1),sessid VARCHAR(40),logintime TIMESTAMP,failed INT NOT NULL, logouttime TIMESTAMP)");
        $this->db->query("ALTER TABLE loginrec ADD UNIQUE(user)");
        $this->db->query("CREATE TABLE IF NOT EXISTS bacalculator( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, wh INT(3),kga VARCHAR(3),hrs VARCHAR(5),hg INT(3),user VARCHAR(50) ,cal VARCHAR(10),dated DATETIME,status INT(1));");
        $this->db->query("CREATE TABLE IF NOT EXISTS forum_reply(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, fid INT(3),user VARCHAR(50),reply TEXT,dated DATETIME,status INT(1))");
    }

    public function Create_AdminEnd(){
        $this->db->query("CREATE TABLE IF NOT EXISTS admin (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,`uname` VARCHAR(60) DEFAULT NULL,`email` VARCHAR(50) DEFAULT NULL,`fname` VARCHAR(150) DEFAULT NULL,`sex` VARCHAR(6) NULL,`fone` VARCHAR(12) DEFAULT NULL,`acex` text,`icode` TEXT, `pl` INT(1)NULL DEFAULT '1', img TEXT,`addon` DATETIME NOT NULL, `admin` VARCHAR(50) NULL,`stage` INT(1) NULL DEFAULT '0', `status` INT(1) NOT NULL DEFAULT '1')");
        $this->db->query("CREATE TABLE IF NOT EXISTS questions(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, adby VARCHAR(30), cat INT(1) NOT NULL, content TEXT, tint VARCHAR(80), dated DATETIME, status INT(1) NOT NULL)");
        $this->db->query("CREATE TABLE IF NOT EXISTS feedback(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,msg TEXT,user VARCHAR(50), stage INT(1) DEFAULT 0,dated TIMESTAMP,status INT(1) NOT NULL)");
        $this->db->query("CREATE TABLE IF NOT EXISTS feedback_reply(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,msgid INT(4) NOT NULL,msg TEXT,user VARCHAR(50),stage INT(1) DEFAULT 0,dated TIMESTAMP,status INT(1) NOT NULL)");
        $this->db->query("CREATE TABLE IF NOT EXISTS questions_ans(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,qstid INT(4) NOT NULL,cat INT(3) NOT NULL, user VARCHAR(50),dated TIMESTAMP,status INT(1) NOT NULL)");
        $this->db->query("CREATE TABLE IF NOT EXISTS submenu(id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY, category VARCHAR(50),  status INT(1) NOT NULL)");
         }

} 
 
  class UserEnd extends conn{
/////// CREATE ANA ACCOUNT
    function Joinus($name,$email,$pass,$dname,$sex,$dob,$amt,$rate,$goal,$nob){
        $a=$this->db->quote($name,PDO::PARAM_STR);
        $b=$this->db->quote(strtolower($email),PDO::PARAM_STR);
        $c=$this->db->quote(password_hash($pass, PASSWORD_DEFAULT),PDO::PARAM_STR);
        $d=$this->db->quote(strtolower($dname),PDO::PARAM_STR);
        $e=$this->db->quote($sex,PDO::PARAM_STR);
        $f=$this->db->quote($dob,PDO::PARAM_STR);
        $g=$this->db->quote($amt,PDO::PARAM_STR);
        $h=$this->db->quote($rate,PDO::PARAM_STR);
        $i=$this->db->quote($goal,PDO::PARAM_STR);
        $nob=$this->db->quote($nob,PDO::PARAM_STR);
        $table= new Utilities;
        $table->create_Member();
        if($sex==1){$gen='http://localhost/charity/img/avatar/m.png';}elseif($sex==2){$gen='http://localhost/charity/img/avatar/f.png';}
        if($this->db->query("SELECT * FROM member WHERE (email=$b || dname=$d)")->rowCount()<=0){
            $this->db->query("INSERT INTO member(name,email,acex,dname,sex,dob,amt,rate,goal,img,nob,dated,status)VALUES($a,$b,$c,$d,$e,$f,$g,$h,$i,'$gen',$nob,NOW(),1)");
            return 'ACCOUNT CREATED SUCCESSFULLY<br/>LOGIN TO CONTINUE';
        }else{ throw new exception('duplicate entry found <b>('.$dname.') and ('.$email.')</b>
            <br/><small style="margin-top:-10px">please cross check carefully</small>'); }
    }
//// GET SINGLE USER
    function GetSingle($user){
        try{
            $a=$this->db->quote($user,PDO::PARAM_STR);
        $sel= $this->db->query("SELECT * FROM member WHERE dname=$a LIMIT 1");
        if($sel->rowCount()>0){ 
            $ft= $sel->fetch(PDO::FETCH_OBJ); 
            return $ft;
        }else{ throw new Exception('NO OBJECT FOUND!');}
    }catch(PDOException $e){ throw new Exception( $e->getMessage().' GET SINGLE DETAILS!');}
    }
//// UPLOAD OR CHANGE AVARTA (IMAGE)
    function UploadAvarta($user,$img){
       $a=$this->db->quote($user,PDO::PARAM_STR);
       $b=$this->db->quote($img,PDO::PARAM_STR);
       $this->db->query("UPDATE member SET img=$b,stage=1 WHERE dname=$a");
       header('Location:'.SERVERPAT);
    }

//// BACalculator        
    function CalculateBAC($a,$b,$c,$d,$e){
        $sex= UserEnd::GetSingle($e)->sex;
        if($sex==1){ $r='0.68';}elseif($sex==2){$r='0.55';}
        $ag=14*$d; 
        $tbw= $a*1000*$r; 
        $tall= $ag/$tbw*100;
        $htkn= $c*0.015;
        $altoga= $tall-$htkn;
        $final= substr($altoga,0,4);
        if($this->db->query("UPDATE bacalculator SET status=0 WHERE user='$e'")){
        $sel=$this->db->query("INSERT INTO bacalculator(wh,kga,hrs,hg,user,cal,dated,status)VALUES('$a','$b','$c','$d','$e','$final',NOW(),1)");
        return 'RECORD SAVED AND CALCULATED<BR/>PLEASE CHECK BELOW TO SEE YOUR RESULT';
    }
}

////// MATCH BAC BY FETCHING RESULT TO USER
    function MatchResult($user){
        $a=$this->db->quote($user,PDO::PARAM_STR);
        try{
    $sel= $this->db->query("SELECT * FROM bacalculator WHERE user=$a AND status=1");
        if($sel->rowCount()>0){ 
        return $sel->fetch(PDO::FETCH_OBJ);
           }else{return 0;}
        }catch(PDOException $e){ throw new Exception( $e->getMessage());}
    }




 //// PULLOUT QUESTIONS FOR USER BY CATEGORY
function PullOutQuest($cat,$user){
    try{
    $uti= new Utilities; $no=1;
    $a=$this->db->quote($uti->Chg_Category($cat)->id,PDO::PARAM_INT);
    $b=$this->db->quote($user,PDO::PARAM_STR);
    $ck= $this->db->query("SELECT * FROM questions WHERE id NOT IN(SELECT qstid FROM answers WHERE cat=$a AND user=$b AND status=1) AND cat=$a ORDER BY RAND()");
    if($ck->rowCount()>0){
        while($ft2=$ck->fetch(PDO::FETCH_OBJ)){           
echo '<tr>
    <th height="28" width="40">'.$no++.'</th>
    <td width="30"><input name="ans[]" type="checkbox" value="'.$ft2->id.'" title="Check Me" /></td>
    <td width="1197">'.htmlspecialchars_decode($ft2->content).'</td>
    </tr>';            
        }
    }else{ echo '<tr><td><i class="fa fa-exclamation-triangle"></i> ALL QUESTIONS HAVE BEEN ANSWERED.</td></tr>';}
  }catch(PDOException $e){ throw new Exception( $e->getMessage());}
}

//// SUBMIT QUESTIONS ANSWERED FROM USERS
    function InsertAnswer($qid,$cat,$user){
        $a=$this->db->quote($qid,PDO::PARAM_STR);
        $b=$this->db->quote($cat,PDO::PARAM_INT);
        $c=$this->db->quote($user,PDO::PARAM_STR); 
       try{
        if($this->db->query("SELECT * FROM answers WHERE qstid=$a AND cat=$b AND user=$c")->rowCount()<=0){
            UserEnd::PerSonalChoice($cat,$user);
          $this->db->query("INSERT INTO answers(qstid,cat,user,dated,status)VALUES($a,$b,$c,NOW(),1)");
            return 'ANSWER SUBMITTED SUCCESSFULLY';
        }else{
            $this->db->query("UPDATE answers SET status=1 WHERE qstid=$a AND user=$c");
             return 'ANSWER UPDATED SUCCESSFULLY';
        }
       }catch(PDOException $e){throw new Exception($e->getMessage());}
    }  

//// CREATE AN ENTRY FOR INLINE EDIT FOR USER FOR PERSONAL REASONS
    function PerSonalChoice($cat,$user){
        $a=$this->db->quote($cat,PDO::PARAM_INT);
        $b=$this->db->quote($user,PDO::PARAM_STR); 
          if($this->db->query("SELECT * FROM choices WHERE cat=$a AND user=$b")->rowCount()<=0){
          $this->db->query("INSERT INTO choices(cat,user,status)VALUES($a,$b,1)");
      }
    }

//// PULLOUT ANSWERED QUESTIONS FROM USER BY CATEGORY
    function AnsweredByUser($user,$cat){
        $a=$this->db->quote($user,PDO::PARAM_STR);
        $b=$this->db->quote($cat,PDO::PARAM_INT);
        try{
    $sel= $this->db->query("SELECT * FROM answers WHERE user=$a AND cat=$b AND status=1");
        if($sel->rowCount()>0){ 
        return $sel->fetchAll(PDO::FETCH_OBJ);
           }
    }catch(PDOException $e){ throw new Exception($e->getMessage());}
}

//// REMOVE ANSWERED QUESTIONS BY USER SETTING STATUS =0
    function RemoveAnswer($qstid,$cat,$user){
        $a=$this->db->quote($user,PDO::PARAM_STR);
        $b=$this->db->quote($qstid,PDO::PARAM_INT);
        $c=$this->db->quote($cat,PDO::PARAM_INT);
        try{
        $this->db->query("UPDATE answers SET status=0 WHERE user=$a AND qstid=$b AND cat=$c");
           }catch(PDOException $e){ throw new Exception($e->getMessage());}
        }

//// INLINE EDIT FOR ALL CATEGORIES BY ADDING PERSONAL CHOICE
    function InlineEdit($col,$val,$id){    
    $vall=$this->db->quote($val,PDO::PARAM_STR);
    $id=$this->db->quote($id,PDO::PARAM_INT);
     $query="UPDATE choices SET $col=$vall WHERE id=$id";
    if(!$this->db->query($query)){throw new Exception('something went wrong');}else{
    return $val;}
    }

    function AnsweredByUser2($user,$cat){
        $a=$this->db->quote($user,PDO::PARAM_INT);
        $b=$this->db->quote($cat,PDO::PARAM_STR);
        try{
           $sel= $this->db->query("SELECT * FROM choices WHERE user=$a AND cat=$b");
           if($sel->rowCount()>0){ 
           return $sel->fetch(PDO::FETCH_OBJ);
           }
    }catch(PDOException $e){ throw new Exception($e->getMessage());}
}
/////////////////////////////////

///////////SET YOUR GOALS
    function InsertGoals($user,$cont){
        $a=$this->db->quote($user,PDO::PARAM_STR);
        $b=$this->db->quote(htmlentities($cont),PDO::PARAM_STR);
        try{
          if($this->db->query("SELECT * FROM setgoal WHERE user=$a")->rowCount()<=0){
          $this->db->query("INSERT INTO setgoal(user,cont,dated)VALUES($a,$b,NOW())");
          return 'GOAL SET SUCCESSFULLY';
        }else{
            $this->db->query("UPDATE setgoal SET cont=$b, dated=NOW() WHERE user=$a");
            return 'GOAL SET UPDATED SUCCESSFULLY';
        }
       }catch(PDOException $e){throw new Exception($e->getMessage());}
        
    }
//// FETCH OUT GOAL SET BY ALL USERS
    function PulOutGoalSet(){
         $sel= $this->db->query("SELECT * FROM setgoal");
         if($sel->rowCount()>0){
            return $sel->fetchAll(PDO::FETCH_OBJ);
        }else{ return 0;}
    }

///////////SAVE DRINKING RECORD
    function SaveRecord($a,$b,$c,$d,$e,$f,$g){
        try{
            $amt=$f*$g;
            $sel= $this->db->query("INSERT INTO  `tradrink`( `user`, `dob`, `brand`, `vol`, `per`, `bottles`, `amt`,tamt, `dated`, `status`)VALUES('$a','$b','$c','$d','$e','$f','$g','$amt',NOW(),1)");
            return 'RECORD SAVED';
        }catch(PDOException $e){throw new Exception($e->getMessage());}
    }

/////CONTROL TRACK RECORD PAGE
    function ControlTracker($a){
        $aa= $this->db->query("SELECT * FROM tradrink WHERE user='$a' AND status=1");
            if($aa->rowCount()>0){
                return 1;
            }
        }

///FIND TRACKER BY USER //

    function LocateResult($a,$b,$c){
            try{
            $sel= $this->db->query("SELECT * FROM tradrink WHERE dob BETWEEN '$b' AND '$c' AND user='$a' ORDER BY dob");
            if($sel->rowCount()>0){
                return $sel->fetchAll(PDO::FETCH_OBJ);
            }else{ return 0;}
        }catch(PDOException $e){throw new Exception($e->getMessage());}
    }
/////CALCULATION FOR TRACKA
    function TotalCal($a,$b,$c){
        $volt= $this->db->query("SELECT *,SUM(vol) AS Tvol, SUM(per) AS Tper, SUM(bottles) AS Tbot, SUM(amt) AS Tmoni, SUM(tamt) AS TSpend FROM tradrink WHERE dob BETWEEN '$b' AND '$c' AND user='$a'");
        if($volt->rowCount()>0){
            return $volt->fetch(PDO::FETCH_OBJ);
        }
    }

///////////////ForumPost
    function ForumPost($a,$b){
        $sal = $this->db->query("INSERT INTO forum(user,cont,dated,status)VALUES('$a','$b',NOW(),1)");
        return 'POSTED SUCCESSFULLY';
    }
///// CALOUT FORUM
    function CalOutForum(){
        $sal= $this->db->query("SELECT * FROM forum WHERE status=1 ORDER BY id DESC");
        if($sal->rowCount()>0){
            return $sal->fetchAll(PDO::FETCH_OBJ);
        }
    }
/////INSERT FORUM REPLY
    function ForumReply($a,$b,$c){ 
        try{
            $ab= $this->db->quote(htmlspecialchars(htmlentities($c)),PDO::PARAM_STR);
       $this->db->query("INSERT INTO forum_reply(fid,user,reply,dated,status)VALUES('$a','$b',$ab,NOW(),1)");
        return 'ok';
    }catch(PDOException $e){ echo $e->getMessage()."<br/>Error Processing Request";}
    }
////////////CALOUT FORUM REPLY 
    function CalOutForumReply($id){
        $sal= $this->db->query("SELECT * FROM forum_reply WHERE status=1 AND fid='$id'");
        if($sal->rowCount()>0){
            return $sal->fetchAll(PDO::FETCH_OBJ);
        }
    }

/////////////SendFeedback
    function SendFeedback($user,$topic,$msg){
        try{
        $a=$this->db->quote($user,PDO::PARAM_STR);
        $b=$this->db->quote(htmlspecialchars($topic),PDO::PARAM_STR);
        $c=$this->db->quote(htmlspecialchars($msg),PDO::PARAM_STR);
        if($this->db->query("INSERT INTO feedback(user,topic,msg,dated,stage,status)VALUES($a,$b,$c,NOW(),1,1)")){
            return 'MESSAGE SEND SUCCESSFULLY'; }
        }catch(PDOException $e){throw new Exception( $e->getMessage());}
    }

////PULLOUT FEEDBACK
    function PullFeedback($user=''){
        try{
            $sel= $this->db->query("SELECT * FROM feedback WHERE user='$user' AND status!=0");
            if($sel->rowCount()>0){
                return $sel->fetchAll(PDO::FETCH_OBJ);
            }else{return 0;}
        }catch(PDOException $e){throw new Exception( $e->getMessage());}
    }
/////// PULLOUT REPLY
    function FeedbackReply($user){
         try{
            $sel= $this->db->query("SELECT * FROM feedback_reply WHERE user='$user' AND status!=0");
            if($sel->rowCount()>0){
                return $sel->fetchAll(PDO::FETCH_OBJ);
            }else{return 0;}
        }catch(PDOException $e){throw new Exception( $e->getMessage());}
    }

/////////// READ FEEDBACK REPLY
    function ReadFeedbackReply($id){
         try{
            $sel= $this->db->query("SELECT * FROM feedback_reply WHERE id=$id AND status!=0");
            if($sel->rowCount()>0){
                return $sel->fetch(PDO::FETCH_OBJ);
            }else{return 0;}
        }catch(PDOException $e){throw new Exception( $e->getMessage());}
    }

/////////// GET SINGLE FEEDBACK
    function GetSingleFB($a){
     $volt= $this->db->query("SELECT * FROM feedback WHERE id=$a");
        if($volt->rowCount()>0){
            return $volt->fetch(PDO::FETCH_OBJ);
        }
    }
/////////SET STAGE TO READ
    function UpdateRead($a){
        $this->db->query("UPDATE feedback_reply SET stage=0 WHERE id=$a LIMIT 1");
    }
////////PLOT FOR CHART/GRAPH

    function MyChart($user){
        $a=$this->db->quote($user,PDO::PARAM_STR);
        try{
            $ab= $this->db->query("SELECT *,SUM(vol) AS Tvol, SUM(per) AS Tper, SUM(bottles) AS Tbot, SUM(amt) AS Tmoni, SUM(tamt) AS TSpend FROM tradrink WHERE user=$a");
            if($ab->rowCount()>0){
                return $ab->fetchAll(PDO::FETCH_OBJ);
            }
        }catch(PDOException $e){throw new Exception( $e->getMessage());}
    }


    function LineChart($user){
        $s= $this->db->query("SELECT dob,bottles FROM tradrink WHERE user='$user'");
        $aa= array();
        if($s->rowCount()>0){
           while ($row = $s->fetch(PDO::FETCH_ASSOC)) { 
            $time= strtotime(date('Y',strtotime($row['dob'])));

           $aa[]= array('x' => $time, 'y' => $row['bottles']);
   }
    return $aa;

        }
    }



  }


class AdminEnd extends conn{

    //ADD SUB ADMIN
    function AddSubAdmin($fname,$email,$sex,$fone,$uname,$img,$adm){
        $a=$this->db->quote($fname,PDO::PARAM_STR);
        $b=$this->db->quote($email,PDO::PARAM_STR);
        $c=$this->db->quote($sex,PDO::PARAM_STR);
        $d=$this->db->quote($fone,PDO::PARAM_STR);
        $e=$this->db->quote($uname,PDO::PARAM_STR);
        $f=$this->db->quote(password_hash($uname, PASSWORD_DEFAULT),PDO::PARAM_STR);
        $g=$this->db->quote($img,PDO::PARAM_STR);
        $h=$this->db->quote($adm,PDO::PARAM_STR);
        if($this->db->query("SELECT * FROM admin WHERE (uname=$e OR fone=$d OR email=$b)")->rowCount()<=0){
            $this->db->query("INSERT INTO admin(fname,email,sex,fone,uname,acex,img,admin,addon)VALUES($a,$b,$c,$d,$e,$f,$g,$h,NOW())");
            return 'SUBADMIN ADDED SUCCESSFULLY';
            exit;
        }else{ throw new exception('duplicate entry found <b>('.$uname.'), ('.$fone.'), and ('.$email.')</b><br/>
            <small style="margin-top:-10px">please cross check carefully</small>'); }
    }

    //LIST SUB ADMIN
    function AdminCall(){
        try{
            $sel= $this->db->query("SELECT * FROM admin WHERE pl=1 AND status!=0 ORDER BY id DESC");
            $ft= $sel->fetchAll(PDO::FETCH_OBJ);
            return $ft;
        }catch(PDOException $e){throw new Exception( $e->getMessage()." NO LIST FOUND!");}
     }

    //LIST OUT ACTIVE MEMBERS
    function CalUsers(){
        try{
            $sel= $this->db->query("SELECT * FROM member WHERE status!=0 ORDER BY id DESC");
            $ft= $sel->fetchAll(PDO::FETCH_OBJ);
            return $ft;
        }catch(PDOException $e){throw new Exception( $e->getMessage()." NO LIST FOUND!");}
     }

     //GET SINGLE DETAILS OF SUB ADMIN
    function GetSingle($admin){
        try{
            $a=$this->db->quote($admin,PDO::PARAM_STR);
        $sel= $this->db->query("SELECT * FROM admin WHERE uname=$a LIMIT 1");
        if($sel->rowCount()>0){ 
            $ft= $sel->fetch(PDO::FETCH_OBJ); 
            return $ft;
        }else{ throw new Exception('NO OBJECT FOUND!');}
    }catch(PDOException $e){ throw new Exception( $e->getMessage());}
    }

    //STORE QUESTION FOR USERS BY CATEGORY
    function AddQuestion($user,$cat,$cont){
        $qst= addslashes($cont);
        $aqst= htmlspecialchars($qst);
        try{
            $this->db->query("INSERT INTO questions(adby,cat,content,dated,status)VALUES('$user','$cat','$aqst',NOW(),1)");
            return 'QUESTION INSERTED SUCCESSFULLY';
            exit;
        }catch(PDOException $e){throw new Exception("Error Processing Request<br/>".$e->getMessage(), 1);}
    }
    
    //INLINE EDITOR FOR STORED QUESTION
    function InlineQuestionEditor($col,$val,$id){    
        $vall=$this->db->quote($val,PDO::PARAM_STR);
        $id=$this->db->quote($id,PDO::PARAM_INT);
        $adm=$this->db->quote($_SESSION['@admindata@'],PDO::PARAM_INT);
         $query="UPDATE questions SET $col=$vall, adby=$adm WHERE id=$id";
        if(!$this->db->query($query)){throw new Exception('something went wrong');}else{
        return $val;}
    }

    //LIST OUT ALL STORED CONTENT BY CATEGORY
    function FindQuestion($id){
        try{
             $a=$this->db->quote($id,PDO::PARAM_STR);
            $query= $this->db->query("SELECT * FROM questions WHERE cat=$a AND status!=0");
            if($query->rowCount()>0){
                return $query->fetchAll(PDO::FETCH_OBJ);
            }else{throw new Exception("NO QUESTIONS FOUND FOR :: ".$id, 1);}
        }catch(PDOException $e){throw new Exception("Error Processing Request", 1);
        $this->errlog($e->getMessage(),' Questions Not Found');
        }
    }

    //INLINE EDITOR FOR USERS
    function InlineMemberEditor($col,$val,$id){    
        $vall=$this->db->quote($val,PDO::PARAM_STR);
        $id=$this->db->quote($id,PDO::PARAM_INT);
         $query="UPDATE member SET $col=$vall WHERE id=$id";
        if(!$this->db->query($query)){throw new Exception('something went wrong');}else{
        return $val;}
    }

        ////VIEW FEEDBACK
    function PullFeedbackA(){
        try{
            $sel= $this->db->query("SELECT * FROM feedback WHERE status!=0 ORDER BY id DESC");
            if($sel->rowCount()>0){
                return $sel->fetchAll(PDO::FETCH_OBJ);
            }else{return 0;}
        }catch(PDOException $e){throw new Exception( $e->getMessage());}
    }

    //REPLY FEEDBACK
    function Feedback_Reply($id,$user,$msg){
        try{
            $a=$this->db->quote($id,PDO::PARAM_INT);
            $b=$this->db->quote($user,PDO::PARAM_STR);
            $c=$this->db->quote(htmlspecialchars($msg),PDO::PARAM_STR);
            if($this->db->query("INSERT INTO feedback_reply(mid,user,msg,stage,dated,status)VALUES($a,$b,$c,1,NOW(),1)")){
                return 'MESSAGE SENT SUCCESSFULLY';
                exit;
            }else{ throw new Exception("MESSAGE NOT SENT.", 1);}
        }catch(PDOException $e){ throw new Exception($e->getMessage(), 1);}
    }

    function UpdateRead($a){
        $this->db->query("UPDATE feedback SET stage=0 WHERE id=$a LIMIT 1");
    }


}


class Access extends conn{

    function adminlogin($user,$pass){
        try{
        $a=$this->db->quote($user,PDO::PARAM_STR); //echo $this->db->quote(password_hash($pass, PASSWORD_DEFAULT),PDO::PARAM_STR); die;
        $query=$this->db->query("SELECT * FROM admin WHERE uname=$a AND status=1");
        if($query->rowCount()>0){          
            $ft= $query->fetch(PDO::FETCH_OBJ); 
            if(password_verify($pass,$ft->acex)){                 
            @$_SESSION['@admin@']=$ft->uname;
            @$ses=session_id();
    $this->db->query("INSERT INTO loginrec(user,status,sessid,logintime)VALUES($a,1,'$ses',NOW())ON DUPLICATE KEY UPDATE logintime=NOW(), status=1,sessid='$ses'");
        if($ft->stage==0){
            header('Location:setpassword.php');}
            elseif($ft->stage==1){
            header("location:verifylogin.php");}
            elseif($ft->stage==2){
            @$_SESSION['@admin@']=$user;
            die(header('location:verifylogin.php'));
            }else{
           $this->db->query("INSERT INTO loginrec(user,attempttime,status,failed)VALUES($a,NOW(),2,1)ON DUPLICATE KEY UPDATE failed=failed+1");
           throw new exception('invalid username or password');}
           }else{ throw new Exception("invalid  username or password", 1);}
        }else{ throw new Exception("invalid login details", 1);}   
    }catch(PDOException $e){ $this->logerror($user,'Login failed');throw new Exception( $e->getMessage()); }
}

    function SetPassword($a,$b){
     try{
        $user=$this->db->quote($a,PDO::PARAM_STR);
        $acex=$this->db->quote(password_hash($b, PASSWORD_DEFAULT),PDO::PARAM_STR);
         $this->db->query("UPDATE admin SET acex=$acex,stage=1 WHERE uname=$user");
            return 'password set and updated successfully';
            exit;
          }catch(PDOException $e){ throw new Exception( $e->getMessage());$this->logerror($a);}
    }

    function SetVerifyCode($a,$b){
     try{
    $user=$this->db->quote($a,PDO::PARAM_STR);
    $code=$this->db->quote(password_hash($b, PASSWORD_DEFAULT),PDO::PARAM_STR);
    $this->db->query("UPDATE admin SET icode=$code,stage=2 WHERE uname=$user");
    return 'Login verification code set successfully';
     exit;
    }catch(PDOException $e){ throw new Exception( $e->getMessage());$this->logerror($a);}
}

    function VerifyCode($a,$b){
     try{
      $query= $this->db->query("SELECT * FROM admin WHERE uname='$a' AND status=1");
        if($query->rowCount()>0){          
            $ft= $query->fetch(PDO::FETCH_OBJ); 
            if(password_verify($b,$ft->icode)){                 
                 @$_SESSION['@admindata@']=$ft->uname;
                 die(header('Location:panel.php'));
             }else{throw new exception('invalid Login verification code');} 
         }else{throw new Exception("Error Processing Request<br/>ACCESS DENIED OR INVALID DETAILS PROVIDED", 1);}
    }catch(PDOException $e){ throw new Exception( $e->getMessage());$this->logerror($a);}
}

function Userlogin($user,$pass){
        try{
        $a=$this->db->quote(strtolower($user),PDO::PARAM_STR);
        $query=$this->db->query("SELECT * FROM member WHERE dname=$a");
        if($query->rowCount()>0){          
            $ft= $query->fetch(PDO::FETCH_OBJ); 
            if($ft->status==1){
            if(password_verify($pass,$ft->acex)){                 
            @$_SESSION['@member@']=$ft->dname;
            @$_SESSION['@memberdata@']=$ft;
            @$ses=session_id();
            $this->db->query("INSERT INTO loginrec(user,status,sessid,logintime)VALUES($a,1,'$ses',NOW())ON DUPLICATE KEY UPDATE logintime=NOW(), status=1,sessid='$ses'");
            die(header('Location:index.php'));
            }else{
           $this->db->query("INSERT INTO loginrec(user,attempttime,status,failed)VALUES($a,NOW(),2,1)ON DUPLICATE KEY UPDATE failed=failed+1");
           throw new exception('invalid login details');}
           }else{ throw new Exception("Error Processing Request<br/> you are banned for using this service<br/>Contact your webmaster.", 1);} 
    }else{ throw new exception('invalid display name');}   
}catch(PDOException $e){ $this->logerror($user);throw new Exception($e->getMessage().' User Login'); }
}


    function logout($user){ 
    $a=$this->db->quote($user,PDO::PARAM_STR);
    $this->db->query("UPDATE loginrec SET logouttime=NOW(), status=0 WHERE user=$a"); 
    if(isset($_SESSION['@member@'])){
    session_destroy();
    header('location:index.php');
    }else{
    session_destroy();
    header('Location:'.SERVERPAT.'admin/?o');
    }
}


}


class Operate extends conn{
    
    //ACTIVATE AND DEACTIVATE METHODOLOGY
    // STATUS 1 = ACTIVATE
    // STATUS 2 = DEACTIVATE
    // STATUS 0 = DELETE
    function Drswitch($anc,$act){  //echo $anc.'<br/>'.$act; die;
        try{
            if($anc=='dac'){ echo $anc; die;
                $this->db->query("UPDATE admin SET status=2 WHERE status=1 AND id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='ac'){
                $this->db->query("UPDATE admin SET status=1 WHERE status=2 AND id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='del'){
                $this->db->query("UPDATE admin SET status=0 WHERE id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='dactu'){
                $this->db->query("UPDATE member SET status=2 WHERE status=1 AND id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='actu'){
                $this->db->query("UPDATE member SET status=1 WHERE status=2 AND id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='delu'){
                $this->db->query("UPDATE member SET status=0 WHERE id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='dactq'){
                $this->db->query("UPDATE questions SET status=2 WHERE status=1 AND id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='actq'){
                $this->db->query("UPDATE questions SET status=1 WHERE status=2 AND id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='delq'){
                $this->db->query("UPDATE questions SET status=0 WHERE id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }elseif($anc=='fdbkdel'){
                $this->db->query("UPDATE questions SET status=0 WHERE id=$act");
                die(header('Location:'.$_SERVER['PHP_SELF']));
            }
        }catch(PDOException $e){ throw new Exception( $e->getMessage()." SWITCH BUTTON FAILS!");
        $this->logerror($e->getMessage(),$anc,$e->getLine());}
    }

function AjaxDelete($id){$this->db->query("UPDATE answers SET status=0 WHERE id=$id");return 'ok';}
function AjaxDeleteGoalSet($id){$this->db->query("DELETE FROM setgoal WHERE id=$id");return 'ok';}
function AjaxDeleteForumPosted($id){$this->db->query("DELETE FROM forum WHERE id=$id");return 'ok';}
function AjaxRemoveFeedBack($id){$this->db->query("UPDATE feedback_reply SET status=0 WHERE id=$id");return 'ok';}

function AjaxDeleteMember($id){$this->db->query("UPDATE member SET status=0 WHERE id=$id");return 'ok';}
function AjaxActMember($id){$this->db->query("UPDATE member SET status=1 WHERE id=$id");return 'ok';}
function AjaxDeactMember($id){$this->db->query("UPDATE member SET status=2 WHERE id=$id");return 'ok';}
function AjaxDeleteForumReply($id){$this->db->query("UPDATE forum_reply SET status=0 WHERE id=$id");return 'ok';}

}