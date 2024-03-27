<!-- 
1. 아래의 테이플을 작성
	1-1 테이블명 : users
		- 컬럼
			> id			INT				PK, 자동증가
			> name			VARCHAR(50)		NULL비허용
			> email			VARCHAR(100)	NULL비허용, 유니크
			> created_at	DATE			NULL비허용, 기본값 현재날짜
			> updated_at	DATE			NULL비허용, 기본값 현재날짜
			> deleted_at	DATE			NULL허용
	
	2-1 테이블명 : boards
		- 컬럼
			> id			INT				PK, 자동증가
			> user_id		INT				FK(users.id 참조)
			> title			VARCHAR(100)	NULL비허용
			> content		VARCHAR(1000)	NULL비허용
			> created_at	DATE			NULL비허용, 기본값 현재날짜
			> updated_at	DATE			NULL비허용, 기본값 현재날짜
			> deleted_at	DATE			NULL허용
			
	3-1 테이블명 : wishlists
		- 컬럼
			> id			INT				PK, 자동증가
			> user_id		INT				FK(users.id 참조)
			> board_id		INT				FK(boards.id 참조)
			> created_at	DATE			NULL비허용, 기본값 현재날짜
			> updated_at	DATE			NULL비허용, 기본값 현재날짜
			> deleted_at	DATE			NULL허용
2. boards 테이블에 아래 컬럼을 추가
	- views		INT		NULL비허용, 기본값 0
3. users 테이블에 아래 3명의 정보를 작성
	- 홍길동, 갑돌이, 갑순이
4. boards 테이블에 아래 데이터 작성
	- 홍길동 유저가 작성한 글 4개
	- 갑돌이 유저가 작성한 글 3개
	- 갑순이 유저가 작성한 글 2개
5. wishlists 테이블에 아래 데이터 작성
	- 홍길동 유저가 찜한 글 2개
	- 갑돌이 유저가 찜한 글 5개
	- 갑순이 유저가 찜한 글 9개
6. 홍길동 유저의 탈퇴 처리
7. wishlists의 모든 데이터 물리적 삭제
8. 모든 테이블 제거 -->