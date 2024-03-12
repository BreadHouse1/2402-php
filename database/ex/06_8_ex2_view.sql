-- 뷰(VIEW)
-- 가상 테잉블로, 보안과 함께 사용자의 편의성을 높이기 위해서 사용
-- 장점 : 복잡한 SQL를 편하게 조회 할 수 있다
-- 단점 : INDEX를 사용할 수 없어 조회 속도 느림

-- 사원의 현재 사번,생년월일,이름,성,성별,입사일,현재급여, 현재직책 출력
SELECT
	emp.emp_no,
	emp.birth_date,
	emp.last_name,
	emp.gender,
	emp.hire_date,
	tit.title,
	sal.salary

FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND sal.to_date >= NOW()
;

-- 위의 쿼리를 뷰로 작성
CREATE VIEW VIEW_emp_info
AS
	SELECT
	emp.emp_no,
	emp.birth_date,
	emp.last_name,
	emp.gender,
	emp.hire_date,
	tit.title,
	sal.salary

FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND sal.to_date >= NOW()
;	


-- VIEW로 셀렉트 불러오기
SELECT 
	*

FROM 
	view_emp_info
;