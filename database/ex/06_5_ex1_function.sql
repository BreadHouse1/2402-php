-- 내장함수 (function)
-- 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입), CONVERT (값, 데이터 타입)
SELECT 123, CAST(123 AS CHAR(3)), CONVERT(123, CHAR(2))
;

-- 제어 프름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참이면 참일때, 
-- 거짓이면 거짓일때를 출력
SELECT
	emp_no,
	IF(gender = 'M', '남자', '여자') AS '성별'
	
FROM employees
;
-- 급여가 80000이상인 사원은 '고소득자' 아니면 '그냥저냥'으로 출력
SELECT
	emp_no,
	to_date,
	max(salary),
	IF(salary >= 80000, '고소득자', '그냥저냥')
	
FROM salaries

GROUP BY emp_no HAVING to_date <= NOW()
;