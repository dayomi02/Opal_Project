<?php
    include("../../db.php");
    
    $rno = $_POST['rno'];//댓글번호 ,idx, grp
    $bno = $_POST['b_no']; //게시글 번호, com_num

    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);

    // UPDATE posts SET grp_ord = grp_order+1 WHERE ori_id = '부모글 ori_id' AND grp_ord > '부모글의 grp_ord';
    // UPDATE reply SET grp_ord = grp_order+1 WHERE ori_id = $rno AND grp_ord > 0;
    // INSERT INTO reply SET 
    //                  content = $_POST['content'],
    //                  ori_id = $rno,
    //                  grp_ord = 0 + 1,
    //                  depth = 0 + 1;

    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){
        $sql = mq("UPDATE reply SET sep=sep+1 WHERE grp = $rno AND sep > 1");
        $sql2 = mq("insert into reply(grp,sep,lvl,con_num,name,pw,content) values(".$rno.", 1+1, 1,'".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
        
        //echo "안녕하세요<br>";
        //echo "UPDATE reply SET sep=sep+1 WHERE grp = $rno AND sep > 1";
        //echo "insert into reply(grp,sep,lvl,con_num,name,pw,content) values(".$rno.", 1+1, 1,'".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')";
        
        echo "<script>alert('덧글이 작성되었습니다.'); 
        location.href='read.php?idx=$bno';</script>";
        
    }else{
        echo "<script>alert('덧글 작성에 실패했습니다.'); 
        history.back();</script>";
    }



?>