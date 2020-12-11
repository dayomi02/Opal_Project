<?php
    include("../../db.php");
    
    $rno = $_POST['rno'];//댓글번호 ,idx, grp

    $bno = $_GET['idx'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);



    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){

        
        $sql = mq("insert into reply(sep,lvl,con_num,name,pw,content) values(1,0,'".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
        //echo "insert into reply(sep,lvl,con_num,name,pw,content) values(1,0,'".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')";
        $sql = mq("UPDATE reply SET grp = (select last_insert_id()) WHERE idx = (select last_insert_id())");

        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='read.php?idx=$bno';</script>";

        
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>