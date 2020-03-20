<?php

namespace App\Controllers\User;

use App\Models\ServiceModel;
use Core\View;

class Services extends \Core\Controller
{
    public function indexAction()
    {
        $userId = $this->getValue('isUserLogin');
        $services = ServiceModel::all("userId = $userId");
        View::renderTemplate('User/Services/index', ['services' => $services]);
    }

    public function addAction()
    {
        View::renderTemplate('User/Services/form', ['type' => "Add"]);
    }

    public function addDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = $_POST;
            $service = ServiceModel::prepareDataInsert($service);
            if (ServiceModel::insert($service)) {
                $this->alert('Service Inserted.', 'alert alert-success');
                $this->redirect('user/services');
            } else {
                $this->alert('Service not Inserted.', 'alert alert-danger');
                View::renderTemplate('User/Services/form', ['service' => $service, 'type' => "Add"]);
            }
        } else
            $this->redirect('user/services');
    }

    public function getTimeslotAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serviceCenter = $_POST['ServiceCenter'];
            $date = $_POST['Date'];
            $timeslot = ['9-10', '10-11', '11-12', '12-1', '1-2', '2-3', '3-4', '4-5', '5-6'];
            $timeslotRemove = ServiceModel::getTimeslot($serviceCenter, $date);
            $timeslot = array_diff($timeslot, $timeslotRemove);
            echo json_encode($timeslot);
        }
    }
}
