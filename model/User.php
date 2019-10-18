<?php


class User
{
    private $b_myAdmin;
    private $s_mySurname;
    private $s_myName;
    private $s_myPseudo;
    private $s_myEmail;
    private $d_myBirth;
    private $s_myPassword;
    private $s_myGender;

    public function __construct($b_admin,$s_surname, $s_name, $s_pseudo, $s_email, $d_birth, $s_password, $s_gender)
    {
        $this->b_myAdmin = $b_admin;
        $this->s_mySurname = $s_surname;
        $this->s_myName = $s_name;
        $this->s_myPseudo = $s_pseudo;
        $this->s_myEmail = $s_email;
        $this->d_myBirth = $d_birth;
        $this->s_myPassword = $s_password;
        $this->s_myGender = $s_gender;
    }


    public function getMyAdmin()
    {
        return $this->b_myAdmin;
    }


    public function getMySurname()
    {
        return $this->s_mySurname;
    }


    public function getMyName()
    {
        return $this->s_myName;
    }

    public function getMyPseudo ()
    {
        return $this->s_myPseudo;
    }

    public function getMyEmail ()
    {
        return $this->s_myEmail;
    }


    public function getMyBirth()
    {
        return $this->d_myBirth;
    }

    public function getMyPassword ()
    {
        return $this->s_myPassword;
    }

    public function getMyGender ()
    {
        return $this->s_myGender;
    }


    public function setMySurname($s_surname)
    {
        $this->s_mySurname = $s_surname;
    }


    public function setMyName($s_name)
    {
        $this->s_myName = $s_name;
    }

    public function setMyPseudo($s_pseudo)
    {
        $this->s_myPseudo = $s_pseudo;
    }

    public function setMyEmail($s_email)
    {
        $this->s_myEmail = $s_email;
    }


    public function setMyBirth($d_birth)
    {
        $this->d_myBirth = $d_birth;
    }

    public function setMyPassword($s_password)
    {
        $this->s_myPassword = $s_password;
    }

    public function setMyGender($s_gender)
    {
        $this->s_myGender = $s_gender;
    }

    public function setMyAdmin($b_admin)
    {
        $this->b_myAdmin = $b_admin;
    }

}