<?php

namespace Controllers;


use Helpers\CsvFile;

use Models\Users;
use System\Controller;
use Exception;

class UserController extends Controller
{

    public function import()
    {
        try {
            $error = false;
            $message = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_FILES && $_FILES["file"]["error"] == UPLOAD_ERR_OK && $_FILES["file"]["type"] == 'text/csv') {
                    move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/import.csv');
                    $csv = new CsvFile('uploads/import.csv');
                    if ($csv->validate()) {
                        $arr = $csv->getArray();
                        Users::import($arr);
                        $message = 'Файл імпортовано';
                    } else {
                        throw new Exception('Структура файла не співпадає і не може бути імпортована');
                    }
                    unlink('uploads/import.csv');
                } else {
                    throw new Exception('Помилка завантаження, файл має бути csv і не більше 1Мб');
                }
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $error = true;
        }
        return $this->render('import', ['message' => $message, 'error' => $error]);
    }

    public function result()
    {
        $filter['UID'] = $_GET['UID'] ?? '';
        $filter['Name'] = $_GET['Name'] ?? '';
        $filter['Age'] = $_GET['Age'] ?? '';
        $filter['Email'] = $_GET['Email'] ?? '';
        $filter['Phone'] = $_GET['Phone'] ?? '';
        $filter['Gender'] = $_GET['Gender'] ?? '';

        $users = Users::filter($filter);

        if (isset($_POST['export'])) {
            header("Content-Type: text/csv; charset=utf-8");
            header("Content-Disposition: attachment; filename=export.csv");
            $output = fopen("php://output", "w");
            fputcsv($output, array('UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'));
            foreach ($users as $user) {
                fputcsv($output, $user);
            }
            fclose($output);
            exit();
        }

        return $this->render('result', ['users' => $users]);
    }

    public function clear()
    {
        Users::clear();
        return $this->result();
    }
}
