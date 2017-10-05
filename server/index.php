<?php

  /*
   * Project    : EIS Subscription Module
   * EAO IT Services Pvt. Ltd. | www.eaoservices.com
   * Copyright reserved @2017

   * File Description :

   * Created on : 3 Oct, 2017 | 11:02:17 PM
   * Author     : Bilal Wani
   * Email      : bilal.wani@eaoservices

   */

  session_start();
  $_SESSION["GET"] = $_GET;
  $_SESSION["POST"] = $_POST;
  $_SESSION["FILES"] = $_FILES;

  echo "File tmp : " . $_FILES["profile_pic"]["tmp_name"];

//  echo "<hr>";
//  $imgSize = getimagesize($_FILES["profile_pic"]["tmp_name"]);
//  var_dump($imgSize);
//  
//  echo "<hr>";
//  var_dump($_FILES);

  function HandleFileUpload($_files, $fileToUpload) {
      /*
       * The file is first stored at $_FILES[$fileToUpload]["tmp_name"]
       */
      $target_dir = "../media/img/";
      $target_file = $target_dir . basename($_files[$fileToUpload]["name"]);

      $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

      echo "Type : $imgFileType </br>";

      //Get image size
      $imgSize = getimagesize($_files[$fileToUpload]["tmp_name"]);

      if ( file_exists($target_file) ) {
          echo "File exists, operation aborted...";
      } else {
          $ret = move_uploaded_file($_files[$fileToUpload]["tmp_name"], $target_file);
          echo "Ret : $ret <br>";
      }
  }

  HandleFileUpload($_FILES, "profile_pic");

//  header("location: eis-team-controller.php");



      