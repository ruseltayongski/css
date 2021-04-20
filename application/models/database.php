<?php
class Database extends CI_Model{
    public function connect(){
    	$db = new PDO("mysql:host=localhost;dbname=survey;charset=utf8mb4",'root','');
        return $db;
    }

	public function cssAdd($cssstat,$section,$division,$rendered,$purpose1,$purpose2,$purpose3,$purpose4,$purpose5,$purpose6,$purpose7,$purpose8,$assistant1,$assistant2,$assistant3,$apply1,$apply2,$apply3,$apply4,$apply5,$others,$hours,$minuite,$rating1,$rating2,$rating3,$rating4,$rating5,$rating6,$satisfied,$suggestion,$cname,$coffice,$ccno,$cemail,$mac,$stat,$year,$month,$day,$timezone,$hour,$encoded_by){
        $db = $this->connect();

        $sql = "insert into css (cssstat,section,division,rendered,purpose1,purpose2,purpose3,purpose4,purpose5,purpose6,purpose7,purpose8,assistant1,assistant2,assistant3,apply1,apply2,apply3,apply4,apply5,others,hours,minuite,rating1,rating2,rating3,rating4,rating5,rating6,satisfied,suggestion,cname,coffice,ccno,cemail,macaddress,stat,year,month,day,timezone,hour,encoded_by,created_at)
		      values('$cssstat','$section','$division','$rendered','$purpose1','$purpose2','$purpose3','$purpose4','$purpose5','$purpose6','$purpose7','$purpose8','$assistant1','$assistant2','$assistant3','$apply1','$apply2','$apply3','$apply4','$apply5','$others','$hours','$minuite','$rating1','$rating2','$rating3','$rating4','$rating5','$rating6','$satisfied','$suggestion','$cname','$coffice','$ccno','$cemail','$mac','$stat','$year','$month','$day','$timezone','$hour','$encoded_by',now())";

        $pdo = $db->prepare($sql);
        if($pdo->execute(array($cssstat, $section, $division, $rendered, $purpose1, $purpose2, $purpose3, $purpose4, $purpose5, $purpose6, $purpose7, $purpose8, $assistant1, $assistant2, $assistant3, $apply1, $apply2, $apply3, $apply4, $apply5, $others, $hours, $minuite, $rating1, $rating2, $rating3, $rating4, $rating5, $rating6, $satisfied, $suggestion, $cname, $coffice, $ccno, $cemail, $mac, $stat, $year, $month, $day, $timezone, $hour, $encoded_by))) {
            $_SESSION['ok']=true;
        	echo "true";
        }
        else {
            $_SESSION['notSaved']=true;
            echo json_encode($pdo->errorInfo());
        }

		$db = null;
	}

	public function login($uname,$pword){
		$db=$this->connect();
		$sql="select * from useracc where username=? and userpassword=?";
		$pdo=$db->prepare($sql);
		$pdo->execute(array($uname,$pword));
		$row=$pdo->fetch();
		$db=null;
		
		if(is_array($row)){
			return $row;
		}
		else{
			return false;
		}
	}

