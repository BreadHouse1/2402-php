<?php

namespace model;

class UsersModel extends Model {
    // 특정 유저를 조회하는 메소드
    public function getUserInfo($paramArr) {
        try {
            $sql = " SELECT * "
            ." FROM users "
            ." WHERE ";

        // WHERE절 동적 생성
        $arrWhere = [];
        foreach($paramArr as $key => $val) {
            $arrWhere[] = $key." = :".$key;
        }

        // WHERE절 추가
        $sql .= implode(" and ", $arrWhere); // $sql 에 .=로 기존데이터에 추가로 $arrWhere값을 넣음

        // 데이터 획득
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($paramArr);
        $result = $stmt->fetchAll();

        return count($result) > 0 ? $result[0] : $result;
        }  
    
        catch (\Throwable $th) {
            echo "UserModel -> getUserInfo(), ".$th->getMessage();
            exit;
        }
    }

    // 회원 정보 인서트
    public function addUserInfo($paramArr) {
        try {
            $sql =
            " INSERT INTO users("
            ." u_pw "
            ." ,u_name "
            ." ,u_email "
            ." ) "
            ." VALUES ( "
            ." :u_pw "
            ." ,:u_name "
            ." ,:u_email "
            ." ) "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);

            return $stmt->rowCount();
        }
        catch (\Throwable $th) {
            echo "UserModel -> addUserInfo(), ".$th->getMessage();
            exit;
        }
    }

    public function myGetUserInfo($paramArr) {
        try {
            $sql = " SELECT * "
            ." FROM users "
            ." WHERE "
            ."  u_id = :u_id "
            ;
        // 데이터 획득
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($paramArr);
        $result = $stmt->fetchAll();

        return $result;
        }  
    
        catch (\Throwable $th) {
            echo "UserModel -> mygetUserInfo(), ".$th->getMessage();
            exit;
        }
    }


    public function updateUserInfo($paramArr) {
        try {
            $sql =
            " UPDATE users"
            ." SET "
            ." u_pw = :u_pw "
            ." ,u_name = :u_name "
            ." ,updated_at = NOW() "
            ." WHERE "
            ."  u_id = :u_id "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);

            return $stmt->rowCount();
        }
        catch (\Throwable $th) {
            echo "UsersModel -> updateUserInfo(), ".$th->getMessage();
            exit;
        }
    }
}