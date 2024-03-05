-- DELETE 문 : 기존 데이터를 삭제하는 쿼리
-- D	ELETE FROM 테이블 명
-- 	WHERE  [조건]
-- ;

delete FROM 
	salaries
WHERE 
	emp_no = 500000;

-- 나 자신의 직책 정보 삭제
DELETE FROM 
	titles
	
WHERE 
	emp_no = 500005
;

-- 