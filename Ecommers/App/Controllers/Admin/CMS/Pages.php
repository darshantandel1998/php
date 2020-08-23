<?php

namespace App\Controllers\Admin\CMS;

use App\Models\PageModel;
use Core\View;

class Pages extends \Core\Controller
{
    public function indexAction()
    {
        $pages = PageModel::all();
        View::renderTemplate('Admin/CMS/Pages/index', ['pages' => $pages]);
    }

    public function addAction()
    {
        View::renderTemplate('Admin/CMS/Pages/form', ['type' => 'Add']);
    }

    public function addDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $page = $_POST;
            $page = PageModel::prepareDataInsert($page);
            if (!PageModel::isExist($page['Url_Key'], 'Url_Key')) {
                if (PageModel::insert($page)) {
                    $this->alert('Page Inserted.', 'alert alert-success');
                    $this->redirect('admin/cms/pages');
                } else {
                    $this->alert('Page not Inserted.', 'alert alert-danger');
                    View::renderTemplate('Admin/CMS/Pages/form', ['type' => 'Add', 'page' => $page]);
                }
            } else {
                $this->alert('Url Key already exist, please change Page Title.', 'alert alert-danger');
                View::renderTemplate('Admin/CMS/Pages/form', ['type' => 'Add', 'page' => $page]);
            }
        } else
            $this->redirect('admin/cms/pages');
    }

    public function editAction()
    {
        if (!empty($this->route_params['id'])) {
            $page = PageModel::find($this->route_params['id']);
            View::renderTemplate('Admin/CMS/Pages/form', ['type' => 'Edit', 'page' => $page]);
        } else
            $this->redirect('admin/cms/pages');
    }

    public function editDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['Id'];
            $page = $_POST;
            $page = PageModel::prepareDataInsert($page);
            if (!PageModel::isExist($page['Url_Key'], 'Url_Key', "`Id` != $id")) {
                if (PageModel::update($id, $page)) {
                    $this->alert('Page Updated.', 'alert alert-success');
                    $this->redirect('admin/cms/pages');
                } else {
                    $this->alert('Page not Updated.', 'alert alert-danger');
                    View::renderTemplate('Admin/CMS/Pages/form', ['type' => "Edit", 'page' => $page]);
                }
            } else {
                $this->alert('Url Key already exist, please change Page Title.', 'alert alert-danger');
                View::renderTemplate('Admin/CMS/Pages/form', ['type' => "Edit", 'page' => $page]);
            }
        } else
            $this->redirect('admin/cms/pages');
    }

    public function deleteAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (PageModel::delete($id))
                $this->alert("Page Deleted.", "alert alert-success");
            else
                $this->alert("Page not Deleted.", "alert alert-danger");
        }
        $this->redirect('admin/cms/pages');
    }
}
