<?php
	
	/**
	 *This is for User Tab in the software.Add, Delete, Update and view is included 
	*/

	class User
	{
		
		function __construct(){
			/*To delete the particluar user using ajax call*/
			add_action( 'wp_ajax_delete_user', array( $this, 'user_delete' ) );
		}

		
		public function role_login( $username, $password ){

			global $wpdb;
			
			$user_status = 1;

			$select_user = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM user WHERE user_username = %s AND user_password = %s AND user_status = '%d'", $_POST['login_username'], $_POST['login_password'] , $user_status ) );

			if( $select_user ){
				$_SESSION['user_id'] = $select_user->id;
				$_SESSION['user_role'] = $select_user->user_role;
				return true;
			}
		}


		public function get_userinfo( $user_id = "", $user_role = "" ) {
			global $wpdb;
			
			if( ! $user_id ){
				$user_id = $_SESSION['user_id']; 
				/*$user_role = $_SESSION['user_role']; */
			}
			
			if( ! $user_id )
				return array();
				
			return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM user WHERE id = %d", $user_id ) );
		}

		public function check_userlogin() {
			if( !isset($_SESSION['user_id']) ) {

				@ header('Location: '.SITE_URL.'/admin/login.php');
				exit;
			}
			
			return true;
		}

		public function add_user($user_data = ""){
			global $wpdb;

			$user_data = array(
				'user_name' => $_POST['user_name'],
				'user_username' => $_POST['user_username'],
				'user_email' => $_POST['user_email'],
				'user_role' => $_POST['user_role'],
				'user_password' => $_POST['user_password']
			);
			$wpdb->insert('user', $user_data);
			return true;
		}

		public function get_all_user_data( $user_status = 1 ){
			global $wpdb;
			return $wpdb->get_results($wpdb->prepare("SELECT * FROM `user` WHERE user_status = %d", $user_status));

		}

		public function user_delete( $id = '' ) {		
		
			if( ! $id && ! $_POST['id'] )
				return false;
			
			global $wpdb;
			
			$id  =  isset( $_POST['id'] ) ? $_POST['id'] : $id ;

			$wpdb->update( 'user', array( 'user_status'	=> 0 ), array( 'id' => $id ) ); 								
			
			return true;
   		}


   		public function get_selected_user_data( $id = "" , $user_status = 1 ) {
		
			global $wpdb;		
			
			if( ! $id )
				return false;

			return	 $wpdb->get_row( $wpdb->prepare( "SELECT * FROM user WHERE id = %d AND user_status = '%d'", $id , $user_status ) );			
			
		}

		public function update_user_profile( $user_data = array() ) {
		
			global $wpdb;		 
					
			if( $_POST ) {
				$user_data = array(						
					'user_password'	=> $_POST['user_password'],				
				);			
					
				$wpdb->update( 'user', $user_data, array( 'id' => $_POST['id'] ) );  
				
				return true;			
			}  		
				 	    		
			return false;
		}


		public function logout() {
		
	        //session_destroy();        
			session_start();
			session_unset();
			unset( $_SESSION['user_id'] );
			unset( $_SESSION['user_role'] );		

			return true;
   	}
	}
?>