<?php

  /*
   * Project    : EIS Subscription Module
   * EAO IT Services Pvt. Ltd. | www.eaoservices.com
   * Copyright reserved @2017

   * File Description :

   * Created on : 3 Oct, 2017 | 12:38:45 PM
   * Author     : Bilal Wani
   * Email      : bilal.wani@eaoservices

   */
  session_start();

  require_once 'config.php';
  require 'eis-team-model.php';

//CODE for Message ID
  const MSG_GET_MEMBERS = 1;


  if ( !class_exists('EisTeam') ) {

      class EisTeamController {

          private $m_model_team = null;

          public function __construct($host, $user, $pwd, $database) {
              $this->m_model_team = new EisTeamModel($host, $user, $pwd, $database);
          }

          public function Dispatcher($MsgObj) {
              $msgid = $Msg->msgid;
              $result = null;

              switch ($msgid) {
                  case MSG_GET_MEMBERS:
                      $result = $this->GetAllMembers();
                      break;
              }

              return $result;
          }

          public function GetAllMembers() {

              $result = $this->m_model_team->GetAllMembers();

              return $result;
          }

          public function HandleFileUpload($_files, $fileToUpload) {
              /*
               * The file is first stored at $_FILES[$fileToUpload]["tmp_name"]
               */
              $target_dir = "../media/img/";
              $target_file = $target_dir . basename($_files[$fileToUpload]["name"]);

              $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

              echo "Type : $imgFileType </br>";

              //Get image size
//              $imgSize = getimagesize($_files[$fileToUpload]["tmp_name"]);

              $ret = move_uploaded_file($_files[$fileToUpload]["tmp_name"], $target_file);
              echo "Ret : $ret <br>";
          }

      }

  }

  if ( isset($_REQUEST) ) {
      $method = $_SERVER['REQUEST_METHOD'];
//      echo $method;
      switch ($method) {
          case "POST":

              break;
          case "GET":
              global $g_server, $g_pwd, $g_user, $g_db;

              try {
                  $ctrl = new EisTeamController($g_server, $g_user, $g_pwd, $g_db);
                  $MsgObj->msg_id = $_GET["msg_id"];
                  $members = $ctrl->Dispatcher($MsgObj);
                  $json_obj = json_encode($members);
//          var_dump($json_obj);
                  echo $json_obj;
              } catch (Exception $ex) {
                  echo "Error : " . $ex->getMessage();
              }
              break;
      }
  }

  /*
   * Test Functions
   */

  function TestGetAllMembers() {
      global $g_server, $g_pwd, $g_user, $g_db;

      try {
          $ctrl = new EisTeamController($g_server, $g_user, $g_pwd, $g_db);
          
          $members = $ctrl->GetAllMembers();
          $json_obj = json_encode($members);
//          var_dump($json_obj);
          echo $json_obj;
      } catch (Exception $ex) {
          echo "Error : " . $ex->getMessage();
      }
  }

  function TestHandleFileUpload() {
      try {
          global $g_server, $g_pwd, $g_user, $g_db;
          $ctrl = new EisTeamController($g_server, $g_user, $g_pwd, $g_db);

          if ( isset($_SESSION["FILES"]) ) {
              var_dump($_SESSION["FILES"]);
              $ctrl->HandleFileUpload($_SESSION["FILES"], "profile_pic");
          }
      } catch (Exception $ex) {
          echo "Error : " . $ex->getMessage();
      }
  }

//  TestHandleFileUpload();
//  TestGetAllMembers();

  