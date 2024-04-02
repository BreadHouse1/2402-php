
USE Bakery_Recipe;

CREATE TABLE filepath (
	img_no 				INT 				PRIMARY KEY AUTO_INCREMENT,
	boards_no			INT				,
	created_at		DATETIME 			NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	updated_at 		DATETIME 			NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	deleted_at 		DATETIME,
	file_path 		VARCHAR(255),
	FOREIGN KEY(boards_no) REFERENCES boards(NO) 		
);
