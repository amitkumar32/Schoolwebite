<?php

class General {


    public function encryptString($string) {
        return md5($string);
    }

    public function test() {
        return 'Test Function';
    }



    public function insert($tableName, $data) {
        global $conn;
        $fields = '';
        $values = '';
        end($data);
        $lastElement = key($data);
        foreach ($data as $key => $value) {
            if ($lastElement == $key) {
                $fields.=$key;
                $values.="'$value'";
            } else {
                $fields.=$key . ',';
                $values.="'$value',";
            }
        }		
        $checkFields = $this->checkTableFields($tableName, $data);
        if (isset($checkFields['status']) && $checkFields['status'] == '0') {

            $insert = "INSERT INTO $tableName ($fields) VALUES($values)";
//            p($insert);
            mysqli_query($conn,$insert);
			
			//return['status' => 0, 'message' => 'record inserted'];
			
            return ['status' => 0, 'message' => 'record inserted', 'ID' => mysqli_insert_id($conn)];
        } else {
            return $checkFields;
        }
    }

    public function update($tableName, $data, $params) {
        global $conn;
        $updateString = '';
        $condition = '';
        end($data);
        $lastElement = key($data);
        end($params);
        $lastParams = key($params);
        foreach ($data as $key => $value) {
            if ($lastElement == $key) {
                $updateString.="$key = '$value'";
            } else {
                $updateString.="$key = '$value' , ";
            }
        }

        foreach ($params as $key => $value) {
            if ($lastParams == $key) {
                $condition.="$key = '$value'";
            } else {
                $condition.="$key = '$value' AND ";
            }
        }

        $checkFields = $this->checkTableFields($tableName, $data);
        if (isset($checkFields['status']) && $checkFields['status'] == '0') {
            $select = "SELECT * FROM $tableName WHERE $condition";
            $selectQuery = mysqli_query($conn,$select);
            $row = mysqli_fetch_assoc($selectQuery);
            if (!empty($row)) {
                $update = "UPDATE $tableName SET $updateString WHERE $condition";
                mysqli_query($conn,$update);
                return['status' => 0, 'message' => 'record updated'];
            } else {
                return['status' => 1, 'message' => 'invalid params'];
            }
        } else {
            return $checkFields;
        }
    }

    function queryOne($tableName, $params) {
        global $conn;
        $checkFields = $this->checkTableFields($tableName, $params);
        if (isset($checkFields['status']) && $checkFields['status'] == '0') {
            end($params);
            $lastParams = key($params);
            $condition = '';
            foreach ($params as $key => $value) {
                if ($lastParams == $key) {
                    $condition.="$key = '$value'";
                } else {
                    $condition.="$key = '$value' AND ";
                }
            }

            $select = "SELECT * FROM $tableName WHERE $condition";
            // p($select );
            $selectQuery = mysqli_query($conn,$select);
            return mysqli_fetch_assoc($selectQuery);
        } else {
            return $checkFields;
        }
    }

    function delete($tableName, $params) {
        global $conn;
        $checkFields = $this->checkTableFields($tableName, $params);
        if (isset($checkFields['status']) && $checkFields['status'] == '0') {
            end($params);
            $lastParams = key($params);
            $condition = '';
            foreach ($params as $key => $value) {
                if ($lastParams == $key) {
                    $condition.="$key = '$value'";
                } else {
                    $condition.="$key = '$value' AND ";
                }
            }

            $select = "DELETE FROM $tableName WHERE $condition";
            $selectQuery = mysqli_query($conn,$select);
            return ['status' => 1];
        } else {
            return $checkFields;
        }
    }

    function queryAll($tableName, $params = '') {
        global $conn;
        $lastParams = '';
        $condition = '';
        if (!empty($params)) {
            $checkFields = $this->checkTableFields($tableName, $params);
            end($params);
            $lastParams = key($params);
            foreach ($params as $key => $value) {
                if ($lastParams == $key) {
                    $condition.="AND $key = '$value'";
                } else {
                    $condition.="AND $key = '$value'";
                }
            }
        } else {
            $checkFields['status'] = '0';
        }
        $data1 = [];
        if (isset($checkFields['status']) && $checkFields['status'] == '0') {
            $select = "SELECT * FROM $tableName WHERE 1=1 $condition";
            $selectQuery = mysqli_query($conn,$select);
            $i = 0;
            while ($row = mysqli_fetch_assoc($selectQuery)) {
                $data1[$i] = $row;
                $i++;
            }
            return $data1;
        }
    }

    function checkTableFields($tableName, $data) {
        global $conn;
        $getColumnString = "SHOW COLUMNS FROM " . $tableName;
        $queryColumn = mysqli_query($conn,$getColumnString);
        $fields = [];
        $i = 0;
        while ($rowColumn = mysqli_fetch_assoc($queryColumn)) {
            $fields[$i] = $rowColumn;
            $i++;
        }

        $exactFields = [];
        foreach ($fields as $key => $value) {
            if (!in_array($value['Field'], $exactFields)) {
                $exactFields[] = $value['Field'];
            }
        }
        $fieldFlag = 0;
        foreach ($data as $key => $value) {
            if (in_array($key, $exactFields)) {
                $fieldFlag = 1;
            } else {
                return ['status' => 1, 'message' => 'Unknown filed ' . $key];
            }
        }
        if ($fieldFlag) {
            return ['status' => 0];
        }
    }

}
