<?php

namespace App\Controllers\Admin;

use App\Models\ServiceModel;
use Core\View;

class Services extends \Core\Controller
{
    public function indexAction()
    {
        $services = ServiceModel::all();
        View::renderTemplate('Admin/Services/index', ['services' => $services]);
    }

    public function editAction()
    {
        if (!empty($this->route_params['id'])) {
            $service = ServiceModel::find($this->route_params['id']);
            if (!empty($service))
                View::renderTemplate('Admin/Services/form', ['service' => $service, 'type' => 'Edit']);
            else
                $this->redirect('admin/services');
        } else
            $this->redirect('admin/services');
    }

    public function editDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['ServiceId'];
            $service = $_POST;
            if (ServiceModel::update($id, $service)) {
                $this->alert('Service Updated.', 'alert alert-success');
                $this->redirect('admin/services');
            } else {
                $this->alert('Service not Updated.', 'alert alert-danger');
                View::renderTemplate('Admin/Services/form', ['service' => $service, 'type' => "Edit"]);
            }
        } else
            $this->redirect('admin/services');
    }

    public function deleteAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (ServiceModel::delete($id))
                $this->alert("Service Deleted.", "alert alert-success");
            else
                $this->alert("Service not Deleted.", "alert alert-danger");
        }
        $this->redirect('admin/services');
    }
}