	public function userappr(){
		try{
			$db=$this->connect();
			$sql="select * from useracc";
			$pdo=$db->prepare($sql);
			$pdo->execute();
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function userid($id){
		$db=$this->connect();
		$sql="select * from useracc where userid=?";
		$pdo=$db->prepare($sql);
		$pdo->execute(array($id));
		$row=$pdo->fetch();
		$db=null;

		return $row;
	}

	public function userType($id){
		$db=$this->connect();
		$sql="select usertype from useracc where userid=?";
		$pdo=$db->prepare($sql);
		$pdo->execute(array($id));
		$row=$pdo->fetch();
		$db=null;

		return $row;
	}

	public function useradd($fname,$mname,$lname,$sec,$div,$pos,$uname,$pword,$utype,$ustat){
		try{
			$db=$this->connect();
			$sql="insert into useracc (userfname,usermname,userlname,usersection,userdivision,userposition,username,userpassword,userrdate,usertype,userstat)
			     values(?,?,?,?,?,?,?,?,now(),?,?)";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($fname,$mname,$lname,$sec,$div,$pos,$uname,$pword,$utype,$ustat));
			$db=null;

			return true;
		}
		catch(PDOExeption $e){
			return false;
		}
	}

	public function userupdate($stats,$id){
		try{
			$db=$this->connect();
			$sql="update useracc set userstat=? where userid=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($stats,$id));
			$db=null;

			return true;
		}
		catch(PDOExeption $e){
			return false;
		}
	}

	public function userdelete($id){
		try{
			$db=$this->connect();
			$sql="delete from useracc where userid=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($id));
			$db=null;

			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function useredit($fname,$mname,$lname,$sec,$div,$pos,$uname,$pword,$level,$id){
		try{
			$db=$this->connect();
			$sql="update useracc set userfname=?,usermname=?,userlname=?,usersection=?,userdivision=?,userposition=?,username=?,userpassword=?,usertype=?
				 where userid=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($fname,$mname,$lname,$sec,$div,$pos,$uname,$pword,$level,$id));
			$db=null;

			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function deptadd($sec,$div,$stat){
		try{
			$db=$this->connect();
			$sql="insert into department (section,division,deptstat) values(?,?,?)";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($sec,$div,$stat));
			$db=null;

			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function deptdelete($id){
		try{
			$db=$this->connect();
			$sql="delete from department where deptid=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($id));
			$db=null;

			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function deptdivision($section){
		try{
			$db=$this->connect();
			$sql="select section,division from department where section=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($section));
			$row=$pdo->fetch();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function deptList(){
		try{
			$db=$this->connect();
			$sql="select * from department";
			$pdo=$db->prepare($sql);
			$pdo->execute();
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function section(){
		try{
			$db=$this->connect();
			$sql="select * from department order by section asc";
			$pdo=$db->prepare($sql);
			$pdo->execute();
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function appr($apprname){
		$db=$this->connect();
		$sql="select * from useracc where userfname=?";
		$pdo=$db->prepare($sql);
		$pdo->execute(array($apprname));
		$row=$pdo->fetch();
		$db=null;

		return $row;
	}

	public function notedsec($sec,$fname,$mname,$lname){
		try{
			$db=$this->connect();
			$sql="select * from useracc where usersection=? and userfname!=? and usermname!=? and userlname!=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($sec,$fname,$mname,$lname));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function noteddiv($div,$fname,$mname,$lname){
		try{
			$db=$this->connect();
			$sql="select * from useracc where userdivision=? and userfname!=? and usermname!=? and userlname!=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($div,$fname,$mname,$lname));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function cssDivision($division,$year,$month){
		try{
			$db=$this->connect();
			$sql="select * from css where division=? and year=? and month=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($division,$year,$month));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOExeption $e){
			return false;
		}
	}

	public function cssSection($section,$year,$month){
		try{
			$db=$this->connect();
			$sql="select * from css where section=? and year='2021' and month='January'";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($section,$year,$month));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

    public function cssSection1($section,$year,$month){
        try{
            $db=$this->connect();
            $sql="select * from css where section=? and year=? and month=?";
            $pdo=$db->prepare($sql);
            $pdo->execute(array($section,$year,$month));
            $row=$pdo->fetchAll();
            $db=null;

            return $row;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function cssSectionDays($section,$year,$month,$day,$day1){
        try {
            $db=$this->connect();
            $sql="select * from css where section=? and year=? and month=? and day >= ? and day <= ?";
            $pdo=$db->prepare($sql);
            $pdo->execute(array($section,$year,$month,$day,$day1));
            $row=$pdo->fetchAll();
            $db=null;

            return $row;
        }
        catch (PDOException $e) {
            return false;
        }
    }

	public function cssDivisionDays($division,$year,$month,$day,$day1){
		try {
			$db=$this->connect();
			$sql="select * from css where division=? and year=? and month=? and day >= ? and day <= ?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($division,$year,$month,$day,$day1));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		} 
		catch (PDOException $e) {
			return false;
		}
	}

	public function cssRegionalDays($year,$month,$day,$day1){
		try {
			$db=$this->connect();
			$sql="select * from css where year=? and month=? and day >= ? and day <= ?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($year,$month,$day,$day1));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		} 
		catch (PDOException $e) {
			return false;
		}
	}

	public function cssRegional($year,$month){
		try {
			$db=$this->connect();
			$sql="select * from css where year=? and month=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($year,$month));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;

		} catch (PDOException $e) {
			return false;
		}
	}

    public function cssYear($year){
        try {
            $db=$this->connect();
            $sql="select * from css where year=?";
            $pdo=$db->prepare($sql);
            $pdo->execute(array($year));
            $row=$pdo->fetchAll();
            $db=null;

            return $row;

        } catch (PDOException $e) {
            return false;
        }
    }

	public function cssNegative($year,$month){
		try {
			$db=$this->connect();
			$sql="select * from css where year=? and month=? and (rating1 = 3 or rating2 = 3 or rating3 = 3 or rating4 = 3 or rating5 = 3 or rating6 = 3 or rating1 = 4 or rating2 = 4 or rating3 = 4 or rating4 = 4 or rating5 = 4 or rating6 = 4)";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($year,$month));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;

		} catch (PDOException $e) {
			return false;
		}
	}

	public function cssComment($year,$month){
		try {
			$db=$this->connect();
			$sql="select * from css where year = ? and month = ? and suggestion !=''";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($year,$month));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;

		} catch (PDOException $e) {
			return false;
		}
	}

	public function cssPurpose($year,$month){
		try {
			$db=$this->connect();
			$sql = "select * from css where year = ? and month = ? and others !='' ";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($year,$month));
			$row=$pdo->fetchAll();
			$db = null;

			return $row;

		} catch (PDOException $e) {
			return false;
		}
	}

	public function commentSection($prename,$pos,$sec,$div,$analysis,$recommendation,$action,$year,$month){
		try{
			$db=$this->connect();
			$sql="insert into commentsection (preparedname,position,section,division,analysisandinterpretation,recommendation,actiontaken,year,month,status)
				values (?,?,?,?,?,?,?,?,?,1)";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($prename,$pos,$sec,$div,$analysis,$recommendation,$action,$year,$month));
			$db=null;

			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function commentByDivision($division,$year,$month){
		try{
			$db=$this->connect();
			$sql="select * from commentsection where division=? and year=? and month=? order by section asc";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($division,$year,$month));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function css_report($year){
		try{
			$db=$this->connect();
			$sql="select * from css where year=?";
			$pdo=$db->prepare($sql);
			$pdo->execute(array($year));
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOExeption $e){
			return false;
		}
	}


}
?>
