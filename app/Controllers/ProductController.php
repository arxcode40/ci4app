<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;
use App\Entities\ProductEntity;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends ResourceController
{
    protected $modelName = ProductModel::class;
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['title'] = 'Product List';
        $data['products'] = $this->model->findAll();

        return view('product/list', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $data['title'] = 'Show Product';
        $data['product'] = $this->model->find($id);

        if ($data['product'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('product/show', $data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('product/new', ['title' => 'Add New Product']);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if (! $this->request->is('post')) {
            return redirect()->back();
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'quantity' => (int) str_replace('.', '', $this->request->getPost('quantity')),
            'price' => (int) str_replace('.', '', $this->request->getPost('price')),
        ];

        if (! $this->validateData($data, 'product')) {
            return redirect()->back()->withInput();
        }

        $productEntity = new ProductEntity();
        $productEntity->fill($this->validator->getValidated());
        $this->model->insert($productEntity);

        return redirect()->route('ProductController::index')->with('alert', view_cell('AlertMessageCell', ['message' => 'Product data successfully created.']));
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $data['title'] = 'Edit Product';
        $data['product'] = $this->model->find($id);

        if ($data['product'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('product/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        if (! $this->request->is('put')) {
            return redirect()->back();
        }

        $data = [
            'name' => $this->request->getRawInputVar('name'),
            'quantity' => (int) str_replace('.', '', $this->request->getRawInputVar('quantity')),
            'price' => (int) str_replace('.', '', $this->request->getRawInputVar('price')),
        ];

        if (! $this->validateData($data, 'product')) {
            return redirect()->back()->withInput();
        }

        $productEntity = new ProductEntity();
        $productEntity->fill($this->validator->getValidated());
        $this->model->update($id, $productEntity);

        return redirect()->route('ProductController::index')->with('alert', view_cell('AlertMessageCell', ['message' => 'Product data successfully updated.']));
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if (! $this->request->is('delete')) {
            return redirect()->back();
        }

        if ($this->model->delete($id)) {
            return redirect()->route('ProductController::index')->with('alert', view_cell('AlertMessageCell', ['message' => 'Product data successfully deleted.']));
        }
    }
}
