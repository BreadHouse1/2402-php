-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees (
	emp_no,
	birth_date,
	first_name,
	last_name,
	gender,
	hire_date
)

VALUES (
	10001,
	19980930,
	'hong',
	'gildong',
	'M',
	DATE(NOW())
)
;
-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO salaries (
	emp_no,
	salary,
	from_date,
	to_date
) 

VALUES (
	10001,
	50000,
	DATE(NOW()),
	99990101
)
;

INSERT INTO titles (
	emp_no,
	title,
	from_date,
	to_date
) 

VALUES (
	10001,
	'staff',
	DATE(NOW()),
	99990101
)
;

INSERT INTO dept_emp (
	emp_no,
	dept_no,
	from_date,
	to_date
) 

VALUES (
	10001,
	'd001',
	DATE(NOW()),
	99990101
)
;
-- 3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees (
	emp_no,
	birth_date,
	first_name,
	last_name,
	gender,
	hire_date
)

VALUES (
	10002,
	20000930,
	'hong',
	'gildong',
	'M',
	DATE(NOW())
)
;

INSERT INTO salaries (
	emp_no,
	salary,
	from_date,
	to_date
) 

VALUES (
	10002,
	50000,
	DATE(NOW()),
	99990101
)
;

INSERT INTO titles (
	emp_no,
	title,
	from_date,
	to_date
) 

VALUES (
	10002,
	'staff',
	DATE(NOW()),
	99990101
)
;

INSERT INTO dept_emp (
	emp_no,
	dept_no,
	from_date,
	to_date
) 

VALUES (
	10002,
	'd001',
	DATE(NOW()),
	99990101
)
;

-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE 
	dept_emp
	
SET 
	to_date = DATE(NOW())

WHERE
	emp_no IN (10001,10002)
;

INSERT INTO dept_emp (
	emp_no,
	dept_no,
	from_date,
	to_date
) 

VALUES (
	10002,
	'd009',
	DATE(NOW()),
	99990101
),
(
	10001,
	'd009',
	DATE(NOW()),
	99990101
)
;

-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM
	titles
	
WHERE
	emp_no IN (10002)
;

DELETE FROM
	dept_emp
	
WHERE
	emp_no IN (10002)
;

DELETE FROM
	salaries
	
WHERE
	emp_no IN (10002)
;

DELETE FROM
	employees
	
WHERE
	emp_no IN (10002)
;
-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
UPDATE
	dept_manager
	
SET
	to_date = DATE(NOW())

WHERE
	dept_no = 'd009'
		AND to_date > DATE(NOW())
;

INSERT INTO dept_manager (
	dept_no,
	emp_no,
	from_date,
	to_date
)

VALUES (
	'd009',
	10001,
	DATE(NOW()),
	99990101
)
;
-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE
	titles
	
SET
	to_date = DATE(NOW())
	
WHERE emp_no = 10001
;

INSERT INTO titles (
	emp_no,
	title,
	from_date,
	to_date
)

VALUES (
	10001,
	'Senior Engineer',
	DATE(NOW()),
	99990101
)
;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.

-- 방법 1
SELECT
	emp.emp_no,
	CONCAT(emp.first_name,' ',emp.last_name) full_name
	
FROM
	salaries sal
		JOIN employees emp
			ON sal.emp_no = emp.emp_no

where
sal.salary = (SELECT MAX(salary) FROM salaries) or
sal.salary = (SELECT MIN(salary) FROM salaries)
;

-- 방법 2
SELECT
	emp.emp_no,
	first_name

FROM
	employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date > DATE(NOW())
				JOIN (SELECT
					MAX(salary) max_sal,
					MIN(salary) min_sal
				FROM salaries
			WHERE to_date > DATE(NOW())
		) minmax_sal
	ON sal.salary IN (minmax_sal.max_sal, minmax_sal.min_sal)
;

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT
	AVG(salary)

FROM 
	salaries
	
WHERE
	to_date > DATE(NOW())
;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	AVG(salary)
	
FROM
	salaries
	
WHERE
	emp_no = 499975
;

-- 01
CREATE TABLE users (
	userid 			INT 				PRIMARY KEY AUTO_INCREMENT,
	username 		VARCHAR(30) 	NOT NULL,
	authflg 			CHAR(1) 			DEFAULT '0',
	birthday 		DATE 				NOT NULL,
	created_at 		DATETIME 		DEFAULT CURRENT_TIMESTAMP()
)
;

-- 02
INSERT INTO 
	users (
	username,
	authflg,
	birthday,
	created_at	
	)

VALUES (
	'그린',
	0,
	20240126,
	20240311
)
;

-- 03
UPDATE
	users
	
SET
	username = '테스터',
	authflg = 1,
	birthday = 20070301

WHERE 
	userid = 1
;

-- 04
delete FROM 
	users
	
WHERE 
	userid = 1
;

-- 05
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-'
;

-- 06
DROP TABLE 
	users
;
-- 07
SELECT
	ser.username,
	ser.birthday,
	ran.rankname

FROM
	users ser
		JOIN rankmanagement ran
			ON ser.userid = ran.userid
;