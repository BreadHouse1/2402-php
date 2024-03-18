<?php
// do_while : 무조건 한번은 실행하는 반복문
do {
    echo "test";
}
while(false);

echo "\n";

for($dan = 1; $dan < 6; $dan++) {
    for($i = 0; $i < $dan-=3; $i++) {
        echo "s";
    }

    echo "\n";
}
