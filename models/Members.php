<?php

	class Members {

	private $DataBase;
	
	public $member_id;
	public $FirstName; 
	public $LastName;	
	public $username;
	public $email;   
	public $password;	
	public $role;
    public $activationKey;
    public $job1;
    public $job2;
    public $job3;
    public $rating;
    public $hits;
    public $subway;
	public $credits;
	
		public function __construct ($DataBase){
			$this->DataBase = $DataBase;
		}
		
		public function checkLogin($username, $password){
			$sql = "SELECT * FROM members WHERE username = '$username' AND password = '$password' ";
			$result = mysql_query ($sql, $this->DataBase);
			$count = mysql_num_rows ($result);
				if ($count > 0 ){
					$member_row = mysql_fetch_array($result);
				
					$this->member_id = $member_row['member_id'];
					$this->FirstName = $member_row['FirstName'];
					$this->LastName = $member_row['LastName'];
					$this->username = $member_row['username'];
					$this->password = $member_row['password'];
					$this->email = $member_row['email'];
					$this->role = $member_row['role'];
                    $this->job1 = $member_row['job1'];
                    $this->job2 = $member_row['job2'];
                    $this->job3 = $member_row['job3'];
                    $this->subway = $member_row['subway'];
					$this->credits = $member_row['credits'];
        			return true;
				} else {
					return false;
				}
		}
	
		public function get($member_id){
			$sql = "SELECT * FROM members WHERE member_id = '$member_id' ";
			$result = mysql_query ($sql, $this->DataBase);
			$member_row = mysql_fetch_array ($result);
			
				$this->member_id = $member_row['member_id'];
				$this->FirstName = $member_row['FirstName'];
				$this->LastName = $member_row['LastName'];
				$this->username = $member_row['username'];
				$this->email = $member_row['email'];
				$this->role = $member_row['role'];
                $this->job1 = $member_row['job1'];
                $this->job2 = $member_row['job2'];
                $this->job3 = $member_row['job3'];
                $this->subway = $member_row['subway'];
				$this->credits = $member_row['credits'];
                $this->rating = $member_row['rating'];
                $this->member_likes = $member_row['member_likes'];
                $this->hits = $member_row['hits'];
		}



        public function rate($member_id){
            $sql = "SELECT * FROM members WHERE member_id = '$member_id' ";
            $result = mysql_query ($sql, $this->DataBase);
            $member_row = mysql_fetch_array ($result);

            $this->member_id = $member_row['member_id'];
            $this->FirstName = $member_row['FirstName'];
            $this->LastName = $member_row['LastName'];
            $this->username = $member_row['username'];
            $this->email = $member_row['email'];
            $this->role = $member_row['role'];
            $this->job1 = $member_row['job1'];
            $this->job2 = $member_row['job2'];
            $this->job3 = $member_row['job3'];
            $this->subway = $member_row['subway'];
            $this->credits = $member_row['credits'];
            $this->rating = $member_row['rating'];
            $this->hits = $member_row['hits'];
            $this->credits = $member_row['credits'];
        }


		public function getAll(){
            $per_page = 5;
            $pages_query = mysql_query("SELECT COUNT(`member_id`) FROM `members`");
             $pages = ceil(mysql_result($pages_query, 0) / $per_page);

            $page = (isset($_GET['id'])) ? (int)$_GET['id'] :1;
            $start = ($page -1) * $per_page;
            $query = mysql_query("SELECT * FROM members LIMIT $start, $per_page ");
            if($pages >=1 && $page<=$pages) {
                for ($x=1; $x<=$pages; $x++) {
                    echo ($x == $page) ? '<strong><a href="?page=member&action=seeAllUsers2&id='.$x.'">'.$x.'</a></strong>' : '<a href="?page=member&action=seeAllUsers2&id='.$x.'">'.$x.'</a>';
                }
            }
            while ($member_row = mysql_fetch_array ($query)){

                $member = new Members ($this->DataBase);

                $member->member_id = $member_row['member_id'];
                $member->FirstName = $member_row['FirstName'];
                $member->LastName = $member_row['LastName'];
                $member->username = $member_row['username'];
                $member->email = $member_row['email'];
                $member->role = $member_row['role'];
                $member->job1 = $member_row['job1'];
                $member->job2 = $member_row['job2'];
                $member->job3 = $member_row['job3'];
                $member->member_likes = $member_row['member_likes'];
                $member->hits = $member_row['hits'];
                $member->subway = $member_row['subway'];

                $allMembers[] = $member;
            }
            return $allMembers;

        }
            /*
			$sql = "SELECT * FROM members";


			$result = mysql_query ($sql, $this->DataBase);
			$allMembers  = array();
			
			while ($member_row = mysql_fetch_array ($result)){
				
				$member = new Members ($this->DataBase);
				
				$member->member_id = $member_row['member_id'];
				$member->FirstName = $member_row['FirstName'];
				$member->LastName = $member_row['LastName'];
				$member->username = $member_row['username'];
				$member->email = $member_row['email'];
				$member->role = $member_row['role'];
                $member->job1 = $member_row['job1'];
                $member->job2 = $member_row['job2'];
                $member->job3 = $member_row['job3'];
                $member->subway = $member_row['subway'];
				//$member->credits = $member_row['credits'];
				
				$allMembers[] = $member;
			}
			return $allMembers;
		}*/

        public function getHelp($job1, $subway){
            $sql = "SELECT * FROM members WHERE (job1='$job1' OR job2='$job1' OR job3='$job1') AND subway='$subway'";
            $result = mysql_query ($sql, $this->DataBase);
            $allMembers  = array();

            while ($member_row = mysql_fetch_array ($result)){

                $member = new Members ($this->DataBase);

                $member->member_id = $member_row['member_id'];
                $member->FirstName = $member_row['FirstName'];
                $member->LastName = $member_row['LastName'];
                $member->username = $member_row['username'];
                $member->email = $member_row['email'];
                $member->role = $member_row['role'];
                $member->job1 = $member_row['job1'];
                $member->job2 = $member_row['job2'];
                $member->job3 = $member_row['job3'];
                $member->member_likes = $member_row['member_likes'];
                $member->hits = $member_row['hits'];
                $member->subway = $member_row['subway'];

                $allMembers[] = $member;
            }
            return $allMembers;
        }

        public function getTaxi(){
            $sql = "SELECT * FROM members WHERE job1='taxi' OR job2='taxi' OR job3='taxi'";
            $result = mysql_query ($sql, $this->DataBase);
            $allMembers  = array();

            while ($member_row = mysql_fetch_array ($result)){

                $member = new Members ($this->DataBase);

                $member->member_id = $member_row['member_id'];
                $member->FirstName = $member_row['FirstName'];
                $member->LastName = $member_row['LastName'];
                $member->username = $member_row['username'];
                $member->email = $member_row['email'];
                $member->role = $member_row['role'];
                $member->job1 = $member_row['job1'];
                $member->job2 = $member_row['job2'];
                $member->job3 = $member_row['job3'];
                $member->subway = $member_row['subway'];
                $member->credits = $member_row['credits'];

                $allMembers[] = $member;
            }
            return $allMembers;
        }
		
		
		public function delete ($member_id){
			$sql = "DELETE FROM members WHERE member_id = '$member_id'" ;
			mysql_query ($sql, $this->DataBase);
		}
		
		public function checkMemberExist($username, $email){
			$sql = "SELECT * FROM members WHERE username = '$username' OR email='$email' ";
			$result = mysql_query ($sql, $this->DataBase);
			if (mysql_num_rows($result) >0){
				return false;
			} else {
				return true;
			}
		}

        public function registrationFinal($ActivationKey,$username){
            $sql = "SELECT * FROM members WHERE activationKey='$ActivationKey' and username='$username'";
            $result = mysql_query($sql, $this->DataBase);

            if (mysql_num_rows($result) === 0 ){
                echo "<div>Invalid  activation link</div>";
            } elseif (mysql_num_rows($result) === 1) {
                $sql ="UPDATE members SET role='member' WHERE activationKey='$ActivationKey' AND username='$username'";
                $result = mysql_query($sql, $this->DataBase);
                echo "<div>Your registration is complete</div>";
            }
        }
		
		public function save($member_id){
			if ($member_id > 0){
				$sql = "UPDATE members SET
							FirstName = '{$this->FirstName}',
							LastName = '{$this->LastName}',
							username = '{$this->username}',
							email = '{$this->email}',
							password = '{$this->password}',
							role = '{$this->role}',
							job1 = '{$this->job1}',
                            job2 = '{$this->job2}',
                            job3 = '{$this->job3}',
                            rating = '{$this->rating}',
                            hits = '{$this->hits}',
                            subway = '{$this->subway}',
							credits = '{$this->credits}'
						WHERE 	member_id = '$member_id'";
			}	else {
				$sql = "INSERT INTO members (FirstName, LastName, username, email, password, role, job1, job2, job3, subway, activationKey, rating, hits, credits)
						VALUES( '{$this->FirstName}',
								'{$this->LastName}',
								'{$this->username}',
								'{$this->email}',
								'{$this->password}',
								'{$this->role}',
								'{$this->job1}',
                                '{$this->job2}',
                                '{$this->job3}',
                                '{$this->subway}',
                                '{$this->activationKey}',
                                '{$this->rating}',
                                '{$this->hits}',
								'{$this->credits}'
								)";
			}
			mysql_query ($sql, $this->DataBase);

		}
		
		/*public function savePassword(){
			if ($this->member_id > 0){
					$sql = "UPDATE member SET password = '{$this->password}' WHERE member_id ='{$this->member_id}' ";
					echo $sql;
			}else {
					echo "false";
					return false;
			
			}
			mysql_query ($sql, $this->DataBase);
		}*/
		
		public function banUser($member_id){
			$sql = "UPDATE members SET role = 'banned' WHERE member_id = '$member_id'" ;
			
			mysql_query ($sql, $this->DataBase);
			echo "user is banned";
		}

        public function unbanUser($member_id){
            $sql = "UPDATE members SET role = 'member' WHERE member_id = '$member_id'" ;

            mysql_query ($sql, $this->DataBase);
            echo "user is unbanned";
        }
        public function rateUser($member_id, $rating){
            $sql = "UPDATE members SET rating = '$rating' WHERE member_id = '$member_id'" ;
            mysql_query ($sql, $this->DataBase);
            echo "'$member_id' rate is '$rating''";
        }

        public function editsave($member_id){
            if ($member_id > 0){
                $sql = "UPDATE members SET
							FirstName = '{$this->FirstName}',
							LastName = '{$this->LastName}',
							email = '{$this->email}',
							password = '{$this->password}',
				        	job1 = '{$this->job1}',
                            job2 = '{$this->job2}',
                            job3 = '{$this->job3}',
                            subway = '{$this->subway}',
							credits = '{$this->credits}'
						WHERE 	member_id = '$member_id'";
                mysql_query ($sql, $this->DataBase);
            }

        }

		
	}
	

	
	
	
	
	
	
	
	
	
	
	
	