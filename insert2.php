<?php
                $conn = mysqli_connect(
                'localhost',
                'root',
                'wlsals!12',
                'dogeprison');
                # title, description 이라는 사용자가 입력한 정보를 그대로 php에 입력하는 행위는 보안에 취약, 따라서 관리 필요

                $filtered = array(
                    'p_number'=>mysqli_real_escape_string($conn, $_POST['p_number']),
                    'p_name'=>mysqli_real_escape_string($conn, $_POST['p_name']),
                    'p_crime'=>mysqli_real_escape_string($conn, $_POST['p_crime']),
                    'p_admission_date'=>mysqli_real_escape_string($conn, $_POST['p_admission_date']),
                    'p_release_date'=>mysqli_real_escape_string($conn, $_POST['p_release_date']),
                    'p_crime_record'=>mysqli_real_escape_string($conn, $_POST['p_crime_record']),
                    'p_age'=>mysqli_real_escape_string($conn, $_POST['p_age']),
                    'p_sentence'=>mysqli_real_escape_string($conn, $_POST['p_sentence']),
                    'p_penalty'=>mysqli_real_escape_string($conn, $_POST['p_penalty']),
                    'prison_room_pr_number'=>mysqli_real_escape_string($conn, $_POST['prison_room_pr_number'])
                );

                $sql = "
                INSERT INTO prisoner VALUES(
                    '{$filtered['p_number']}',
                    '{$filtered['p_name']}',
                    '{$filtered['p_crime']}',
                    '{$filtered['p_admission_date']}',
                    '{$filtered['p_release_date']}',
                    '{$filtered['p_crime_record']}',
                    '{$filtered['p_age']}',
                    '{$filtered['p_sentence']}',
                    '{$filtered['p_penalty']}',
                    '{$filtered['prison_room_pr_number']}
                    )
                ";
                $result = mysqli_query($conn, $sql);
                if($result === false){
                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
                error_log(mysqli_error($conn));
                } else {
                echo '성공했습니다. <a href="insert2.php">돌아가기</a>';
                }
?>                       
