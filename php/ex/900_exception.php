<?php
// try, catch, finally
try {
    // 예외가 발생할 로직을 작성
    $i = 5 / 0;
}
catch(Throwable $e){
    // 예외가 발생할 때 처리를 작성
    // 7버전 이상은 Throwable
    echo "예외 발생\n".$e->getMessage()."\n";    
}

finally {
    // 예외 발생 여부와 상관없이 무조건 마지막 실행
    // finally는 생략 가능
    echo "finally \n";
}

echo "계산 완료";