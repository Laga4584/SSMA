<?php
// 로그인 사용자만 접근
if(!$s_idx){
    echo
    "<script type=\"text/javascript\">
    alert(\"로그인한 사용자만 접근할 수 있습니다\");
    location.href = \"http://localhost/web_project\";
    </script>";
    
    exit;
};
?>