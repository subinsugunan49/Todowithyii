 public function timeoffdetails($id)
	 {
		 
		
		
		 $logid=Yii::app()->user->id;
		 echo $_SESSION['super_user']."cxgvbcb".$logid."kkk"; exit;
		if($_SESSION['super_user']==1)
				{
			$append=" ";
				}
				else
				{
					
		 
				$append=' WHERE user_id='.$id;	
					
				}
	 $Time_off_qry="SELECT u.firstname, hr.id, hr.user_id,u.id as cur_userid,hr.from_date, hr.to_date, DATEDIFF( hr.to_date, hr.from_date ) AS total_leave, hr.reason
FROM users u
JOIN hr_time_off hr ON u.id = hr.user_id $append";
				
				
				$result[0] = Yii::app()->db->createCommand($Time_off_qry)->queryAll();		
				 $team_user_id=$id;
		
				if($id='')
				$id=Yii::app()->user->id;
				
				$requested_user_details="SELECT u.id AS userid,u.firstname, u.lastname,u.id as cur_userid,u.username, u.email, ed.birthdate,ed.account_number,ed.marital_status,ed.start_date,ed.office_phone, ed.gender, ed.remarks,ed.emirates_id,ed.profile_image,c.name AS country_name,dn.name AS designation_name,w.name AS weburl
FROM users u
LEFT JOIN hr_team_employ_details ed ON u.id = ed.team_employ_id
LEFT JOIN hr_country c ON ed.country_id = c.id
LEFT JOIN hr_website w ON ed.team_employ_id  = w.hr_team_employ_id 
LEFT JOIN hr_designation dn ON u.designation_id = dn.id
WHERE u.id=$team_user_id";


				$logid=Yii::app()->user->id;
				
				$result[1] = Yii::app()->db->createCommand($requested_user_details)->queryRow();
				
				$countdays2="SELECT u.id, p.days,d.`name` AS designation_name,p.`name` AS policy_category
						FROM hr_time_off_policy AS p
						LEFT JOIN `hr_designation` d
						ON (d.id=p.designation_id)
						LEFT JOIN users u ON(u.`designation_id`=p.id)
						WHERE u.id=".$logid;
						$logid=Yii::app()->user->id;
						
						//exit;
						
			   $days2= Yii::app()->db->createCommand($countdays2)->queryRow();
			 
			  $result[2]= $days2['days'] -$days1['days'];
			  $remain_days= $result[2];
			  //echo "subi".$remain_days;
			// exit;
				return $result;
		 
	 }