<?php
/**
 * This model contains the business logic and manages the persistence of users and roles
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This model contains the business logic and manages the persistence of users and roles
 * It is also used by the session controller for the authentication.
 */
class Users_model extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get the list of users or one user
     * @param int $id optional id of one user
     * @return array record of users
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUsers($id = 0) {
        $this->db->select('users.*');
        if ($id === 0) {
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('users.id' => $id));
        return $query->row_array();
    }

    /**
     * Get the list of users and their roles
     * @return array record of users
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUsersAndRoles() {
        $this->db->select('users.id, active, firstname, lastname, login, email');
        $this->db->select("GROUP_CONCAT(" . $this->db->dbprefix('roles') . ".name SEPARATOR ',') as roles_list", FALSE);
        $this->db->join('roles', 'roles.id = (' . $this->db->dbprefix('users') . '.role & ' . $this->db->dbprefix('roles') . '.id)');
        $this->db->group_by($this->db->dbprefix('users') . '.id, active, firstname, lastname, login, email');
        $query = $this->db->get('users');
        return $query->result_array();
    }

  /**
   * Get the list of roles or one role
   * 00000001 1  Admin
   * 00000010 2	User
   * 00000100 8	HR Officier / Local HR Manager
   * 00001000 16	HR Manager
   * 00010000 32	General Manager
   * 00100000 34	Global Manager
   * @param int $id optional id of one role
   * @return array record of roles
   * @author Benjamin BALET <benjamin.balet@gmail.com>
   */
  public function getRoles($id = 0) {
      if ($id === 0) {
          $query = $this->db->get('roles');
          return $query->result_array();
      }
      $query = $this->db->get_where('roles', array('id' => $id));
      return $query->row_array();
  }

    /**
     * Get the name of a given user
     * @param int $id Identifier of employee
     * @return string firstname and lastname of the employee
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getName($id) {
        $record = $this->getUsers($id);
        if (count($record) > 0) {
            return $record['firstname'] . ' ' . $record['lastname'];
        }
    }

    /**
     * Check if a login can be used before creating the user
     * @param string $login login identifier
     * @return bool TRUE if available, FALSE otherwise
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function isLoginAvailable($login) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Delete a user from the database
     * @param int $id identifier of the user
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function deleteUser($id) {
        $this->db->delete('users', array('id' => $id));
    }

    /**
     * Insert a new user into the database. Inserted data are coming from an HTML form
     * @return string deciphered password (so as to send it by e-mail in clear)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setUsers() {
        //Hash the clear password using bcrypt (8 iterations)
        $password = $this->input->post('password');
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);

        //Role field is a binary mask
        $role = 0;
        foreach($this->input->post("role") as $role_bit){
            $role = $role | $role_bit;
        }

        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'password' => $hash,
            'role' => $role
        );
        $this->db->insert('users', $data);
        return $password;
    }

    /**
     * Update a given user in the database. Update data are coming from an HTML form
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function updateUsers() {
        //Role field is a binary mask
        $role = 0;
        foreach($this->input->post("role") as $role_bit){
            $role = $role | $role_bit;
        }
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'role' => $role
        );
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update('users', $data);
        return $result;
    }

    /**
     * Update a given user in the database. Update data are coming from an HTML form
     * @param int $id Identifier of the user
     * @param string $password password in clear
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function resetPassword($id, $password) {
        //Hash the clear password using bcrypt (8 iterations)
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);
        $data = array(
            'password' => $hash
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    /**
     * Generate a random password
     * @param int $length length of the generated password
     * @return string generated password
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function randomPassword($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    /**
     * Load the profile of a user from the database to the session variables
     * @param array $row database record of a user
     */
    private function loadProfile($row) {
      /*
        00000001 1  Admin
        00000100 8  HR Officier / Local HR Manager
        00001000 16 HR Manager
        = 00001101 25 Can access to HR functions
       */
        $isAdmin = FALSE;
        if (((int) $row->role & 1)) {
            $isAdmin = TRUE;
        }
        $isSuperAdmin = FALSE;
        if (((int) $row->role & 25)) {
            $isSuperAdmin = TRUE;
        }

        $newdata = array(
            'login' => $row->login,
            'id' => $row->id,
            'firstname' => $row->firstname,
            'lastname' => $row->lastname,
            'fullname' => $row->firstname . ' ' . $row->lastname,
            'isAdmin' => $isAdmin,
            'isSuperAdmin' => $isSuperAdmin,
            'loggedIn' => TRUE
        );
        $this->session->set_userdata($newdata);
    }

    /**
     * Check the provided credentials and load user's profile if they are correct
     * @param string $login user login
     * @param string $password password
     * @return bool TRUE if the user is succesfully authenticated, FALSE otherwise
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function checkCredentials($login, $password) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $this->db->where('active = TRUE');
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            //No match found
            return FALSE;
        } else {
            $row = $query->row();
            $hash = crypt($password, $row->password);
            if ($hash == $row->password) {
                // Password does match stored password.
                $this->loadProfile($row);
                return TRUE;
            } else {
                // Password does not match stored password.
                return FALSE;
            }
        }
    }

    /**
     * Set a user as active (TRUE) or inactive (FALSE)
     * @param int $id User identifier
     * @param bool $active active (TRUE) or inactive (FALSE)
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setActive($id, $active) {
        $this->db->set('active', $active);
        $this->db->where('id', $id);
        return $this->db->update('users');
    }

    /**
     * Check if a user is active (TRUE) or inactive (FALSE)
     * @param string $login login of a user
     * @return bool active (TRUE) or inactive (FALSE)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function isActive($login) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->active;
        } else {
            return FALSE;
        }
    }

    /**
     * Try to return the user information from the login field
     * @param string $login Login
     * @return User data row or null if no user was found
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUserByLogin($login) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            //No match found
            return null;
        } else {
            return $query->row();
        }
    }

    /**
     * Generate some random bytes by using openssl, dev/urandom or random
     * @param int $count length of the random string
     * @return string a string of pseudo-random bytes (must be encoded)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    protected function getRandomBytes($length) {
        if(function_exists('openssl_random_pseudo_bytes')) {
          $rnd = openssl_random_pseudo_bytes($length, $strong);
          if ($strong === TRUE)
            return $rnd;
        }
        $sha =''; $rnd ='';
        if (file_exists('/dev/urandom')) {
          $fp = fopen('/dev/urandom', 'rb');
          if ($fp) {
              if (function_exists('stream_set_read_buffer')) {
                  stream_set_read_buffer($fp, 0);
              }
              $sha = fread($fp, $length);
              fclose($fp);
          }
        }
        for ($i=0; $i<$length; $i++) {
          $sha  = hash('sha256',$sha.mt_rand());
          $char = mt_rand(0,62);
          $rnd .= chr(hexdec($sha[$char].$sha[$char+1]));
        }
        return $rnd;
    }
}
